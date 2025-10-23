<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Adress;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\GeneralSettings;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;




class CheckoutController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $cartItems = \Cart::content();
        if(count($cartItems) == 0)
        {
            notyf()->warning(__('toastr.CartEmpty'));
            return redirect()->route('home');
        }
       
        return view('frontend.pages.checkout');
    }


   


    public function storeOrder($myaddress, $slider, $facility, $total_duree, $dossier)
    {
        $setting = GeneralSettings::first();
        $order = new Order();
        $order->inovice_id = rand(1, 999999);
        $order->subtotal = cartTotal();
        $order->amount = cartTotal();
        $order->total_variants = variantTotal();
        $order->user_amount = $slider;
        $order->duree = $total_duree;
        $order->total_facility = $facility;
        $order->currency_name = $setting->currency_name;
        $order->currency_icon = $setting->currency_icon;
        $order->product_qty = \Cart::content()->count();
        $order->order_address = json_encode($myaddress);
        $order->dossier = $dossier;
    
        if ($order->save()) {
            try {
                /** Store Order Products */
                foreach (\Cart::content() as $item) {
                    $product = Product::findOrFail($item->id);
                    $orderProduct = new OrderProduct();
                    $orderProduct->order_id = $order->id;
                    $orderProduct->product_id = $item->id;
                    $orderProduct->product_name = $product->name;
                    $orderProduct->variants = count($item->options->variants) > 0 ? json_encode($item->options->variants) : null;
                    $orderProduct->variants_total = $item->options->variant_total;
                    $orderProduct->unit_price = $item->price;
                    $orderProduct->qty = $item->qty;
                    $orderProduct->save();
                }
            } catch (\Exception $e) {
                
                $order->delete();

                Cache::forget('dashboard_stats');
                Cache::forget('vendor_dashboard_stats');

                abort(404, 'Order could not be .');
                
            }
        } else {
            // If order is not saved, return a 404 response
            abort(404, 'Order could not be saved.');
        }
    }
    

    public function getDuree($duree)
    {
        $cartFaciliter =cartFaciliter();
        foreach($cartFaciliter as $cart)
        {
            if($duree == 'price_12')
            {
                return 12;
            }else if($duree == 'price_24')
            {
                return 24;
            }else if($duree == 'price_36')
            {
                return 36;
            }else if($duree == 'price_48')
            {
                return 48;
            }else if($duree == 'price_60')
            {
                return 60;
            }else
            {
                return 60;
            }
        }
    }

    
    public function facility($duree)
    {
        $cartFaciliter = cartFaciliter();
        foreach($cartFaciliter as $key => $cart)
        {
            if($key == $duree)
            {
                return $cart;
            }
        }
    }

    public function clearCart()
    {
        \Cart::destroy();
    }

    public function checkoutFormSubmit(Request $request)
    {
        
        $request->validate([
            
            'name' => ['required','max:200','string'],
            'phone' => ['required','max:50','regex:/^0[5-6-7][0-9]{8}$/'],
            'country' => ['required','max:200', Rule::in(config('settings.country_list'))],
            'state' => ['required','max:200','string'],
            'city' => ['required','max:200','string'],
            'dossier' => ['required','max:255', Rule::in('retrait','retrait militaire','fonctionnaire','fonctionnaire militaire')],
            'zip' => ['required','max:200', 'string'],
            'address' => ['required','max:500','string'],
            'duree' => ['required', Rule::in('price_12','price_24','price_36','price_48','price_60')],
            'slider' => ['required', 'integer', 'between:25000,200000'],

        ]);


        $duree = $request->duree;
        $slider = $request->slider;
        
        
        $myaddress = [
            'name' => $request->name,
            'phone' => $request->phone,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip' => $request->zip,
            'address' => $request->address,

        ];
       
        $facility = $this->facility($duree);
        

        $total_duree = $this->getDuree($duree);

        $dossier = $request->dossier;
        
        $this->storeOrder($myaddress,$slider,$facility,$total_duree,$dossier);

        $this->clearCart();

        Cache::forget('dashboard_stats');

        Cache::forget('vendor_dashboard_stats');
        
        notyf()->success(__('toastr.OrderhasbeensendSuccessfully'));
        return redirect()->route('home');

    
    }
    
}
