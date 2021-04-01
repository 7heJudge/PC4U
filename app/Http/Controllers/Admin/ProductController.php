<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'DESC')->get();

        return view('admin.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.product.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->title = $request->title;
        $product->img = $request->img;
        $product->text = $request->text;
        $product->cat_id = $request->cat_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();

        return redirect()->back()->withSuccess('Товар был успешно добавлен!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
//    public function show(Product $product)
//    {
//
//    }

    public function show(Request $request,$cat_id,$id)
    {
        $item = Product::where('id', $id)->first();
        $categories = Category::orderBy('created_at', 'DESC')->get();

        return view('product.show' ,[
            'item' => $item,
            'categories' => $categories
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('created_at', 'DESC')->get();
        return view('admin.product.edit', [
            'categories' => $categories,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->title = $request->title;
        $product->img = $request->img;
        $product->text = $request->text;
        $product->cat_id = $request->cat_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->save();

        return redirect()->back()->withSuccess('Товар был успешно обновлен!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->back()->withSuccess('Товар был успешно удален!');
    }
}
