<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\FlashSaleController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\ProductTrackController;



Route::get('/',[HomeController::class, 'index'])->name('home');



require __DIR__.'/auth.php';



    /** Flash Sales */

    Route::get('flash-sale',[FlashSaleController::class, 'index'])->name('flash-sale');

    /** Product Details Route */

    Route::get('products',[FrontendProductController::class, 'productsIndex'])->name('products.index');
    Route::get('product-detail/{slug}',[FrontendProductController::class, 'showProduct'])->name('product-detail');
    Route::get('change-product-list-view',[FrontendProductController::class, 'ChangeListView'])->name('change-product-list-view');

    /**  Cart Routes */
    Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
    Route::get('cart-details', [CartController::class, 'cartDetails'])->name('cart-details');
    Route::post('cart/update-quantity', [CartController::class, 'updateProductQty'])->name('cart-update-quantity');
    Route::get('clear-cart', [CartController::class, 'clearCart'])->name('clear.cart');
    Route::get('cart/remove-item/{rowId}', [CartController::class, 'removeItem'])->name('cart.remove-item');
    Route::get('cart-count', [CartController::class, 'getCartCount'])->name('cart.count');
    Route::get('cart-sidebard', [CartController::class, 'getCartSidebard'])->name('cart.sidebard');
    Route::get('cart/sidebard-product-subtotal', [CartController::class, 'cartTotal'])->name('cart.sidebard-product-subtotal');

    Route::get('cart/facliter', [CartController::class, 'getCartFaciliter'])->name('cart.faciliter');
    Route::get('cart/total-variants', [CartController::class, 'totalVariantsCart'])->name('cart.total-variants');


    /**Product Track Routes */
    
    Route::get('product-tracking', [ProductTrackController::class, 'index'])->name('product-tracking.index');
    


/** Users Routes */
Route::prefix('user')->name('user.')->group(function () {

    

    

    /** Checkout Routes */

    Route::get('checkout',[CheckoutController::class, 'index'])->name('checkout');
    Route::post('checkout/form-submit',[CheckoutController::class, 'checkoutFormSubmit'])->name('checkout.form-submit');

    
});