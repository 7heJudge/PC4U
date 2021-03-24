<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products_count = Product::all()->count();
        $categories_count = Category::all()->count();
        $users_count = User::all()->count();
        return view('admin.home.index', [
            'products_count' => $products_count,
            'categories_count' => $categories_count,
            'users_count' => $users_count]);
    }

    public function admin_panel()
    {
        $products_count = Product::all()->count();
        $categories_count = Category::all()->count();
        $users_count = User::all()->count();
        return view('admin.home.index', [
            'products_count' => $products_count,
            'categories_count' => $categories_count,
            'users_count' => $users_count]);
    }
}
