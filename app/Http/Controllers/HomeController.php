<?php

namespace App\Http\Controllers;

use App\Models\Email;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        $products = Product::orderBy('created_at', 'desc')->get()->take(6);
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('home.index' ,[
            'products' => $products,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $productsQuery = Product::query();
        if ($request->filled('price_min')) {
            $productsQuery->where('price', '>=', $request->price_min);
        }

        if ($request->filled('price_max')) {
            $productsQuery->where('price', '<=', $request->price_max);
        }

        if ($request->has('pc')) {
            $productsQuery->where('cat_id', 1);
        }

        if ($request->has('mouse')) {
            $productsQuery->where('cat_id', 2);
        }

        if ($request->has('headset')) {
            $productsQuery->where('cat_id', 3);
        }

        if ($request->has('monitor')) {
            $productsQuery->where('cat_id', 4);
        }

        if ($request->has('keyboard')) {
            $productsQuery->where('cat_id', 5);
        }

        $paginate = 6;
        $products = $productsQuery->orderBy('created_at', 'desc')->paginate($paginate)->withPath('?' . $request->getQueryString());
        $categories = Category::orderBy('created_at', 'DESC')->get();

        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $products = Product::orderBy('price')->paginate($paginate);
            }
            if ($request->orderBy == 'price-high-low'){
                $products = Product::orderBy('price','desc')->paginate($paginate);
            }
            if ($request->orderBy == 'name-a-z'){
                $products = Product::orderBy('title')->paginate($paginate);
            }
            if ($request->orderBy == 'name-z-a'){
                $products = Product::orderBy('title','desc')->paginate($paginate);
            }
        }

        if($request->ajax()){
            return view('ajax.order-by', [
                'products' => $products
            ])->render();
        }

        return view('home.store' ,[
            'products' => $products,
            'categories' => $categories
        ]);
    }
}
