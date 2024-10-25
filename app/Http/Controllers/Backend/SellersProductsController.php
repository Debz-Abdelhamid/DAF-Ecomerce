<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Validation\Rule;

class SellersProductsController extends Controller
{
    public function index(): View
    {
        $products = Product::with(['user','brand','category','subcategory','childcategory'])->whereNot('user_id', auth()->user()->id)->where('is_approved', 1)->latest()->paginate(2);
        return view('admin.products.seller-product.index', compact('products'));
    }


    public function pendingProducts(): View
    {
        $products = Product::with(['user','brand','category','subcategory','childcategory'])->where('is_approved', 0)->latest()->paginate(2);
        return view('admin.products.seller-product.seller-pending-products', compact('products'));
    }

 

    public function ChangeApproveStatus(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
            'value' => ['required', Rule::in([0, 1])],
        ]);

        $product = Product::findOrFail($request->id);
        $product->is_approved = $request->value;
        $product->save();

        return response()->json([
            'message' => 'Product Approve Status has been Changed!'
        ]);

    }

    
}
