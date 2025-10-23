<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;
use App\Models\HomePage;
use App\Models\Slider;
use App\Models\Brand;
use App\Models\FlashSell;
use App\Models\FlashSellItem;


class HomeController extends Controller
{
    public function index(): View
    {
        $sliders = Cache::rememberForever('sliders', function(){
            return Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        });

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
        ->where('show_at_home', 1) 
        ->where('status', 1) 
        ->whereHas('productitem', function($query) {
            
            $query->where('is_approved', 1)->where('status',1);
        })
        ->orderBy('id', 'ASC')
        ->get();

        $brands = Brand::where('status', 1)->where('is_featured', 1)->get();

        $popularCategory = HomePage::where('key', 'popular_category_section')->first();
        
        
        return view('frontend.home.home', compact(['sliders','flashsaledate','flashsaleitems','brands','popularCategory']));
    }
}
