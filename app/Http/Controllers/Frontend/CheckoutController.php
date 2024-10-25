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

class CheckoutController extends Controller
{
    public function index(): View|RedirectResponse
    {
        $cartItems = \Cart::content();
        if(count($cartItems) == 0)
        {
            notyf()->warning('Cart Is Empty!');
            return redirect()->route('home');
        }
        $user = auth()->user();
        $addresses = $user->addresses;
        return view('frontend.pages.checkout', compact('addresses'));
    }


    public function createAddress(Request $request)
    {
        $request->validate([
            'name' => ['required','max:200','string'],
            'email' => ['required','email','max:200'],
            'phone' => ['required','max:50','regex:/^0[5-6-7][0-9]{8}$/'],
            'country' => ['required','max:200', Rule::in(config('settings.country_list'))],
            'state' => ['required','max:200','string'],
            'city' => ['required','max:200','string'],
            'zip' => ['required','max:200', 'string'],
            'address' => ['required','max:500','string'],
        ]);

        $user = $request->user();

        $adress = $user->addresses()->count();

        if($adress >= 2)
        {
            notyf()->error("You can't add more than 2 Addresses!");
            return redirect()->back();
        }

        $user->addresses()->create([
            'name' => $request->name ,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'state' => $request->state,
            'city' => $request->city,
            'zip' => $request->zip,
            'address' => $request->address,
        ]);

        notyf()->success('Created Successfully!');
        return redirect()->back();
    }


    public function storeOrder($myaddress,$slider,$facility,$total_duree)
    {
        $setting = GeneralSettings::first();
        $order = new Order();
        $order->inovice_id = rand(1,999999);
        $order->user_id = auth()->user()->id;
        $order->subtotal = cartTotal();
        $order->amount = cartTotal();
        $order->total_variants = variantTotal();
        $order->user_amount = $slider;
        $order->duree = $total_duree;
        $order->total_facility = $facility;
        $order->currency_name = $setting->currency_name;
        $order->currency_icon =  $setting->currency_icon;
        $order->product_qty = \Cart::content()->count();
        $order->order_address = json_encode($myaddress);
        $order->save();


        /** Store Order Products */
        foreach(\Cart::content() as $item)
        {
            $product = Product::findOrFail($item->id);
            $orderProduct = new OrderProduct();
            $orderProduct->order_id = $order->id;
            $orderProduct->product_id = $item->id;
            $orderProduct->product_name = $product->name;
            $orderProduct->variants = count($item->options->variants) > 0  ? json_encode($item->options->variants) : null;
            $orderProduct->variants_total = $item->options->variant_total;
            $orderProduct->unit_price = $item->price;
            $orderProduct->qty = $item->qty;
            $orderProduct->save();
            
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
        $cartFaciliter =cartFaciliter();
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
            
            'shipping_address_id' => ['required', 'integer'],
            'duree' => ['required', Rule::in('price_12','price_24','price_36','price_48','price_60')],
            'slider' => ['required', 'integer', 'between:25000,200000'],

        ]);


        $duree = $request->duree;
        $slider = $request->slider;
        
        
        $address = Adress::findOrFail($request->shipping_address_id);
        $myaddress = $address->toArray();
        $facility = $this->facility($duree);
        
        Gate::authorize('update', $address);

        $total_duree = $this->getDuree($duree);
        
        $this->storeOrder($myaddress,$slider,$facility,$total_duree);

        $this->clearCart();

        

        return response()->json([
            'status' => 'success',
            'message' => 'Order has been sent successfully!',
            'redirect_url' => route('home'),
        ]);

    
    }
    
}
