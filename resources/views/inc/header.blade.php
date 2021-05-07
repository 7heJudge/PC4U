<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li style="color:white"><i class="fa fa-phone"></i> +380 (68) 463 31 48</li>
                <li style="color:white"><i class="fa fa-envelope-o"></i> pc4u_sender@yan.insave.ovh</li>
                <li style="color:white"><i class="fa fa-map-marker"></i> Украина, Днепр</li>
            </ul>
            <ul class="header-links pull-right">
                <li style="color:white"><i class="fa fa-money"></i> UAH</li>
                @if (!Auth::user())
                    <li><a href="{{ route('login') }}"><i class="fa fa-user-o"></i> Мой аккаунт</a></li>
                @else
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown"><i
                                class="fa fa-user-o"></i> {{ Auth::user()->name }}
                            <span class="caret"></span></button>
                        <ul class="dropdown-menu" style="background-color: gray">
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Выйти') }}
                                </a>
                            </li>
                            <li><a href="{{ route('orders') }}">Мои заказы</a></li>
                            @if (true)
                                <li><a href="{{ route('admin_panel') }}">Админ панель</a></li>
                            @endif
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </ul>
                    </div>
                @endif
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{ route('home') }}" class="logo">
                            <img src="/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->
                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form action="{{ route('SearchResult') }}" method="get" autocomplete="off">
                            <input id="search" type="text" name="search" class="input input-select"
                                   placeholder="Искать здесь">
                            <button type="submit" class="search-btn">Найти</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">
                    <div class="header-ctn">
                        <!-- Cart -->
                        {{--                        <div class="dropdown">--}}
                        {{--                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">--}}
                        <a href="{{ route('shoppingCart') }}" class="txt-wht">
                            <span class="txt-wht"><i class="fa fa-shopping-cart"></i> Ваша корзина</span>
                            <div class="badge">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</div>
                        </a>
                    {{--                        </div>--}}
                    <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h4><i class="icon fa fa-check"></i>{{session('success')}}</h4>
        </div>
    @endif
</header>
<!-- /HEADER -->
