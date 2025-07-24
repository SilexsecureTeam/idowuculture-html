<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Article;
use App\Models\ClothCollection;
use App\Models\Discount;
use App\Models\HomePage;
use App\Models\Hurray;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->get();
        $hurray = Hurray::first();
        $slider = HomePage::first();
        $collections = ClothCollection::orderBy('position', 'asc')->get();
        return view('index', compact('collections', 'slider', 'hurray', 'articles'));
    }
    public function aboutus()
    {
        $about_details = AboutPage::first();
        return view('about', compact('about_details'));
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

    public function allProducts()
    {
        return view('/products');
    }

    public function term()
    {
        return view('/term');
    }

    public function work()
    {

        $discount = Discount::where('is_active', true)->first();
        return view('/work', compact('discount'));
    }
}
