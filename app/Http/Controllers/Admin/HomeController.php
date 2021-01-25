<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products_count = Product::all()->count();
        return view('admin.home.index', [
            'products_count' => $products_count]);
    }
}
