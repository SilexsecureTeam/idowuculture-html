<?php

namespace App\Http\Controllers;

use App\Models\ClothCollection;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $collections = ClothCollection::orderBy('position', 'asc')->get();
        return view('index', compact('collections'));
    }
    public function aboutus()
    {
        return view('about');
    }

    public function cartpage()
    {
        return view('/cart');
    }

    public function checkoutpage()
    {
        return view('/checkout');
    }

    public function contactus()
    {
        return view('/contact');
    }

    public function privacy()
    {
        return view('/privacy');
    }

    public function products()
    {
        return view('/product');
    }

    public function term()
    {
        return view('/term');
    }

    public function work()
    {
        return view('/work');
    }
}
