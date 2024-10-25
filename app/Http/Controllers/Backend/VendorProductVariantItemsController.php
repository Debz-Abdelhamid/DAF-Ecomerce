<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class VendorProductVariantItemsController extends Controller
{
    public function index(string $productId, string $variantId): View|RedirectResponse 
    {
        $product = Product::findOrFail($productId);
        Gate::authorize('view', $product);
        $variant = ProductVariant::findOrFail($variantId);

        if($variant->product_id !== $product->id)
        {
            notyf()->error('Error!');
            return redirect()->back();
        }

        $variantitems = ProductVariantItem::with('productvariant')->where('product_variant_id', $variant->id)->latest()->paginate(10);

        return view('vendor.products.product-variant-item.index', compact(['product','variant','variantitems']));
    }

    public function create(string $productId, string $variantId): View|RedirectResponse
    {
        
        $product = Product::findOrFail($productId);
        Gate::authorize('view', $product);
        $variant = ProductVariant::findOrFail($variantId);

        if($variant->product_id !== $product->id)
        {
            notyf()->error('Error!');
            return redirect()->back();
        }
        
        return view('vendor.products.product-variant-item.create', compact(['product','variant']));

    }

    public function store(Request $request): RedirectResponse
    {
        
        $request->validate([
            'variant_id' => ['required','integer'],
            'product_id' => ['required','integer'],
            'name' => ['required','max:200'],
            'price' => [
                'required',
                'integer',
                'min:0',
            
            ],
            'is_default' => ['required','boolean', Rule::in([0, 1])],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);

        $product = Product::findOrFail($request->product_id);
        Gate::authorize('update', $product);

        $variant = ProductVariant::findOrFail($request->variant_id);

        if($variant->product_id != $request->product_id)
        {
            notyf()->error('Error!');
            return redirect()->back();
        }

        $variant->variantitems()->create([
            'name' => $request->name,
            'price' => $request->price,
            'is_default' => $request->is_default,
            'status' => $request->status,
        ]);

        notyf()->success('Variant Item Created Successfully!');
        return redirect()->route('vendor.product-variant-item.index',['product_id' => $variant->product_id, 'variant_id' => $variant->id]);

    }

    public function edit(string $id)
    {   

         $variantItem = ProductVariantItem::findOrFail($id);

         $product = $variantItem->productvariant->product;
         Gate::authorize('update', $product);

         return view('vendor.products.product-variant-item.edit', compact('variantItem'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([

            'name' => ['required','max:200'],
            'price' => [
                'required',
                'integer',
                'min:0',
                
            ],
            'is_default' => ['required','boolean', Rule::in([0, 1])],
            'status' => ['required','boolean', Rule::in([0, 1])],
        ]);

        $variantItem = ProductVariantItem::findOrFail($id);

        $product = $variantItem->productvariant->product;
         Gate::authorize('update', $product);


        $variantItem->update([
            'name' => $request->name,
            'price' => $request->price,
            'is_default' => $request->is_default,
            'status' => $request->status,
        ]);

        notyf()->success('Variant Item Updated Successfully!');
        return redirect()->route('vendor.product-variant-item.index',['product_id' => $variantItem->productvariant->product_id, 'variant_id' => $variantItem->product_variant_id]);

    }


    public function destroy(string $id)
    {
        $variantItem = ProductVariantItem::findOrFail($id);

        $product = $variantItem->productvariant->product;
        Gate::authorize('delete', $product);

        $variantItem->delete();

        return redirect()->back();

    }

    public function ChangeStatus(Request $request)
    {
        $request->validate([

            'id' => ['required', 'integer'],
            'status' => ['required', Rule::in(['true', 'false'])],
        ]);

        $variantItem = ProductVariantItem::findOrFail($request->id);
        $product = $variantItem->productvariant->product;
        Gate::authorize('update', $product);
        $variantItem->status = $request->status == 'true' ? 1 : 0 ;
        $variantItem->save();

        return response()->json([
            'message' => 'Status has been updated!'
        ]);

    }
}
