<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Cache;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $orders = Order::whereNot('order_status', 'deliverd')->OrderBy('id','DESC')->paginate(10);
        return view('admin.order.index', compact('orders'));
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
        //
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $order = Order::findOrFail($id);

        $orderProducts = $order->orderProducts()->with('product.brand')->get();
        
        return view('admin.order.show', compact(['order','orderProducts']));
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
        $order = Order::findOrFail($id);

        $order->delete();

        Cache::forget('dashboard_stats');
        Cache::forget('vendor_dashboard_stats');

        notyf()->success(__('toastr.OrderDeletedSuccessfully'));

       return response()->json([
            'status' => 'success',
            'type' => 'order',
            'message' =>__('toastr.OrderDeletedSuccessfully')
        ]);


    }

    public function ChangeStatus(Request $request)
    {
        $request->validate([
            'id' => ['required','integer'],
            'status' => ['required', Rule::in(['deliverd','destribution','pending','canceled'])], 
        ]);

        $order = Order::findOrFail($request->id);

        $order->update(['order_status' => $request->status]);

        Cache::forget('dashboard_stats');
        Cache::forget('vendor_dashboard_stats');

        return response()->json([
            'status' => 'success',
            'message' =>__('toastr.OrderStatushasbeenUpdatedSuccessfully'),
        ]);


    }


    public function pendingOrders(): View
    {
        $pendingOrders = Order::where('order_status', 'pending')->OrderBy('id','DESC')->paginate(10);
        return view('admin.order.pending-order', compact('pendingOrders'));
    }

    public function destributionOrders(): View
    {
        $orders = Order::with('user')->where('order_status', 'destribution')->OrderBy('id','DESC')->paginate(10);
        return view('admin.order.destribution-order', compact('orders'));
    }

    public function deliveredOrders(): View
    {
        $orders = Order::with('user')->where('order_status', 'deliverd')->OrderBy('id','DESC')->paginate(10);
        return view('admin.order.delivered-order', compact('orders'));
    }

    public function canceledOrders(): View
    {
        $orders = Order::with('user')->where('order_status', 'canceled')->OrderBy('id','DESC')->paginate(10);
        return view('admin.order.canceled-order', compact('orders'));
    }

    

    


    
}
