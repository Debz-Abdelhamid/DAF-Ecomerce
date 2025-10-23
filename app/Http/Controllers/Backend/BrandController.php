<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ImageUploadTrait;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class BrandController extends Controller
{
    use ImageUploadTrait;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $brands = Brand::latest()->paginate(10);
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'logo' => ['required','image','max:2048','mimes:png,jpg,jpeg,avif'],
            'name' => ['required','max:200', Rule::unique(Brand::class)],
            'is_featured' => ['required','boolean', Rule::in([0, 1])],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);

        $logoPath = $this->UploadImage($request, 'logo', 'Brands');

        Brand::create([

            'logo' => $logoPath,
            'name'=> $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
            'is_featured' => $request->is_featured,

        ]);

        notyf()->success(__('toastr.SubBrandCreatedSuccessfully'));
        return redirect()->route('admin.brand.index');
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
    public function edit(Brand $brand): View
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brand $brand): RedirectResponse
    {
        $request->validate([
            'logo' => ['nullable','image','max:2048','mimes:png,jpg,jpeg,avif'],
            'name' => ['required','max:200', Rule::unique(Brand::class)->ignore($brand->id)],
            'is_featured' => ['required','boolean', Rule::in([0, 1])],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);

        $logoPath = $this->UpdateImage($request, 'logo','Brands', $brand->logo);

        $brand->update([

            'logo' => $logoPath,
            'name'=> $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
            'is_featured' => $request->is_featured,
        ]);

        notyf()->success(__('toastr.BrandUpdatedSuccessfully'));
        return redirect()->route('admin.brand.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {

        if ($brand->products()->exists()) {
            return response()->json([
                'status' => 'error',
                'message' =>__('toastr.ThisBrandHaveProducts'),
            ]);
        }

        $this->DeleteImage($brand->logo);

        
        $brand->delete();

        return response()->json([
            'status' => 'success',
            'type' => 'Brand',
            'message' =>__('toastr.ThisBrandHaveProducts'),
        ]);
    }

    public function ChangeStatus(Request $request)
    {
        $request->validate([

            'id' => ['required', 'integer'],
            'status' => ['required', Rule::in(['true', 'false'])],
        ]);

        $brand = Brand::findOrFail($request->id);
        $brand->status = $request->status == 'true' ? 1 : 0 ;
        $brand->save();

        return response()->json([
            'message' =>__('toastr.Statushasbeenupdated')
        ]);

    }
}
