<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class FrontendProductController extends Controller
{
    public function showProduct(string $slug)
    {
        $product =  Product::with(['brand','user','galleries','variants' => function($query){

            $query->where('status', 1)
                ->with(['variantitems' => function($query){
                    $query->where('status', 1);
                }]);
        }])
        ->where('slug', $slug)
        ->where('status', 1)
        ->where('is_approved', 1)
        ->first();
        return view('frontend.pages.product-detail', compact('product'));
    }


    public function productsIndex(Request $request)
    {
        if ($request->has('category')) {

            $category = Category::where('slug', $request->category)->firstOrFail();

            $products = Product::with(['category','variants.variantitems','galleries' => function ($query) {
                $query->take(1);
            }])->where([
                'category_id' => $category->id,
                'status' => 1,
                'is_approved' => 1,
            ])->orderByRaw('LEAST(price, offer_price) ASC')->paginate(12);

        } elseif($request->has('subcategory')) {

            $category = Subcategory::where('slug', $request->subcategory)->firstOrFail();

            $products = Product::with(['category','variants.variantitems','galleries' => function ($query) {
                $query->take(1);
            }])->where([
                'subcategory_id' => $category->id,
                'status' => 1,
                'is_approved' => 1,
            ])->orderByRaw('LEAST(price, offer_price) ASC')->paginate(12);

        }elseif($request->has('childcategory'))
        {
            $category = ChildCategory::where('slug', $request->childcategory)->firstOrFail();

            $products = Product::with(['category','variants.variantitems','galleries' => function ($query) {
                $query->take(1);
            }])->where([
                'childcategory_id' => $category->id,
                'status' => 1,
                'is_approved' => 1,
            ])->orderByRaw('LEAST(price, offer_price) ASC')->paginate(12);

        }elseif($request->has('brand'))
        {

            $brand = Brand::where('slug', $request->brand)->firstorFail();

            $products = Product::with(['category','variants.variantitems','galleries' => function ($query) {
                $query->take(1);
            }])->where([
                'brand_id' => $brand->id,
                'status' => 1,
                'is_approved' => 1,
            ])->orderByRaw('LEAST(price, offer_price) ASC')->paginate(12);


            
        }elseif($request->has('search'))
        {
            $products = Product::with(['category', 'variants.variantitems', 'galleries' => function($query) {
                $query->take(1);
            }])
            ->where(['status' => 1, 'is_approved' => 1]) 
            ->where(function($query) use ($request) {
                $query->where(function($subQuery) use ($request) {
                    $subQuery->where('name', 'LIKE', '%'.$request->search.'%')
                              ->orWhere('long_description', 'LIKE', '%'.$request->search.'%'); 
                })
                ->orWhereHas('category', function($query) use ($request) {
                    $query->where('name', 'LIKE', '%'.$request->search.'%')
                          ->orWhere('long_description', 'LIKE', '%'.$request->search.'%');   
                });
            })
            ->orderByRaw('LEAST(price, offer_price) ASC')
            ->paginate(12);


        }else {
            redirect()->route('home');
        }

        $categories = Category::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

        return view('frontend.pages.product', compact(['products','categories','brands']));
    }

    public function ChangeListView(Request $request)
    {
        $request->validate([
            'style' => ['required', Rule::in(['grid','list'])],

        ]);

        Session::put('product_list_style' , $request->style);
    }

}
