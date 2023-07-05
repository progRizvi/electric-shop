<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog(){
        return view('frontend.headermenu.blog.blog');
    }

    public function blogDetails(){
        return view('frontend.headermenu.blog.blogdetails');
    }
}
