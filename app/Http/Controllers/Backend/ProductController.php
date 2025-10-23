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
use Illuminate\Support\Facades\Cache;

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

            'offer_price' => [
                'nullable',
                'integer',
                'min:0',
                
                function ($attribute, $value, $fail) use ($request) {
                    $price = $request->input('price');
                    $offerStartDate = $request->input('offer_start_date');
                    $offerEndDate = $request->input('offer_end_date');

                    
                    if ($value && (!$offerStartDate || !$offerEndDate)) {
                        $fail(__('toastr.ifoffe'));
                    }

                    
                    if ($value && $price && $value >= $price) {
                        $fail(__('toastr.Theoffer'));
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
                        $fail(__('toastr.ifoffersta'));
                    }

                    if ($value && Carbon::parse($value)->lt(Carbon::today())) {
                        $fail(__('toastr.offerstartdatemust'));
                    }


                    if ($value && $endDate && Carbon::parse($value)->gt(Carbon::parse($endDate))) {
                        $fail(__('toastr.Thestartdatemustbebeforetheenddate'));
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
                        $fail(__('toastr.ifoffersta'));
                    }
                    
                    if ($value && Carbon::parse($value)->lt(Carbon::today())) {
                        $fail(__('toastr.offerstartdatemust'));
                    }

                    

                    if ($value && $startDate && Carbon::parse($value)->lt(Carbon::parse($startDate))) {
                        $fail(__('toastr.Thestartdatemustbebeforetheenddate'));
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
                notyf()->error(__('toastr.The_selected'));
                return redirect()->back();
            }


            if ($request->filled('child_category')) {

                $childcategory = ChildCategory::findOrFail($request->child_category);


                if ($childcategory->subcategory_id !== $subcategory->id) {
                    notyf()->error(__('toastr.The_selected'));
                    return redirect()->back();
                }
            }

        } else if ($request->filled('child_category')) {
            notyf()->error(__('toastr.Youhaveselectasubcategoryfirst'));
            return redirect()->back();
        }

         $price = $request->price;
        $price_12 = calculateRemboursement($price, 1);
        $price_24 = calculateRemboursement($price, 2);
        $price_36 = calculateRemboursement($price, 3);
        $price_48 = calculateRemboursement($price, 4);
        $price_60 = calculateRemboursement($price, 5);


        $imagePath = $this->UploadImage($request, 'image', 'products');

        Product::create([

            'thumb_image' => $imagePath,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $category->id,
            'brand_id' => $request->brand,
            'user_id' => auth()->user()->id,
            'price' => $request->price,
            'price_12' => $price_12,
            'price_24' => $price_24,
            'price_36' => $price_36,
            'price_48' => $price_48,
            'price_60' => $price_60,
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

        Cache::forget('dashboard_stats');
        Cache::forget('vendor_dashboard_stats');

        notyf()->success(__('toastr.ProductCreatedSuccessfully'));
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

                   

                    'offer_price' => [
                        'nullable',
                        'integer',
                        'min:0',
                        
                        function ($attribute, $value, $fail) use ($request) {

                            $price = $request->input('price');
                            $offerStartDate = $request->input('offer_start_date');
                            $offerEndDate = $request->input('offer_end_date');

                            if ($value && (!$offerStartDate || !$offerEndDate)) {
                                $fail(__('toastr.offerprp'));
                            }
        
                            
                            if ($value && $price && $value >= $price) {
                                $fail(__('toastr.offerprpp'));
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
                                $fail(__('toastr.offerprppp'));
                            }

                            if ($value && $endDate && Carbon::parse($value)->gt(Carbon::parse($endDate))) {
                                $fail(__('toastr.offerprpppp'));
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
                                $fail(__('toastr.offerprppppp'));
                            }

                            if ($value && $startDate && Carbon::parse($value)->lt(Carbon::parse($startDate))) {
                                $fail(__('toastr.offerprpppppp'));
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
                        notyf()->error(__('toastr.offerprppppppp'));
                        return redirect()->back();
                    }
        
        
                    if ($request->filled('child_category')) {
        
                        $childcategory = ChildCategory::findOrFail($request->child_category);
        
        
                        if ($childcategory->subcategory_id !== $subcategory->id) {
                            notyf()->error(__('toastr.offerprppppppp'));
                            return redirect()->back();
                        }
                    }
        
                } else if ($request->filled('child_category')) {
                    notyf()->error(__('toastr.offerprpppppppp'));
                    return redirect()->back();
                }

                $price = $request->price;
                $price_12 = calculateRemboursement($price, 1);
                $price_24 = calculateRemboursement($price, 2);
                $price_36 = calculateRemboursement($price, 3);
                $price_48 = calculateRemboursement($price, 4);
                $price_60 = calculateRemboursement($price, 5);

            
            $imagePath = $this->UpdateImage($request, 'image', 'products', $product->thumb_image);

            
            $product->update([
                'thumb_image' => $imagePath,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category,
                'brand_id' => $request->brand,
                'price' => $request->price,
                'price_12' => $price_12,
                'price_24' => $price_24,
                'price_36' => $price_36,
                'price_48' => $price_48,
                'price_60' => $price_60,
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

            Cache::forget('dashboard_stats');
            Cache::forget('vendor_dashboard_stats');
            notyf()->success(__('toastr.ProductUpdatedSuccessfully'));
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

        Cache::forget('dashboard_stats');
        Cache::forget('vendor_dashboard_stats');
        
        return response()->json([
            'message' =>__('toastr.Statushasbeenupdated')
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
                'message' =>__('toastr.pk'),
            ]);

        }

        $this->DeleteImage($product->thumb_image);

        $images = $product->galleries;

        foreach($images as $image)
        {
            $this->DeleteImage($image->image);

        }

        $product->delete();

        Cache::forget('dashboard_stats');
        Cache::forget('vendor_dashboard_stats');

        return response()->json([
            'status' => 'success',
            'type' => 'product',
            'message' =>__('toastr.ProductAddedSuccessfully') 
        ]);

    }


}
