@extends('layouts.main')

@section('title')
    Categories
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
                <form method="get" action="{{ route('categories', $cat) }}">
                    <!-- ASIDE -->
                    <div id="aside" class="col-md-3">
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Price</h3>
                            <div class="price-filter">
                                <div id="price-slider"></div>
                                <div class="input-number price-min">
                                    <input id="price-min" name="price_min" type="number" value="{{ request()->price_min }}">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input id="price-max" name="price_max" type="number" value="{{ request()->price_max }}">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->
                        <button type="submit" class="filter-btn">????????????</button>
                        <a href="{{ route('categories', $cat) }}" class="clear-btn">????????????????</a>
                    </div>
                    <!-- /ASIDE -->
                </form>

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                                {{--                                <select class="input-select">--}}
                                {{--                                    <option class="product_sorting_btn" selected value="0">????????????????</option>--}}
                                {{--                                    <option class="product_sorting_btn" value="1">???? ?????????????? ?? ??????????????</option>--}}
                                {{--                                    <option class="product_sorting_btn" value="2">???? ?????????????? ?? ??????????????</option>--}}
                                {{--                                    <option class="product_sorting_btn" value="3">???? ????????????????, ???? ??-??</option>--}}
                                {{--                                    <option class="product_sorting_btn" value="4">???? ????????????????, ???? ??-??</option>--}}
                                {{--                                </select>--}}
                                <div class="sorting_container ml-md-auto">
                                    <div class="sorting">
                                        <ul class="item_sorting">
                                            <li>
                                                <span class="sorting_text">????????????????????</span>
                                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                                <ul>
                                                    <li class="product_sorting_btn" data-order="default">
                                                        <span>????????????????</span></li>
                                                    <li class="product_sorting_btn" data-order="price-low-high"><span>???? ?????????????? ?? ??????????????</span>
                                                    </li>
                                                    <li class="product_sorting_btn" data-order="price-high-low"><span>???? ?????????????? ?? ??????????????</span>
                                                    </li>
                                                    <li class="product_sorting_btn" data-order="name-a-z"><span>???? ????????????????, ???? ??-??</span>
                                                    </li>
                                                    <li class="product_sorting_btn" data-order="name-z-a"><span>???? ????????????????, ???? ??-??</span>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </label>
                        </div>
                        {{--                        <ul class="store-grid">--}}
                        {{--                            <li class="active"><i class="fa fa-th"></i></li>--}}
                        {{--                            <li><a href="#"><i class="fa fa-th-list"></i></a></li>--}}
                        {{--                        </ul>--}}
                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row product-grid">
                    @foreach($products as $product)
                        <!-- product -->
                            @php
                                $image = '';
                                    if(count($product['images']) > 0) {
                                    $image = $product['images'][0]['img'];
                                }
                                else {
                                    $image = 'no_image.png';
                                }
                            @endphp
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
                                        <h4 class="product-price">???{{ $product['price'] }}
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
                                    </div>
                                    <div class="add-to-cart">
                                        <a href="{{ route('addToCart', $product['id']) }}">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> ??
                                                ??????????????
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /product -->
                            <div class="clearfix visible-sm visible-xs"></div>

                        @endforeach
                    </div>
{{--                    {{ $products->appends(request()->query())->links() }}--}}
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">???????????????????? {{ $products->count() }} ??????????????</span>
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

@section('custom_js')
    <script>
        $(document).ready(function () {
            $('.product_sorting_btn').click(function () {
                let orderBy = $(this).data('order');
                let url = $(this).data('href');
                $('.sorting_text').text($(this).find('span').text())
                // console.log(orderBy);

                $.ajax({
                    url: url,
                    type: "GET",
                    data: {
                        orderBy: orderBy,
                        page: {{ isset($_GET['page']) ? $_GET['page'] : 1 }},
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: (data) => {
                        let positionParameters = location.pathname.indexOf('?');
                        let url1 = location.pathname.substring(positionParameters, location.pathname.length);
                        let newURL = url1 + '?';
                        newURL += 'orderBy=' + orderBy + "&page={{ isset($_GET['page']) ? $_GET['page'] : 1 }}";
                        history.pushState({}, '', newURL);
                        $('.product-grid').html(data)
                        // console.log(data)
                    }
                });
            })
        })
    </script>
@endsection

