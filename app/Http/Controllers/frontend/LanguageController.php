<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    
        public function changeLanguage($lang)
    {
        session()->put('loc',$lang);
        return redirect()->back();

    }
}
