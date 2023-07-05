<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shopPage()
    {
        $Products = Product::all();
        return view('frontend.headermenu.shop.shopPage', compact('Products'));
    }
}
