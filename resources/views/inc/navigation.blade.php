<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li><a href="{{ route('home') }}">Домой</a></li>
                <li><a href="{{ route('store') }}">Все товары</a></li>
                @foreach($categories as $category)
                    <li><a href="{{ route('categories', $category['id']) }}">{{ $category['title'] }}</a></li>
                @endforeach
{{--                <li><a href="#">Categories</a></li>--}}
{{--                <li><a href="#">Laptops</a></li>--}}
{{--                <li><a href="#">Smartphones</a></li>--}}
{{--                <li><a href="#">Cameras</a></li>--}}
{{--                <li><a href="#">Accessories</a></li>--}}
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
