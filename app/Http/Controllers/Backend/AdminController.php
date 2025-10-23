<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Slider;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class AdminController extends Controller
{
    public function Dashboard(): View
    {
        // Cache results for 15 minutes
        $stats = Cache::remember('dashboard_stats', 900, function () {
            return [
                'admins' => User::where('role', 'vendor')->count(),
                'products' => Product::count(),
                'pending_orders' => Order::where('order_status', 'pending')->count(),
                'sliders' => Slider::count(),
            ];
        });


        return view('admin.dashboard', [
            'admins' => $stats['admins'],
            'Products' => $stats['products'],
            'pending_orders' => $stats['pending_orders'],
            'sliders' => $stats['sliders'],
        ]);

    }
}
