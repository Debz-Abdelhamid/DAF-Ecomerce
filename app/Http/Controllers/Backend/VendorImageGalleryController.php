<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Productgallery;
use App\Traits\ImageUploadTrait;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;

class VendorImageGalleryController extends Controller
{
    use ImageUploadTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {


        $request->validate([
            'product'=> ['integer'],
        ]);

        $productItem = Product::findOrFail($request->product);

        Gate::authorize('view', $productItem);

        $ImageGallery = Productgallery::where('product_id', $productItem->id)->latest()->paginate(5);

        return view('vendor.products.image-gallery.index', compact(['productItem','ImageGallery']));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product' => ['required', 'integer'],
            'image' => ['required', 'array', 'max:5'],
            'image.*' => ['required','image','mimes:png,jpg,jpeg,avif','max:2048'],
        ]);

        $product = Product::findOrFail($request->product);

        Gate::authorize('update', $product);
        

        $images = $this->UploadMultipleImage($request, 'image', 'products');

        foreach($images as $image)
        {
            $product->galleries()->create([
                'image' => $image,
            ]);
        }

        notyf()->success(__('toastr.UploadedSuccessfully'));
        return redirect()->back();
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ImageGallery = Productgallery::findOrFail($id);

        $product = $ImageGallery->product;

        Gate::authorize('delete', $product);

        $this->DeleteImage($ImageGallery->image);

        $ImageGallery->delete();

        notyf()->success(__('toastr.Imagedeletedsuccessfully'));
        return redirect()->back();

    }
}
