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
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-1">
                                <label for="category-1">
                                    <span></span>
                                    Laptops
                                    <small>(120)</small>
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-2">
                                <label for="category-2">
                                    <span></span>
                                    Smartphones
                                    <small>(740)</small>
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-3">
                                <label for="category-3">
                                    <span></span>
                                    Cameras
                                    <small>(1450)</small>
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-4">
                                <label for="category-4">
                                    <span></span>
                                    Accessories
                                    <small>(578)</small>
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-5">
                                <label for="category-5">
                                    <span></span>
                                    Laptops
                                    <small>(120)</small>
                                </label>
                            </div>

                            <div class="input-checkbox">
                                <input type="checkbox" id="category-6">
                                <label for="category-6">
                                    <span></span>
                                    Smartphones
                                    <small>(740)</small>
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
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Brand</h3>
                        <div class="checkbox-filter">
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-1">
                                <label for="brand-1">
                                    <span></span>
                                    SAMSUNG
                                    <small>(578)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-2">
                                <label for="brand-2">
                                    <span></span>
                                    LG
                                    <small>(125)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-3">
                                <label for="brand-3">
                                    <span></span>
                                    SONY
                                    <small>(755)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-4">
                                <label for="brand-4">
                                    <span></span>
                                    SAMSUNG
                                    <small>(578)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-5">
                                <label for="brand-5">
                                    <span></span>
                                    LG
                                    <small>(125)</small>
                                </label>
                            </div>
                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-6">
                                <label for="brand-6">
                                    <span></span>
                                    SONY
                                    <small>(755)</small>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Top selling</h3>
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product01.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00
                                    <del class="product-old-price">$990.00</del>
                                </h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product02.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00
                                    <del class="product-old-price">$990.00</del>
                                </h4>
                            </div>
                        </div>

                        <div class="product-widget">
                            <div class="product-img">
                                <img src="./img/product03.png" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">Category</p>
                                <h3 class="product-name"><a href="#">product name goes here</a></h3>
                                <h4 class="product-price">$980.00
                                    <del class="product-old-price">$990.00</del>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

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
                                                    <li class="product_sorting_btn" data-order="default"><span>Стандарт</span></li>
                                                    <li class="product_sorting_btn" data-order="price-low-high"><span>От дешёвых к дорогим</span></li>
                                                    <li class="product_sorting_btn" data-order="price-high-low"><span>От дорогих к дешёвым</span></li>
                                                    <li class="product_sorting_btn" data-order="name-a-z"><span>По названию, от А-Я</span></li>
                                                    <li class="product_sorting_btn" data-order="name-z-a"><span>По названию, от Я-А</span></li>
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
                                    <div class="product-img">
                                        <img src="{{ $product['img'] }}" alt="">
                                        <div class="product-label">
                                            {{--<span class="sale">-30%</span>
                                            <span class="new">NEW</span>--}}
                                        </div>
                                    </div>
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
                        <span class="store-qty">Showing {{ $products->count() }} products</span>
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

