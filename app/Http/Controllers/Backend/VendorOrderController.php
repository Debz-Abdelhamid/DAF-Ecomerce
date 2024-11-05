<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;


class VendorOrderController extends Controller
{
    public function index(): View
    {
        $orders = Order::OrderBy('id','DESC')->paginate(10);

        return view('vendor.order.index', compact('orders'));
    }

    public function show(string $id): View
    {
        $order = Order::findOrFail($id);

        $orderProducts = $order->orderProducts()->with('product')->get();
        
        return view('vendor.order.show', compact(['order','orderProducts']));
    }

    public function ChangeStatus(Request $request, string $id)
    {
        $request->validate([
            
            'status' => ['required', Rule::in(['deliverd','destribution','pending','canceled'])], 
        ]);

        $order = Order::findOrFail($id);

        $order->update(['order_status' => $request->status]);

        notyf()->success('Order Status Updated Successfully');

        return redirect()->back();


    }

}
