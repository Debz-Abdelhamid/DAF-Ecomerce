<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\ChildCategory;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $products = Product::with(['brand','category','subcategory','childcategory'])->where('user_id', auth()->user()->id)->latest()->paginate(10);
        return view('admin.products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::pluck('name','id');
        $brands = Brand::pluck('name','id');
        return view('admin.products.create', compact(['categories', 'brands']));
    }


    public function getSubCategories(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
        ]);

        $category = Category::findOrFail($request->id);
        $subcategories = $category->subcategories()->pluck('name','id');

        return response()->json($subcategories);

    }


    public function getchildCategories(Request $request)
    {
        $request->validate([
            'id' => ['required', 'integer'],
        ]);

        $subcategory = Subcategory::findOrFail($request->id);
        $childcategories = $subcategory->childCategories()->pluck('name','id');

        return response()->json($childcategories);

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([

            'image' => ['required','image','max:3072','mimes:png,jpg,jpeg,avif'],
            'name' => ['required','min:3','max:200'],
            'category' => ['required', 'integer'],
            'sub_category' => ['nullable','integer'],
            'child_category' => ['nullable','integer'],
            'brand' => ['required', Rule::exists('brands', 'id') ],
            'price' => [
               'required',
                'integer',
                'min:0',
                
            ],
            'price_12' => [
                'required',
                'integer',
                'min:0',
               
            ],
            'price_24' => [
               'required',
                'integer',
                'min:0',
                
            ],

            'price_36' => [
                'required',
                'integer',
                'min:0',
                
            ],

            'price_48' => [
                'required',
                'integer',
                'min:0',
                
            ],

            'price_60' => [
                'required',
                'integer',
                'min:0',
                
            ],

            'offer_price' => [
                'nullable',
                'integer',
                'min:0',
                
                function ($attribute, $value, $fail) use ($request) {
                    $price = $request->input('price');
                    $offerStartDate = $request->input('offer_start_date');
                    $offerEndDate = $request->input('offer_end_date');

                    
                    if ($value && (!$offerStartDate || !$offerEndDate)) {
                        $fail('If offer price is provided, both offer start date and offer end date must also be provided.');
                    }

                    
                    if ($value && $price && $value >= $price) {
                        $fail('The offer price must be less than the regular price.');
                    }
                },
            ],



            'offer_start_date' => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $endDate = $request->input('offer_end_date');
                    $offerPrice = $request->input('offer_price');

                    
                    if ($value && (!$endDate || !$offerPrice)) {
                        $fail('If offer start date is provided, offer end date and offer price must also be provided.');
                    }

                    if ($value && Carbon::parse($value)->lt(Carbon::today())) {
                        $fail('The offer start date must be in the future.');
                    }


                    if ($value && $endDate && Carbon::parse($value)->gt(Carbon::parse($endDate))) {
                        $fail('The start date must be before the end date.');
                    }
                },
            ],

            'offer_end_date' => [
                'nullable',
                'date',
                function ($attribute, $value, $fail) use ($request) {
                    $startDate = $request->input('offer_start_date');
                    $offerPrice = $request->input('offer_price');

                    
                    if ($value && (!$startDate || !$offerPrice)) {
                        $fail('If offer end date is provided, offer start date and offer price must also be provided.');
                    }
                    
                    if ($value && Carbon::parse($value)->lt(Carbon::today())) {
                        $fail('The offer end date must be in the future.');
                    }

                    

                    if ($value && $startDate && Carbon::parse($value)->lt(Carbon::parse($startDate))) {
                        $fail('The offer end date must be after the offer start date.');
                    }
                },
            ],

            'qty' => ['required', 'integer', 'min:1'],
            'short_description' => ['required','max:600'],
            'long_description' => ['required'],
            'video_link' => ['nullable','url'],
            'type' => ['required', Rule::in(['تقسيط'])],
            'status' => ['required','boolean', Rule::in([0, 1])],

        ]);

        $category = Category::findOrFail($request->category);

        if ($request->filled('sub_category')) {

            $subcategory = Subcategory::findOrFail($request->sub_category);


            if ($subcategory->category_id !== $category->id) {
                notyf()->error('The selected sub-category does not belong to the selected category. Please check and try again!');
                return redirect()->back();
            }


            if ($request->filled('child_category')) {

                $childcategory = ChildCategory::findOrFail($request->child_category);


                if ($childcategory->subcategory_id !== $subcategory->id) {
                    notyf()->error('The selected child-category does not belong to the selected sub-category. Please check and try again!');
                    return redirect()->back();
                }
            }

        } else if ($request->filled('child_category')) {
            notyf()->error('You have to select a sub-category first!');
            return redirect()->back();
        }


        $imagePath = $this->UploadImage($request, 'image', 'products');

        Product::create([

            'thumb_image' => $imagePath,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $category->id,
            'brand_id' => $request->brand,
            'user_id' => auth()->user()->id,
            'price' => $request->price,
            'price_12' => $request->price_12,
            'price_24' => $request->price_24,
            'price_36' => $request->price_36,
            'price_48' => $request->price_48,
            'price_60' => $request->price_60,
            'qty' => $request->qty,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,

            'is_approved' => 1,
            'status' => $request->status,
            'subcategory_id' => $request->filled('sub_category') ? $request->sub_category : null,
            'childcategory_id' => $request->filled('child_category') ? $request->child_category : null,
            'video_link' => $request->filled('video_link') ? $request->video_link :null,
            'offer_start_date' => $request->filled('offer_start_date') ? $request->offer_start_date : null,
            'offer_end_date' => $request->filled('offer_end_date') ? $request->offer_end_date : null,
            'offer_price' => $request->filled('offer_price') ? $request->offer_price : null,
            'type' => $request->type, 

        ]);

        notyf()->success('Product Created Successfully!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::pluck('name','id');
        $brands = Brand::pluck('name','id');
        $subcategories = Subcategory::where('category_id', $product->category_id)->get();
        $childcategories = ChildCategory::where('subcategory_id', $product->subcategory_id)->get();

        return view('admin.products.edit', compact(['product','categories','brands','subcategories','childcategories']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        
            
                $request->validate([
                    'image' => ['nullable', 'image', 'max:3072', 'mimes:png,jpg,jpeg,avif'],
                    'name' => ['required', 'min:3', 'max:200'],
                    'category' => ['required', 'integer'],
                    'sub_category' => ['nullable', 'integer'],
                    'child_category' => ['nullable', 'integer'],
                    'seo_title' => ['nullable', 'string', 'min:3', 'max:100'],
                    'seo_description' => ['nullable', 'min:3', 'max:250'],
                    'brand' => ['required', Rule::exists('brands', 'id')],
                    'price' => [
                        'required',
                        'integer',
                        'min:0',
                        
                    ],

                    'price_12' => [
                        'required',
                        'integer',
                        'min:0',
                        
                    ],
                    'price_24' => [
                        'required',
                        'integer',
                        'min:0',
                        
                    ],
                    'price_36' => [
                        'required',
                        'integer',
                        'min:0',
                       
                    ],

                    'price_48' => [
                        'required',
                        'integer',
                        'min:0',
                       
                    ],

                    'price_60' => [
                        'required',
                        'integer',
                        'min:0',
                       
                    ],

                    'offer_price' => [
                        'nullable',
                        'integer',
                        'min:0',
                        
                        function ($attribute, $value, $fail) use ($request) {

                            $price = $request->input('price');
                            $offerStartDate = $request->input('offer_start_date');
                            $offerEndDate = $request->input('offer_end_date');

                            if ($value && (!$offerStartDate || !$offerEndDate)) {
                                $fail('If offer price is provided, both offer start date and offer end date must also be provided.');
                            }
        
                            
                            if ($value && $price && $value >= $price) {
                                $fail('The offer price must be less than the regular price.');
                            }
                        },
                    ],

                    'offer_start_date' => [
                        'nullable',
                        'date',
                        function ($attribute, $value, $fail) use ($request) {
                            $endDate = $request->input('offer_end_date');
                            $offerPrice = $request->input('offer_price');
                            
                            if ($value && (!$endDate || !$offerPrice)) {
                                $fail('If offer start date is provided, offer end date and offer price must also be provided.');
                            }

                            if ($value && $endDate && Carbon::parse($value)->gt(Carbon::parse($endDate))) {
                                $fail('The start date must be before the end date.');
                            }
                        },
                    ],
                    'offer_end_date' => [
                        'nullable',
                        'date',
                        function ($attribute, $value, $fail) use ($request) {
                            $startDate = $request->input('offer_start_date');
                            $offerPrice = $request->input('offer_price');
                           
                            if ($value && (!$startDate || !$offerPrice)) {
                                $fail('If offer end date is provided, offer start date and offer price must also be provided.');
                            }

                            if ($value && $startDate && Carbon::parse($value)->lt(Carbon::parse($startDate))) {
                                $fail('The offer end date must be after the offer start date.');
                            }
                        },
                    ],
                    'qty' => ['required', 'integer', 'min:1'],
                    'short_description' => ['required', 'max:600'],
                    'long_description' => ['required'],
                    'video_link' => ['nullable', 'url'],
                    'sku' => ['nullable', 'string', 'max:200'],
                    'type' => ['required', Rule::in(['تقسيط'])],
                    'status' => ['required', 'boolean', Rule::in([0, 1])],
                ]);


                $category = Category::findOrFail($request->category);

                if ($request->filled('sub_category')) {
        
                    $subcategory = Subcategory::findOrFail($request->sub_category);
        
        
                    if ($subcategory->category_id !== $category->id) {
                        notyf()->error('The selected sub-category does not belong to the selected category. Please check and try again!');
                        return redirect()->back();
                    }
        
        
                    if ($request->filled('child_category')) {
        
                        $childcategory = ChildCategory::findOrFail($request->child_category);
        
        
                        if ($childcategory->subcategory_id !== $subcategory->id) {
                            notyf()->error('The selected child-category does not belong to the selected sub-category. Please check and try again!');
                            return redirect()->back();
                        }
                    }
        
                } else if ($request->filled('child_category')) {
                    notyf()->error('You have to select a sub-category first!');
                    return redirect()->back();
                }

            
            $imagePath = $this->UpdateImage($request, 'image', 'products', $product->thumb_image);

            
            $product->update([
                'thumb_image' => $imagePath,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category,
                'brand_id' => $request->brand,
                'price' => $request->price,
                'price_12' => $request->price_12,
                'price_24' => $request->price_24,
                'price_36' => $request->price_36,
                'price_48' => $request->price_48,
                'price_60' => $request->price_60,
                'qty' => $request->qty,
                'short_description' => $request->short_description,
                'long_description' => $request->long_description,
                'status' => $request->status,
                'subcategory_id' => $request->filled('sub_category') ? $request->sub_category : null,
                'childcategory_id' => $request->filled('child_category') ? $request->child_category : null,
                'sku' => $request->filled('sku') ? $request->sku : null,
                'video_link' => $request->filled('video_link') ? $request->video_link : null,
                'offer_start_date' => $request->filled('offer_start_date') ? $request->offer_start_date : null,
                'offer_end_date' => $request->filled('offer_end_date') ? $request->offer_end_date : null,
                'seo_title' => $request->filled('seo_title') ? $request->seo_title : null,
                'seo_description' => $request->filled('seo_description') ? $request->seo_description : null,
                'offer_price' => $request->filled('offer_price') ? $request->offer_price : null,
                'type' => $request->filled('type') ? $request->type : null,
            ]);

        
            notyf()->success('Product Updated Successfully!');
            return redirect()->route('admin.product.index');

        
    }


    public function ChangeStatus(Request $request)
    {
        $request->validate([
            
            'id' => ['required', 'integer'],
            'status' => ['required', Rule::in(['true', 'false'])],
        ]);
        
        $product = Product::findOrFail($request->id);
        $product->status = $request->status == 'true' ? 1 : 0 ;
        $product->save();
        
        return response()->json([
            'message' => 'Status has been updated!'
        ]);
        
    }
    
    
    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        if ($product->orders()->exists()) {
            
            return response()->json([
                'status' => 'error',
                'message' => 'This Product Have Orders , You Must Delete The Order First!',
            ]);

        }

        $this->DeleteImage($product->thumb_image);

        $images = $product->galleries;

        foreach($images as $image)
        {
            $this->DeleteImage($image->image);

        }

        $product->delete();

        return response()->json([
            'status' => 'success',
            'type' => 'product',
            'message' => 'Product deleted successfully!'
        ]);

    }


}
