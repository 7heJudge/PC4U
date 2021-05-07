<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Stripe\Charge;
use Stripe\Stripe;

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

    public function getAddToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id, $request->qtyProduct);

        $request->session()->put('cart', $cart);
//        dd($request->session()->get('cart'));
        return redirect()->back();
    }

    public function getReduceByOne($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('shoppingCart');
    }

    public function getRemoveItem($id) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if(count($cart->items) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }
        return redirect()->route('shoppingCart');
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('home.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('home.shoppingCart', [
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout(){
        if (!Session::has('cart')){
            return view('home.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('home.checkout', [
            'total' => $total,
            'products' => $cart->items,
        ]);
    }

    public function postCheckout(Request $request){
        if (!Session::has('cart')){
            return redirect()->route('home.shoppingCart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        Stripe::setApiKey('sk_test_51Io3mGLtbArLpPbnnPptdcJGmVQaFoj2JuMIeN05VHSHQBsqlLN8lDPr44MrbbmuCVMoVARcH9Rg8Czn15lqgHgc0042MLpq2L');
        try {
            $charge = Charge::create([
                'amount' => $cart->totalPrice * 100,
                'currency' => 'uah',
                'source' => $request->input('stripeToken'),
                'description' => 'Test Charge'
            ]) ;
            $order = new Order();
            $order->cart = serialize($cart);
            $order->address = $request->input('address');
            $order->name = $request->input('name');
            $order->payment_id = $charge->id;

            Auth::user()->orders()->save($order);
        } catch (\Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Session::forget('cart');
        return redirect()->route('home')->with('success', 'Покупка прошла успешно!');
    }

    public function myOrders() {
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('profile.myOrders', [
            'orders' => $orders
        ]);
    }

}
