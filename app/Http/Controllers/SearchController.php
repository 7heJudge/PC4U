<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /*For Show result*/
    public function index(Request $request)
        {
        $paginate = 3;
        $query = !empty(trim($request->search)) ? trim($request->search) : null;

//        $products = Product::where('title', 'LIKE', '%' . $query . '%')->get()->all();
        $products = Product::where('title', 'LIKE', '%' . $query . '%')->orwhere('text', 'LIKE', '%' . $query . '%')->paginate($paginate);
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

        return view('search.result', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /*For AJAX search*/
    public function search(Request $request)
    {
        $search = $request->get('term');
        $result = Product::select('title')->where('title', 'LIKE', '%' . $search . '%')->pluck('title');

        return response()->json($result);
    }
}
