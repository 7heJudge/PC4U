<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //doesn`t let on page until guest logged in
        //$this->middleware(['auth','verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile()
    {
        return view('profile.home');
    }
    public function main_page()
    {
        return view('home.index');
    }
    public function store()
    {
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('home.store' ,[
            'products' => $products
        ]);
    }
}
