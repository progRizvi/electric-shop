<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function shopPage()
    {
        $Products = Product::all();
        $Categories = Category::all();
        return view('frontend.headermenu.shop.shopPage', compact('Products', "Categories"));
    }
}
