<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductTrackController extends Controller
{

    public function index(Request $request): View
    {
        if($request->has('tracker'))
        {

        
            $request->validate([
                
                'tracker' => ['required', 'integer', 'exists:orders,inovice_id'],

            ]);

            $order = Order::with('user')->where('inovice_id', $request->tracker)->firstOrFail();
            return view('frontend.pages.product-track', compact('order'));


        }else
        {
        return view('frontend.pages.product-track');

        }    


    }

}