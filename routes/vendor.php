
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\VendorController;
use App\Http\Controllers\Backend\VendorProfileController;
use App\Http\Controllers\Backend\VendorShopProfileController;
use App\Http\Controllers\Backend\VendorProductController;
use App\Http\Controllers\Backend\VendorImageGalleryController;
use App\Http\Controllers\Backend\VendorProductVariantController;
use App\Http\Controllers\Backend\VendorProductVariantItemsController;
use App\Http\Controllers\Backend\VendorOrderController;



    /** Vendor Route */
    /** ---------------------------*/

    /** Vendor Dashboard */
Route::get('dashboard',[VendorController::class,'Dashboard'])->name('dashboard');


    /** Vendor Profile */
Route::get('profile', [VendorProfileController::class, 'index'])->name('profile');
Route::patch('/profile',[VendorProfileController::class, 'UpdateProfile'])->name('profile.update');
Route::patch('/profile/Avatar',[VendorProfileController::class, 'UpdateImage'])->name('profile.updateAvatar');
Route::put('profile/updatePassword',[VendorProfileController::class, 'UpdatePassword'])->name('profile.Password');



/** Products Routes */
Route::put('product/change-status', [VendorProductController::class, 'ChangeStatus'])->name('product.change-status');
Route::get('product/get-subcategories', [VendorProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-childcategories', [VendorProductController::class, 'getchildCategories'])->name('product.get-childcategories');
Route::resource('product', VendorProductController::class);


/** Products Image Gallery */
Route::resource('product-image-gallery', VendorImageGalleryController::class);


/** Products Variant */

Route::put('product-variant/change-status', [VendorProductVariantController::class, 'ChangeStatus'])->name('product-variant.change-status');
Route::resource('product-variant', VendorProductVariantController::class);

/** Products Variant Item */

Route::get('product-variant-item/{product_id}/{variant_id}',[VendorProductVariantItemsController::class, 'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{product_id}/{variant_id}',[VendorProductVariantItemsController::class, 'create'])->name('product-variant-item.create');
Route::post('product-variant-item',[VendorProductVariantItemsController::class, 'store'])->name('product-variant-item.store');
Route::get('product-variant-item-edit/{id}',[VendorProductVariantItemsController::class, 'edit'])->name('product-variant-item.edit');
Route::put('product-variant-item-update/{id}',[VendorProductVariantItemsController::class, 'update'])->name('product-variant-item.update');
Route::put('product-variant-item-status',[VendorProductVariantItemsController::class, 'ChangeStatus'])->name('product-variant-item.change-status');
Route::delete('product-variant-item/{id}',[VendorProductVariantItemsController::class, 'destroy'])->name('product-variant-item.destroy');


/** Orders Routes  */

Route::get('orders', [VendorOrderController::class, 'index'])->name('orders.index');
Route::get('orders/show/{id}', [VendorOrderController::class, 'show'])->name('orders.show');
Route::put('order/change-status/{id}',[VendorOrderController::class, 'ChangeStatus'])->name('order.change-status');
