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
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Уменьшить
                                <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('reduceByOne', $product['item']['id']) }}">Уменьшить на 1</a></li>
                                    <li><a href="{{ route('remove', $product['item']['id']) }}">Убрать все</a></li>
                                </ul>
                            </div>
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
                <a href="{{ route('checkout') }}" type="button" class="btn btn-success">К оплате</a>
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
