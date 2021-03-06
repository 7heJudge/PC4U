@extends('layouts.main')

@section('title')
    Store
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
                <form method="get" action="{{ route('store') }}">
                    <!-- ASIDE -->
                    <div id="aside" class="col-md-3">
                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Категории</h3>
                            <div class="checkbox-filter">

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-1" name="pc"
                                           @if(request()->has('pc')) checked @endif>
                                    <label for="category-1">
                                        <span></span>
                                        Компьютеры
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-2" name="mouse"
                                           @if(request()->has('mouse')) checked @endif>
                                    <label for="category-2">
                                        <span></span>
                                        Мышки
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-3" name="headset"
                                           @if(request()->has('headset')) checked @endif>
                                    <label for="category-3">
                                        <span></span>
                                        Гарнитуры
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-4" name="monitor"
                                           @if(request()->has('monitor')) checked @endif>
                                    <label for="category-4">
                                        <span></span>
                                        Мониторы
                                    </label>
                                </div>

                                <div class="input-checkbox">
                                    <input type="checkbox" id="category-5" name="keyboard"
                                           @if(request()->has('keyboard')) checked @endif>
                                    <label for="category-5">
                                        <span></span>
                                        Клавиатуры
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->

                        <!-- aside Widget -->
                        <div class="aside">
                            <h3 class="aside-title">Price</h3>
                            <div class="price-filter">
                                <div id="price-slider"></div>
                                <div class="input-number price-min">
                                    <input id="price-min" name="price_min" type="number"
                                           value="{{ request()->price_min }}">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                                <span>-</span>
                                <div class="input-number price-max">
                                    <input id="price-max" name="price_max" type="number"
                                           value="{{ request()->price_max }}">
                                    <span class="qty-up">+</span>
                                    <span class="qty-down">-</span>
                                </div>
                            </div>
                        </div>
                        <!-- /aside Widget -->
                        <button type="submit" class="filter-btn">Фильтр</button>
                        <a href="{{ route('store') }}" class="clear-btn">Сбросить</a>
                    </div>
                    <!-- /ASIDE -->
                </form>

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">
                            <label>
                            {{--                                <select class="input-select" id="product_sorting_btn">--}}
                            {{--                                    <option selected value="0">Стардарт</option>--}}
                            {{--                                    <option value="1">От дешёвых к дорогим</option>--}}
                            {{--                                    <option value="2">От дорогих к дешёвым</option>--}}
                            {{--                                    <option value="3">По названию, от А-Я</option>--}}
                            {{--                                    <option value="4">По названию, от Я-А</option>--}}
                            {{--                                </select>--}}
                            <!-- Product Sorting -->
                                <div class="sorting_container ml-md-auto">
                                    <div class="sorting">
                                        <ul class="item_sorting">
                                            <li>
                                                <span class="sorting_text">Сортировка</span>
                                                <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                                <ul>
                                                    <li class="product_sorting_btn" data-order="default">
                                                        <span>Стандарт</span></li>
                                                    <li class="product_sorting_btn" data-order="price-low-high"><span>От дешёвых к дорогим</span>
                                                    </li>
                                                    <li class="product_sorting_btn" data-order="price-high-low"><span>От дорогих к дешёвым</span>
                                                    </li>
                                                    <li class="product_sorting_btn" data-order="name-a-z"><span>По названию, от А-Я</span>
                                                    </li>
                                                    <li class="product_sorting_btn" data-order="name-z-a"><span>По названию, от Я-А</span>
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
                                    </div>
                                    <div class="add-to-cart">
                                        <a
                                            href="{{ route('addToCart', $product['id']) }}">
                                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> В
                                                корзину
                                            </button>
                                        </a>
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
                        <span class="store-qty">Показывает {{ $products->count() }} товаров</span>
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

