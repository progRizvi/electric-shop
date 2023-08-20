<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function registerSubmitForm(Request $request)
    {

    }
    public function loginSubmitForm(Request $request)
    {
        // dd($request->all());
        $credentials = $request->except('_token');
        $authentication = auth("customer")->attempt($credentials);
        if ($authentication) {
            notify()->success('Login successfully');
            return to_route('home');
        } else {
            notify()->error('Please! login as Admin');
            return back();
        }
    }
}
