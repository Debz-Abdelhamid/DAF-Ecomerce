<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariantItem;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Cart;
class CartController extends Controller
{

    public function cartDetails():  View|RedirectResponse
    {
        $cartItems =  Cart::content();
        $cartFaciliter = cartFaciliter();

        if(count($cartItems) == 0)
        {
            notyf()->warning(__('toastr.CartEmpty'));
            return redirect()->route('home');
        }

        return view('frontend.pages.cart-detail', compact(['cartItems','cartFaciliter']));
    }

    public function addToCart(Request $request)
    {

        $request->validate([
            'qty' => ['required','integer','min:1'],
            'product' => ['required','integer'],
            'variants_items' => ['nullable','array'],
        ]);

        $quantity = $request->qty;
        $product = Product::findOrFail($request->product);

        /** Check Product Quantity */
        if($product->qty == 0)
        {
            return response()->json([
                'status' => 'error',
                'message' =>__('toastr.product_out_of_stock'),
            ]);
        }else if($product->qty < $quantity)
        {
            return response()->json([
                'status' => 'error',
                'message' =>__('toastr.quantity_not_available'),
            ]);
        }

        $promotion = [];
        $promotion ['price_12'] = $product->price_12;
        $promotion ['price_24'] = $product->price_24;
        $promotion ['price_36'] = $product->price_36;
        $promotion ['price_48'] = $product->price_48;
        $promotion ['price_60'] = $product->price_60;

        $variants = [];
        $variantTotalAmount = 0;

        if($request->has('variants_items'))
        {

            foreach($request->variants_items as $item_id)
            {
                $variantItem = ProductVariantItem::findOrFail($item_id);

                if($variantItem->productvariant->product->is($product))
                {
                    $variants [$variantItem->productvariant->name] ['name'] = $variantItem->name;
                    $variants [$variantItem->productvariant->name] ['price'] = $variantItem->price;
                    $variantTotalAmount += $variantItem->price;
                }else
                {

                    return response()->json([
                        'status' => 'error',
                        'message' =>__('toastr.Variant_does'),
                    ]);
                }

            }
        }

        /** Check Discount */
        $productPrice = 0;
        $productPrice = checkDiscount($product) ? $product->offer_price : $product->price;



        $cartData = [];
        $cartData ['id'] = $product->id;
        $cartData ['name'] = $product->name;
        $cartData ['qty'] = $request->qty;
        $cartData ['price'] = $productPrice;
        $cartData ['weight'] = 10;
        $cartData ['options'] ['variants'] = $variants;
        $cartData ['options'] ['faciliter'] = $promotion;
        $cartData ['options'] ['variant_total'] = $variantTotalAmount;
        $cartData ['options'] ['image'] = $product->thumb_image;
        $cartData ['options'] ['slug'] = $product->slug;



        Cart::add($cartData)->associate('App\Models\Product');

        

        return response()->json([
            'status' => 'success',
            'message' => __('toastr.added_to_cart'),
        ]);
        

        
    }




    /** Update Product Quantity */
    public function updateProductQty(Request $request)
    {

            $request->validate([
                'quantity' => ['required', 'integer', 'min:1'],
                'rowId' => ['required'],
            ]);



        try {


            $productId = Cart::get($request->rowId)->id;
            $product = Product::findOrFail($productId);

             /** Check Product Quantity */
            if($product->qty == 0)
            {
                return response()->json([
                    'status' => 'error',
                    'message' =>__('toastr.ProductStockOut'),
                ]);
            }else if($product->qty < $request->quantity)
            {
                return response()->json([
                    'status' => 'error',
                    'message' =>__('toastr.QuantityNotAvailableInOurStock!') ,
                ]);
            }

            Cart::update($request->rowId, $request->quantity);


            $productTotal = $this->getProductTotal($request->rowId);


            return response()->json([
                'status' => 'success',
                'message' =>__('toastr.product_quantity_updated'),
                'product_total' => $productTotal,
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => 'error',
                'message' => __('toastr.product_quantity_update_failed'),
            ]);
        }
    }



    /** Get Product Total */

    public function getProductTotal($rowId)
    {
       $product = Cart::get($rowId);

       $total = round(($product->price + $product->options->variant_total) * $product->qty,2);

       return $total;
    }

    /** Get Product Subtotal */

    public function cartTotal()
    {
        $cartTotal = 0;

        foreach(Cart::content() as $cart)
        {
            $cartTotal += $this->getProductTotal($cart->rowId);
        }

        return $cartTotal;
    }

    /** Clear all Cart */
    public function clearCart()
    {
        Cart::destroy();

        return response()->json([
            'status' => 'success',
            'message'=>__('toastr.cart_cleared'),
        ]);
    }

        /** Remove Item From Cart */

        public function removeItem($rowId)
        {
            try {

                Cart::remove($rowId);
                notyf()->success(__('toastr.product_removed_from_cart'));
                return redirect()->back();

            } catch (\Exception $e) {

                notyf()->error(__('toastr.failed_to_remove_product_cart'));
                return redirect()->back();
            }
        }


        /** Get Cart Count */

        public function getCartCount()
        {
            return Cart::content()->count();
        }   


        /** get Cart Sidebard */

        public function getCartSidebard()
        {
            return Cart::content();
        }


        /** Remove Sidebard Product */

        public function removeSidebardProduct(Request $request)
        {
            $request->validate([
                'rowId' => ['required'],
            ]);
            try {

                Cart::remove($request->rowId);
                return response()->json([
                    'status' => 'success',
                    'message' =>__('toastr.product_removed')

                ]);

            } catch (\Exception $e) {

                return response()->json([
                    'status' => 'error',
                    'message' =>__('toastr.failed_to_remove_product_cart')


                ]);
            }


        }



        /** get Cart Faciliter */

        public function getCartFaciliter()
        {
            $cartFaciliter = [];
            $cartFaciliter['price_12'] = 0;
            $cartFaciliter['price_24'] = 0;
            $cartFaciliter['price_36'] = 0;
            $cartFaciliter['price_48'] = 0;
            $cartFaciliter['price_60'] = 0;
        
            foreach(\Cart::content() as $cart)
            {
                $cartFaciliter['price_12'] += round( ($cart->options->faciliter['price_12'] * $cart->qty) ,2);
                $cartFaciliter['price_24'] += round( ($cart->options->faciliter['price_24'] * $cart->qty) ,2);
                $cartFaciliter['price_36'] += round( ($cart->options->faciliter['price_36'] * $cart->qty) ,2);
                $cartFaciliter['price_48'] += round( ($cart->options->faciliter['price_48'] * $cart->qty) ,2);
                $cartFaciliter['price_60'] += round( ($cart->options->faciliter['price_60'] * $cart->qty) ,2);
            }
        
            return response()->json([
                'status' => 'success',
                'cart_faciliter_12' =>  $cartFaciliter['price_12'],
                'cart_faciliter_24' =>  $cartFaciliter['price_24'],
                'cart_faciliter_36' =>  $cartFaciliter['price_36'],
                'cart_faciliter_48' =>  $cartFaciliter['price_48'],
                'cart_faciliter_60' =>  $cartFaciliter['price_60'],
            ]);
        }


        /** Get Variants Total */

        public function totalVariantsCart()
        {   
            $variantTotal = 0;

            foreach(\Cart::content() as $cart)
            {
                $variantTotal += round(($cart->options->variant_total) * $cart->qty,2);
            }

            return response()->json([
                'status' => 'success',
                'variant_total' => $variantTotal,
            ]);
        }
}   
