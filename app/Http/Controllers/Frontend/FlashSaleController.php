<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\FlashSell;
use App\Models\FlashSellItem;
class FlashSaleController extends Controller
{
    public function index()
    {
        $flashsaledate = FlashSell::first();
        $flashsaleitems = FlashSellItem::with([
            'productitem.category',
            'productitem.galleries' => function($query) {
                $query->take(1); 
            },
            'productitem.variants' => function($query) {
                
                $query->where('status', 1)
                      ->with(['variantitems' => function($query) {
                          
                          $query->where('status', 1);
                      }]);
            }
        ])
        ->where('status', 1) 
        ->whereHas('productitem', function($query) {
            
            $query->where('is_approved', 1)->where('status', 1);
        })
        ->orderBy('id', 'ASC')
        ->paginate(12);
        


        return view('frontend.pages.flash-sale', compact(['flashsaledate','flashsaleitems']));
    }
}
