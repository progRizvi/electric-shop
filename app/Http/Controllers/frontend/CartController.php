<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use Nette\Utils\Floats;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    public function cartDetails()
    {

        //$carts = session()->get('myCart');
        $Product = Product::all();

        return view('frontend.cart.cartDetails', compact('Product'));
    }

    public function addCartPage($id)
    {

        $products = Product::find($id);

        $myCart = session()->get('myCart'); //get, put, has, flush, forget
        if (!$myCart) {
            //case1: cart is empty
            //solution: add product to cart

            $cart[$id] = [
                'product_name' => $products->product_name,
                'product_price' => $products->product_price,
                'product_quantity' => 1,
                'subtotal' => $products->product_price * 1,
                'product_image' => $products->product_image
            ];
            session()->put('myCart', $cart);
        } else {
            //case2: cart not empty but product not exist,
            // solution: add product to cart

            if (!array_key_exists($id, $myCart)) {
                $myCart[$id] = [
                    'product_name' => $products->product_name,
                    'product_price' => $products->product_price,
                    'product_quantity' => 1,
                    'subtotal' => $products->product_price * 1,
                    'product_image' => $products->product_image
                ];
                session()->put('myCart', $myCart);
            } else {
                //case3: cart not empty but product exist
                //solution: increment the quantity

                $myCart[$id]['product_quantity'] = $myCart[$id]['product_quantity'] + 1; // pre increment and post increment

                $myCart[$id]['subtotal'] = (float) $myCart[$id]['product_price'] * (int) $myCart[$id]['product_quantity'];
                session()->put('myCart', $myCart);
            }
        }

        toastr()->success('Cart Successfully');
        return redirect()->back();
    }

    public function deleteCartItem($id)
    {
        $newCart = session()->get('myCart');
        unset($newCart[$id]);
        session()->put('myCart', $newCart);

        toastr()->success('Item deleted from cart.');
        return redirect()->back();
    }

    public function updateCartItem(Request $request, $id)

    {

        // dd($id);
        $myCart = session()->get('myCart');

        $product = Product::find($id);

        if ($product->product_quantity < $request->qty) {
            toastr()->warning("Stock Out", "Product Available $product->product_quantity");
            return redirect()->back();
        }

        //dd(gettype($myCart[2]['product_price']));
        if ($request->qty < 1) {
            toastr()->warning("Cart Error", "Cart 1 or More Product");
            return redirect()->back();
        }


        $myCart[$id]['product_quantity'] = $request->qty;

        // dd($myCart[$id]);

        $myCart[$id]['subtotal'] = (float) $myCart[$id]['product_price'] * (int) $myCart[$id]['product_quantity'];



        session()->put('myCart', $myCart);
        toastr()->success('Cart Update Succes!');
        return to_route('cart.details');
    }
}
