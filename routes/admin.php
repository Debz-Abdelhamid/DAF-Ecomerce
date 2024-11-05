<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubcategoryController;
use App\Http\Controllers\Backend\ChildCategoryController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductGalleryController;
use App\Http\Controllers\Backend\ProductVariantController;
use App\Http\Controllers\Backend\ProductVariantItemController;
use App\Http\Controllers\Backend\SellersProductsController;
use App\Http\Controllers\Backend\FlashSellController;
use App\Http\Controllers\Backend\SettingsController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\HomePageSettingController;
use App\Http\Controllers\Backend\UsersController;




   /** Admin Routes */

/** ------------ */

/** Admin Dashboard */
Route::get('dashboard', [AdminController::class, 'Dashboard'])->name('dashboard');

/** Profile Routes */
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::patch('profile/update', [ProfileController::class, 'UpdateProfile'])->name('profile.update');
Route::patch('profile/update/Image', [ProfileController::class, 'UpdateImage'])->name('profile.updateImage');
Route::put('profile/update/password', [ProfileController::class, 'UpdatePassword'])->name('profile.updatePassword');

/** Slider Routes */
Route::resource('slider', SliderController::class);

/** Category Routes */
Route::put('change-status', [CategoryController::class, 'ChangeStatus'])->name('category.change-status');
Route::resource('category', CategoryController::class);

/** Subcategory Routes */
Route::put('subcategory/change-status', [SubcategoryController::class, 'ChangeStatus'])->name('sub-category.change-status');
Route::resource('sub-category', SubcategoryController::class);

/** ChildCategory Routes */
Route::put('childcategory/change-status', [ChildCategoryController::class, 'ChangeStatus'])->name('child-category.change-status');
Route::get('get-subcategories', [ChildCategoryController::class, 'getSubCategories'])->name('get-subcategories');
Route::resource('child-category', ChildCategoryController::class);

/** Brand Routes */
Route::put('brand/change-status', [BrandController::class, 'ChangeStatus'])->name('brand.change-status');
Route::resource('brand', BrandController::class);



/** Products Routes */
Route::put('product/change-status', [ProductController::class, 'ChangeStatus'])->name('product.change-status');
Route::get('product/get-subcategories', [ProductController::class, 'getSubCategories'])->name('product.get-subcategories');
Route::get('product/get-childcategories', [ProductController::class, 'getchildCategories'])->name('product.get-childcategories');
Route::resource('product', ProductController::class);

/** Products Image Gallery */
Route::resource('product-image-gallery', ProductGalleryController::class);

/** Products Variant */
Route::put('product-variant/change-status', [ProductVariantController::class, 'ChangeStatus'])->name('product-variant.change-status');
Route::resource('product-variant', ProductVariantController::class);

/** Products Variant Item */

Route::get('product-variant-item/{product_id}/{variant_id}',[ProductVariantItemController::class, 'index'])->name('product-variant-item.index');
Route::get('product-variant-item/create/{product_id}/{variant_id}',[ProductVariantItemController::class, 'create'])->name('product-variant-item.create');
Route::post('product-variant-item',[ProductVariantItemController::class, 'store'])->name('product-variant-item.store');
Route::get('product-variant-item-edit/{id}',[ProductVariantItemController::class, 'edit'])->name('product-variant-item.edit');
Route::put('product-variant-item-update/{id}',[ProductVariantItemController::class, 'update'])->name('product-variant-item.update');
Route::put('product-variant-item-status',[ProductVariantItemController::class, 'ChangeStatus'])->name('product-variant-item.change-status');
Route::delete('product-variant-item/{id}',[ProductVariantItemController::class, 'destroy'])->name('product-variant-item.destroy');


/** Sellers Products */


Route::get('seller-products',[SellersProductsController::class, 'index'])->name('seller-products.index');


/** Seller Pending  Products*/

Route::get('seller-pending-products',[SellersProductsController::class, 'pendingProducts'])->name('seller-pending-products.index');


/** Change Approved Status */
Route::put('change-approve-status',[SellersProductsController::class, 'ChangeApproveStatus'])->name('change-approve-status');


/** Flash Sell Routes  */

Route::get('flash-sale',[FlashSellController::class, 'index'])->name('flash-sale.index');
Route::put('flash-sale',[FlashSellController::class, 'update'])->name('flash-sale.update');
Route::post('flash-sale/add-product',[FlashSellController::class, 'addProduct'])->name('flash-sale.add-product');
Route::put('flash-sale/show-home',[FlashSellController::class, 'showHome'])->name('flash-sale.show-home');
Route::put('flash-sale/change-status',[FlashSellController::class, 'ChangeStatus'])->name('flash-sale.change-status');
Route::delete('flash-sale/{id}',[FlashSellController::class, 'destroy'])->name('flash-sale.destroy');

/** Order Roures */
Route::put('order/change-status',[OrderController::class, 'ChangeStatus'])->name('order.change-status');
Route::get('order-pending',[OrderController::class, 'pendingOrders'])->name('order-pending');
Route::get('order-destribution',[OrderController::class, 'destributionOrders'])->name('order-destribution');
Route::get('order-delivered',[OrderController::class, 'deliveredOrders'])->name('order-delivered');
Route::get('order-canceled',[OrderController::class, 'canceledOrders'])->name('order-canceled');
Route::resource('order', OrderController::class);


/** Settings Routes */

Route::get('settings',[SettingsController::class, 'index'])->name('settings.index');
Route::put('general-settings-update',[SettingsController::class, 'updateGeneralSettings'])->name('general-settings-update');

/** Home Page Setting Routes */

Route::get('home-page-setting',[HomePageSettingController::class, 'index'])->name('home-page-setting');
Route::put('popular-category-section',[HomePageSettingController::class, 'UpdatePopularCategorySection'])->name('popular-category-section');

/** Gérer Users Routes */

Route::get('users',[UsersController::class, 'index'])->name('users.index');
Route::post('users',[UsersController::class, 'store'])->name('users.store');
Route::get('users/create',[UsersController::class, 'create'])->name('users.create');
Route::get('users/{id}/edit',[UsersController::class, 'edit'])->name('users.edit');
Route::put('users/update/{id}',[UsersController::class, 'update'])->name('users.update');
Route::delete('users/{id}',[UsersController::class, 'destroy'])->name('users.destroy');




