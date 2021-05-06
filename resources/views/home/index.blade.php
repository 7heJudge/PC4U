@extends('layouts.main')

@section('title')
    Home
@endsection

@section('content')
{{--    @if (Session::has('success'))--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">--}}
{{--                <div id="charge-message" class="alert alert-success">--}}
{{--                    {{ Session::get('success') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="../../../public/img/PC_main_mage.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Персональные<br>Компьютеры</h3>
                            @foreach($categories as $category)
                                @if($category['id'] == 1)
                                    <a href="{{ route('categories', $category['id']) }}" class="cta-btn">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="../../../public/img/mouse_main.jpg" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Компьютерные<br>Мышки</h3>
                            @foreach($categories as $category)
                                @if($category['id'] == 2)
                                    <a href="{{ route('categories', $category['id']) }}" class="cta-btn">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /shop -->

                <!-- shop -->
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="../../../public/img/keyboardMain.png" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>Клавиатуры</h3>
                            @foreach($categories as $category)
                                @if($category['id'] == 5)
                                    <a href="{{ route('categories', $category['id']) }}" class="cta-btn">Перейти <i
                                            class="fa fa-arrow-circle-right"></i></a>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- /shop -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="section-title">
                        <h3 class="title">Новые товары</h3>
                    </div>
                </div>
                <!-- /section title -->

                <!-- Products tab & slick -->
                <div class="col-md-12">
                    <div class="row">
                        <div class="products-tabs">
                            <!-- tab -->
                            <div id="tab1" class="tab-pane active">
                                <div class="products-slick" data-nav="#slick-nav-1">
                                @foreach($products as $product)
                                    <!-- product -->
                                        <div class="product">
                                            <a href="{{ route('product', [$product['cat_id'],$product['id']]) }}">
                                                <div class="product-img">
                                                    <img src="{{ $product['img'] }}" alt="">
                                                    <div class="product-label">
                                                        <span class="new">Новинка</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="product-body">
                                                <p class="product-category">{{ $product->category['title'] }}</p>
                                                <h3 class="product-name"><a
                                                        href="{{ route('product', [$product['cat_id'],$product['id']]) }}">{{ $product['title'] }}</a>
                                                </h3>
                                                <h4 class="product-price">₴{{ $product['price'] }}
                                                </h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="add-to-cart">
                                                <a href="{{ route('addToCart', $product['id']) }}">
                                                    <button class="add-to-cart-btn"><i
                                                            class="fa fa-shopping-cart"></i> В
                                                        корзину
                                                    </button>
                                                </a>
                                            </div>
                                        </div>
                                        <!-- /product -->
                                    @endforeach
                                </div>
                                <div id="slick-nav-1" class="products-slick-nav"></div>
                            </div>
                            <!-- /tab -->
                        </div>
                    </div>
                </div>
                <!-- Products tab & slick -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection
