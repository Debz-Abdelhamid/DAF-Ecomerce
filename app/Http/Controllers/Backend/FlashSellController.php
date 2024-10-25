<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FlashSell;
use App\Models\FlashSellItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;


class FlashSellController extends Controller
{
    public function index(): View
    {
        $FlashSellProducts = FlashSellItem::with('productitem')->orderBy('id','DESC')->paginate(10);
        $flashSaleDate = FlashSell::first();
        $products = Product::where('is_approved', 1)->where('status', 1)->orderBy('id','DESC')->pluck('name','id');
        return view('admin.flash-sale.index', compact('flashSaleDate', 'products', 'FlashSellProducts'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'sale_end_date' => ['required','date'],
        ]);

        FlashSell::updateOrCreate(['id' => 1],['sale_end_date' => $request->sale_end_date]);

        notyf()->success('Flash Sale Updated Successfully');

       return  redirect()->back();

    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'product' => ['required', Rule::exists('products','id'),'unique:flash_sell_items,product_id'],
            'show' => ['required','boolean', Rule::in([0, 1])],
            'status' => ['required','boolean', Rule::in([0, 1])],

        ],[
            'product.unique' => 'The Product is already in the Flash Sale',
        ]);

        $flashSaleDate = FlashSell::first();

        FlashSellItem::create([

            'flash_sell_id' => $flashSaleDate->id,
            'product_id' => $request->product,
            'show_at_home' => $request->show,
            'status' => $request->status,

        ]);

        notyf()->success('Product Added Successfully!');

        return redirect()->back();


    }

    public function showHome(Request $request)
    {

        $request->validate([

            'id' => ['required', 'integer'],
            'show' => ['required', Rule::in(['true', 'false'])],
        ]);

        $flashsaleitem = FlashSellItem::findOrFail($request->id);
        $flashsaleitem->show_at_home = $request->show == 'true' ? 1 : 0 ;
        $flashsaleitem->save();

        return response()->json([
            'message' => 'Show Home Status has been updated!'
        ]);
    }


    public function ChangeStatus(Request $request)
    {
        $request->validate([

            'id' => ['required', 'integer'],
            'status' => ['required', Rule::in(['true', 'false'])],
        ]);

        $flashsaleitem = FlashSellItem::findOrFail($request->id);
        $flashsaleitem->status = $request->status == 'true' ? 1 : 0 ;
        $flashsaleitem->save();

        return response()->json([
            'message' => 'Status has been updated!'
        ]);
    }

    public function destroy(string $id)
    {
        $flashsaleitem = FlashSellItem::findOrFail($id);

        $flashsaleitem->delete();

        notyf()->success('Product Has Been Removed From Flash Sale!');

        return redirect()->back();
    }


}
