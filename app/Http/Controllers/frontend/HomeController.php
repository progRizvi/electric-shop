<?php

namespace App\Http\Controllers\frontend;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Support;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function frontendHome()
    {

        $Categories = Category::all();
        $Products = Product::all();
        return view('frontend.pages.home', compact('Products', 'Categories'));
    }

    public function registerSubmitForm(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'email' => 'required|unique:customers,email',
            'password' => 'required|digits:5'

        ]);

        $Customer = Customer::create([
            'name' => $request->name,
            'image' => $request->image,
            'email' => $request->email,
            'password' => bcrypt($request['password'])


        ]);

        toastr()->success('Customer Registration Successfully');
        return back();
    }

    public function loginSubmitForm(Request $request)
    {

        $credentials = $request->except('_token');
        $authentication = auth::guard('customer')->attempt($credentials);
        if ($authentication) {
            // dd($authentication);
            toastr()->success('login Successfully!');
            if (auth('customer')->check()) {
                return to_route('home');
            }
            return to_route('admin.newPage');
        } else {
            toastr()->error('Email or Password Not Matched!', 'Opps!');
            return to_route('home');
        }
    }


    public function frontPassUpdate(Request $request)
    {
        $Customer = Customer::find(auth('customer')->user()->id)->update([
            'password' => bcrypt($request->password)
        ]);
        toastr()->success('Password updated Successfuly');
        return redirect()->back();
    }


    public function frontLogout()
    {
        auth()->logout();
        session()->flush();
        toastr()->success('logout Successfully', 'Logout!');
        return to_route('home');
    }

    public function productUnderCategory($id)
    {
        $Products = Product::where('category_id', $id)->get();
        return view('frontend.headermenu.shop.shopPage', compact('Products'));
    }
}
