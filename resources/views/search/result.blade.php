@extends('layouts.main')

@section('title')
    Result
@endsection

@section('content')
    {{--    <!-- BREADCRUMB -->--}}
    {{--    <div id="breadcrumb" class="section">--}}
    {{--        <!-- container -->--}}
    {{--        <div class="container">--}}
    {{--            <!-- row -->--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <ul class="breadcrumb-tree">--}}
    {{--                        <li><a href="#">Home</a></li>--}}
    {{--                        <li><a href="#">All Categories</a></li>--}}
    {{--                        <li><a href="#">Accessories</a></li>--}}
    {{--                        <li class="active">Headphones (227,490 Results)</li>--}}
    {{--                    </ul>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <!-- /row -->--}}
    {{--        </div>--}}
    {{--        <!-- /container -->--}}
    {{--    </div>--}}
    {{--    <!-- /BREADCRUMB -->--}}

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div id="aside" class="col-md-3">
                </div>
                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row product-grid">
                    @foreach($products as $product)
                        <!-- product -->
                            <div class="col-md-4 col-xs-6 height-460px">
                                <div class="product">
                                    <a href="{{ route('product', [$product['cat_id'],$product['id']]) }}">
                                        <div class="product-img">
                                            <img src="{{ $product['img'] }}" alt="">
                                            <div class="product-label">
                                                {{--<span class="sale">-30%</span>
                                                <span class="new">NEW</span>--}}
                                            </div>
                                        </div>
                                    </a>
                                    <div class="product-body">
                                        {{--                                        @foreach($categories as $category)--}}
                                        {{--                                            @if ($category['id'] == $product['cat_id'])--}}
                                        {{--                                        <p class="product-category">{{ $category['title'] }}</p>--}}
                                        {{--                                            @endif--}}
                                        {{--                                        @endforeach--}}
                                        <p class="product-category">{{ $product->category['title'] }}</p>
                                        <h3 class="product-name"><a
                                                href="{{ route('product', [$product['cat_id'],$product['id']]) }}">{{ $product['title'] }}</a>
                                        </h3>
                                        <h4 class="product-price">₴{{ $product['price'] }}
                                            {{--<del class="product-old-price">$990.00</del>--}}
                                        </h4>
                                        </h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">В желаемое</span></button>
                                            {{--                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span--}}
                                            {{--                                                    class="tooltipp">add to compare</span></button>--}}
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">Просмотр</span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> В корзину
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- /product -->
                            <div class="clearfix visible-sm visible-xs"></div>

                        @endforeach
                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Показывает {{ count($products) }} товаров</span>
                        {{$products->appends(request()->query())->links('pagination.index')}}
                    </div>
                    <!-- /store bottom filter -->
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->
@endsection


