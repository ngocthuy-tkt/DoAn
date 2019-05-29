
<div class="header">
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <div class="container">
                <ul class="nav navbar-nav navbar-left">
                    <li class=""><a href="{{route('home')}}"><i class="fa fa-home"></i> Trang chủ</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Danh mục <b class="caret"></b>
                        </a>

                        <ul class="dropdown-menu">
                            @php {{menu_header_cat($categories);}} @endphp
                        </ul>
                    </li>
                </ul>
                <div class="header_search" id="search_form" style="margin-top: 8px">
                    <form style="padding-right: 250px; padding-left: 40px" class="input-group search-bar search_form has-validation-callback" action="{{ route('search') }}" method="get" role="search">
                        <input class="form-control" type="search" name="key" placeholder="Tìm kiếm..." aria-label="Search" autocomplete="off">
                        <span class="input-group-btn">
                            <button class="btn icon-fallback-text">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </form>
                </div>
                <ul class="nav navbar-nav navbar-right" style="margin-top: -43px;">
                    <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng {{ \Cart::count() }}</a></li>
                    @if(Auth::check())

                        <li class="nav-item dropdown">
                            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i
                                        class="fa fa-user"></i>
                                {{Auth::user()->name}}</a>
                            <ul class="dropdown-menu" id="with-200px">
                                <li>
                                    <a href="{{route('historyOrder')}}">Lịch sử mua hàng</a>
                                </li>
                                <li>
                                    <a href="{{route('logout')}}">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('login') }}"><i
                                        class="fa fa-user"></i>
                                Đăng nhập</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!--  end header section  -->

