<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class VendorController extends Controller
{
    public function Dashboard(): View
    {
        // Cache stats for 15 minutes
        $stats = Cache::remember('vendor_dashboard_stats', 60 * 15, function () {
            return [
                'Products' => Product::count(),
                'pending_orders' => Order::where('order_status', 'pending')->count(),
                'distrubution_orders' => Order::where('order_status', 'destribution')->count(),
            ];
        });

        return view('vendor.dashboard.dashboard', $stats);
    }
}
