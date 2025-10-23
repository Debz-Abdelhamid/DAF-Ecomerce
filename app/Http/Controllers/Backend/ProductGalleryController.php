<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Productgallery;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\ImageUploadTrait;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ProductGalleryController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $request->validate([
            'product'=> ['integer'],
        ]);

        $productItem = Product::findOrFail($request->product);

        $ImageGallery = Productgallery::where('product_id', $productItem->id)->latest()->paginate(10);
        return view('admin.products.image-gallery.index', compact(['productItem','ImageGallery']));
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


        $images = $this->UploadMultipleImage($request, 'image', 'products');

        foreach($images as $image)
        {
            $product->galleries()->create([
                'image' => $image,
            ]);
        }

        notyf()->success(__('toastr.ImagesUploadedSuccessfully'));
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

        $this->DeleteImage($ImageGallery->image);

        $ImageGallery->delete();

        return response()->json([
            'status' => 'success',
            'type' => 'imageGallery',
            'message' =>__('toastr.Imagedeletedsuccessfully')
        ]);
    }
}
