<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return view('admin.category.index', [
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_category = new Category();
        $new_category->title = $request->title;
        $new_category->save();

        return redirect()->back()->withSuccess('Категория была успешно добавлена!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $category)
    {
//        dd($category);
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
        $cat = Category::where('id', $category)->first();

        $paginate = 2;

        $products = $productsQuery->where('cat_id', $cat['id'])->paginate($paginate)->withPath('?' . $request->getQueryString());

        if(isset($request->orderBy)){
            if ($request->orderBy == 'price-low-high'){
                $products = Product::where('cat_id',$cat['id'])->orderBy('price')->paginate($paginate);
            }
            if ($request->orderBy == 'price-high-low'){
                $products = Product::where('cat_id',$cat['id'])->orderBy('price','desc')->paginate($paginate);
            }
            if ($request->orderBy == 'name-a-z'){
                $products = Product::where('cat_id',$cat['id'])->orderBy('title')->paginate($paginate);
            }
            if ($request->orderBy == 'name-z-a'){
                $products = Product::where('cat_id',$cat['id'])->orderBy('title','desc')->paginate($paginate);
            }
        }

        if($request->ajax()){
            return view('ajax.order-by', [
                'products' => $products
            ])->render();
        }

        return view('categories.index', [
            'cat' => $cat,
            'products' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->title = $request->title;
        $category->save();

        return redirect()->back()->withSuccess('Категория была успешно обновлена!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back()->withSuccess('Категория была успешно удалена!');
    }
}
