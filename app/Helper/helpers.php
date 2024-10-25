<?php

use Carbon\Carbon;

/** Set Sidebard Item Active */

function setActive(array $route)
{  
        if(is_array($route))
        {
            foreach($route as $r)
            {
                if(request()->routeIs($r))
                {
                    return 'active';
                }
            }
        }
} 

/** Check Product Have Discount */
function checkDiscount($product){
    $currentDate = Carbon::today()->startOfDay();    

    if($product->offer_start_date && $product->offer_end_date )
    {

        $offerStartDate = $product->offer_start_date->startOfDay();
        
        $offerEndDate = $product->offer_end_date->startOfDay();

        if($product->offer_price > 0 && $currentDate->between($offerStartDate,$offerEndDate))
        {
            return true;
        }
    }


    return false;
}

/** Calculate Discount % */

function calculateDiscountPercent($price,$offerPrice)
{
    $discountAmount = $price - $offerPrice;

    $discountPercent = ($discountAmount / $price) * 100;

    return "-" . round($discountPercent) . "%";
}

/** Fetch Product Type */

function productType(string $type)
{
    switch($type)
    {
        case 'تقسيط':
            return 'تقسيط';
            break;
       
        default:
            return '';
            break;    
    }

}



/** Get Total Cart Amount */
function cartTotal()
{
    $cartTotal = 0;

    foreach(\Cart::content() as $cart)
    {
        $cartTotal += round(($cart->price + $cart->options->variant_total) * $cart->qty,2);
    }

    return $cartTotal;
}


/** Get Variant Total  Amount */
function variantTotal()
{
    $variantTotal = 0;

    foreach(\Cart::content() as $cart)
    {
        $variantTotal += round(($cart->options->variant_total) * $cart->qty,2);
    }

    return $variantTotal;
}


/** calculate Cart Faciliter */

function cartFaciliter()
{
    $cartFaciliter = [];
    $cartFaciliter['price_12'] = 0;
    $cartFaciliter['price_24'] = 0;
    $cartFaciliter['price_36'] = 0;
    $cartFaciliter['price_48'] = 0;
    $cartFaciliter['price_60'] = 0;

    foreach(\Cart::content() as $cart)
    {
        
        $cartFaciliter['price_12'] += round( ($cart->options->faciliter['price_12'] * $cart->qty) ,2);
        $cartFaciliter['price_24'] += round( ($cart->options->faciliter['price_24'] * $cart->qty) ,2);
        $cartFaciliter['price_36'] += round( ($cart->options->faciliter['price_36'] * $cart->qty) ,2);
        $cartFaciliter['price_48'] += round( ($cart->options->faciliter['price_48'] * $cart->qty) ,2);
        $cartFaciliter['price_60'] += round( ($cart->options->faciliter['price_60'] * $cart->qty) ,2);
    }

    return $cartFaciliter;
}


function getFacility($product,$mois,$qty)
{
    if($mois == 12)
    {
        return $product->price_12 * $qty;
    }else if($mois == 24)
    {
        return $product->price_24 * $qty;
    }else if($mois == 36)
    {
        return $product->price_36 * $qty;
    }else if($mois == 48)
    {
        return $product->price_48 * $qty;
    }else
    {
        return $product->price_60 * $qty;
    }
}


/**   */

function limitText($text, $limit = 20)
{
    return \Str::limit($text,$limit);
}