@extends('layouts.main')

@section('title')
    Shopping Cart
@endsection

@section('content')
    @if(Session::has('cart'))
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <ul class="list-group">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{ $product['quantity'] }}</span>
                            <strong>{{ $product['item']['title'] }}</strong>
                            <span class="label label-success">₴{{ $product['price'] }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <small>{{ $totalQty }} Товар(ов) в корзине</small>
                <h5>ИТОГО: ₴{{ $totalPrice }}</h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <button type="button" class="btn btn-success">Проверить</button>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                <h3>Корзина пуста!</h3>
            </div>
        </div>
    @endif
@endsection
{{--<div class="cart-dropdown">--}}
{{--    <div class="cart-list">--}}
{{--        @foreach($products as $product)--}}
{{--            <div class="product-widget">--}}
{{--                <div class="product-img">--}}
{{--                    <img src="{{ $product['img'] }}" alt="">--}}
{{--                </div>--}}
{{--                <div class="product-body">--}}
{{--                    <h3 class="product-name"><a--}}
{{--                            href="{{ route('product', [$product['cat_id'],$product['id']]) }}">{{ $product['title'] }}</a>--}}
{{--                    </h3>--}}
{{--                    <h4 class="product-price"><span--}}
{{--                            class="qty">{{ Session::get('cart')->totalQty }}x</span>₴{{ $product['price'] }}--}}
{{--                    </h4>--}}
{{--                </div>--}}
{{--                <button class="delete"><i class="fa fa-close"></i></button>--}}
{{--            </div>--}}
{{--        @endforeach--}}
{{--    </div>--}}
{{--    @else--}}
{{--        <div>Корзина пуста!</div>--}}
{{--    @endif--}}
{{--    <div class="cart-summary">--}}
{{--        <small>{{ Session::get('cart')->totalQty }} Товар(ов) выбрано</small>--}}
{{--        <h5>ИТОГО: ₴{{ Session::get('cart')->totalPrice }}</h5>--}}
{{--    </div>--}}
{{--    <div class="cart-btns">--}}
{{--        <a href="#">Проверить <i class="fa fa-arrow-circle-right"></i></a>--}}
{{--    </div>--}}
{{--</div>--}}
