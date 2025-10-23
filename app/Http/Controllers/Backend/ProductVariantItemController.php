<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantItem;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class ProductVariantItemController extends Controller
{
    public function index(string $productId, string $variantId): View|RedirectResponse
    {
        $product = Product::findOrFail($productId);
        $variant = ProductVariant::findOrFail($variantId);

        if($variant->product_id !== $product->id)
        {
            return redirect()->back();
        }

        $variantitems = ProductVariantItem::with('productvariant')->where('product_variant_id', $variant->id)->latest()->paginate(10);

        return view('admin.products.product-variant-item.index', compact(['product','variant','variantitems']));
    }

    public function create(string $productId, string $variantId): View|RedirectResponse
    {
        
        $variant = ProductVariant::findOrFail($variantId);
        $product = Product::findOrFail($productId);

        if($variant->product_id !== $product->id)
        {
            return redirect()->back();
        }
        
        return view('admin.products.product-variant-item.create', compact(['product','variant']));

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



        $variant = ProductVariant::findOrFail($request->variant_id);

        if($variant->product_id != $request->product_id)
        {
            notyf()->error(__('toastr.Error'));
            return redirect()->back();
        }

        $variant->variantitems()->create([
            'name' => $request->name,
            'price' => $request->price,
            'is_default' => $request->is_default,
            'status' => $request->status,
        ]);

        notyf()->success(__('toastr.VariantCreatedSuccessfully'));
        return redirect()->route('admin.product-variant-item.index',['product_id' => $variant->product_id, 'variant_id' => $variant->id]);

    }

    public function edit(string $id)
    {   

         $variantItem = ProductVariantItem::findOrFail($id);
         return view('admin.products.product-variant-item.edit', compact('variantItem'));
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


        $variantItem->update([
            'name' => $request->name,
            'price' => $request->price,
            'is_default' => $request->is_default,
            'status' => $request->status,
        ]);

        notyf()->success(__('toastr.VariantCreatedSuccessfullyy'));
        return redirect()->route('admin.product-variant-item.index',['product_id' => $variantItem->productvariant->product_id, 'variant_id' => $variantItem->product_variant_id]);

    }


    public function destroy(string $id)
    {
        $variantItem = ProductVariantItem::findOrFail($id);

        $variantItem->delete();

        return response()->json([
            'status' => 'success',
            'message' =>__('toastr.Variantdeletedsuccessfully')
        ]);

    }

    public function ChangeStatus(Request $request)
    {
        $request->validate([

            'id' => ['required', 'integer'],
            'status' => ['required', Rule::in(['true', 'false'])],
        ]);

        $variantItem = ProductVariantItem::findOrFail($request->id);
        $variantItem->status = $request->status == 'true' ? 1 : 0 ;
        $variantItem->save();

        return response()->json([
            'message' =>__('toastr.Statushasbeenupdated')
        ]);

    }
}
