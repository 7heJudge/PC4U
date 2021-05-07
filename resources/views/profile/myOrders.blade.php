@extends('layouts.main')

@section('title')
    My Orders
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Мои заказы</div>
                        @foreach($orders as $order)
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        @foreach($order->cart->items as $item)
                                            <li class="list-group-item">
                                                <span class="badge">{{ $item['price'] }} ₴</span>
                                                {{ $item['item']['title'] }} | {{ $item['quantity'] }}x
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="panel-footer">
                                    <strong>ИТОГО: {{ $order->cart->totalPrice }} ₴</strong>
                                </div>
                            </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
