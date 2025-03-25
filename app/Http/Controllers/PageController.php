<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Display the about us page
    public function about()
    {
        return view('about');
    }
}
