<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ProductVariant;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;


class VendorProductVariantController extends Controller
{
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


        $ProductVariant = ProductVariant::where('product_id', $productItem->id)->latest()->paginate(10);

        return view('vendor.products.product-variant.index', compact(['productItem','ProductVariant']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request): View
    {
        $request->validate([
            'product'=> ['integer'],
        ]);

        $product = Product::findOrFail($request->product);

        Gate::authorize('view', $product);

        return view('vendor.products.product-variant.create', compact('product'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required','max:200'],
            'product' => ['required', 'integer'],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);

        $product = Product::findOrFail($request->product);

        Gate::authorize('update', $product);

        $product->variants()->create([
            'name' => $request->name,
            'status'=> $request->status
        ]);

        notyf()->success(__('toastr.VariantCreatedSuccessfully'));
        return redirect()->route('vendor.product-variant.index',['product' => $product->id]);
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
    public function edit(Request $request,string $id): View
    {
        $request->validate([
            'product'=> ['required','integer'],
        ]);


        $variant = ProductVariant::findOrFail($id);
        $product = $variant->product;

        Gate::authorize('update', $product);

        return view('vendor.products.product-variant.edit', compact('variant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required','max:200'],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);

        $variant = ProductVariant::findOrFail($id);
        $product = $variant->product;

        Gate::authorize('update', $product);

        $variant->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

        notyf()->success(__('toastr.VariantCreatedSuccessfullyy'));
        return redirect()->route('vendor.product-variant.index',['product' => $variant->product_id]);
    }

    public function ChangeStatus(Request $request)
    {
        $request->validate([

            'id' => ['required', 'integer'],
            'status' => ['required', Rule::in(['true', 'false'])],
        ]);

        $variant = ProductVariant::findOrFail($request->id);
        $product = $variant->product;

        Gate::authorize('update', $product);
        $variant->status = $request->status == 'true' ? 1 : 0 ;
        $variant->save();

        return response()->json([
            'message' =>__('toastr.Statushasbeenupdated')
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $variant = ProductVariant::findOrFail($id);
        $product = $variant->product;

        Gate::authorize('delete', $product);
        $variant->delete();

        notyf()->success(__('toastr.Variantdeletedsuccessfully'));
        return redirect()->back();
    }
}
