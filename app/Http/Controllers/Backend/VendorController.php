<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function Dashboard(): View
    {
        return view('vendor.dashboard.dashboard');
    }
}
