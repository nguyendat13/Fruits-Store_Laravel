<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function index()
    {
        return view('frontend.product');
    }
    function detail($slug)
    {
        return view('frontend.product-detail');
    }
}
