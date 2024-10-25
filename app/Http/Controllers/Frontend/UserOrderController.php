<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;

class UserOrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->OrderBy('id','DESC')->paginate(10);

        return view('frontend.dashboard.order.index', compact('orders'));
    }

    public function show(string $id): View
    {
        $order = Order::findOrFail($id);

        $orderProducts = $order->orderProducts()->with('product')->get();
        
        return view('frontend.dashboard.order.show', compact(['order','orderProducts']));
    }
}
