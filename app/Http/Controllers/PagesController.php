<?php

namespace App\Http\Controllers;

use App\Models\AboutPage;
use App\Models\Article;
use App\Models\ClothCollection;
use App\Models\Discount;
use App\Models\Faq;
use App\Models\HomePage;
use App\Models\Hurray;
use App\Models\Policy;
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
        $policy = Policy::first();
        return view('/policy', compact('policy'));
    }

    public function products()
    {
        return view('/product');
    }

    public function allProducts()
    {
        return view('/products');
    }

    public function articlePage()
    {
        $articles = Article::latest()->paginate(3); 
        return view('/article', compact('articles'));
    }
    public function articleShow($slug)
    {
        $articles = Article::where('slug', $slug)->firstOrFail(); 
        return view('/articleshow', compact('articles'));
    }

    public function term()
    {
        $policy = Policy::first('terms_and_conditions');
        return view('/term', compact('policy'));
    }

    public function work()
    {
        $discount = Discount::where('is_active', true)->first();
        return view('/work', compact('discount'));
    }

    public function question()
    {
        $faqs = Faq::all(); // or paginate(), or orderBy('created_at', 'desc') etc.
        return view('faq', compact('faqs'));
    }
}
