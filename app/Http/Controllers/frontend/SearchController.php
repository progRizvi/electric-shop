<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        //dd(\request()->all());

        $key = $request->search_key;

        // dd($search_key);

        // $column_name=$request->column_name;

        $order_by = $request->order_by ?? 'asc';


        $Products = Product::where('product_name', 'LIKE', '%' . $key . '%')
            ->orderBy('product_price', $order_by)->get();

        return view('frontend.fixed.search', compact('Products'));
    }
}
