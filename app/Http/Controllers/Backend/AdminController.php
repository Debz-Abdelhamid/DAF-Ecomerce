<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function Dashboard(): View
    {

        return view('admin.dashboard');
    }


    public function login(): View
    {
        return view('admin.auth.login');
    }
}
