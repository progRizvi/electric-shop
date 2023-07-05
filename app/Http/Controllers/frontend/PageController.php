<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PageController extends Controller
{
    public function pagesShopDetails($id)
    {
        $Products = Product::all();
        $Product = Product::find($id);
        return view('frontend.headermenu.pages.shopDetails', compact('Product', 'Products'));
    }
}
