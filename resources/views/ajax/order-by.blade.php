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
                <h3 class="product-name"><a href="{{ route('product', [$product['cat_id'],$product['id']]) }}">{{ $product['title'] }}</a></h3>
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
