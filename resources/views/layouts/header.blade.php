
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
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('cart')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                    @if(Auth::check())

                        <li class="nav-item dropdown">
                            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i
                                        class="fa fa-user"></i>
                                {{Auth::user()->name}}</a>
                            <ul class="dropdown-menu" id="with-200px">
                                <li>
                                    <a href="{{route('logout')}}">Đăng xuất</a>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a data-toggle="dropdown" class="nav-link dropdown-toggle" href="#"><i
                                        class="fa fa-user"></i>
                                Đăng nhập</a>
                            <ul class="dropdown-menu">
                                <li>
                                    <form class="form-inline login-form" action="{{route('login.submit')}}"
                                          method="post">
                                        {{ csrf_field() }}
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                            <input type="email" class="form-control" placeholder="Email" required
                                                   name="email">
                                        </div>
                                        @if($errors->has('email'))
                                            <p class="text-red">
                                                * {!! $errors->first('email') !!}
                                            </p>
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                            <input type="password" class="form-control" placeholder="Password" required
                                                   name="password">
                                        </div>
                                        @if($errors->has('password'))
                                            <p class="text-red">
                                                * {!! $errors->first('password') !!}
                                            </p>
                                        @endif
                                        @if(session('thongbao'))
                                            <div class="clearfix"></div>
                                            <p class="text-red">
                                                {{session('thongbao')}}
                                            </p>
                                        @endif
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <div class="clearfix"></div>
                                        <p class="text-red" style="margin-top: 10px">
                                            Nếu chưa có tài khoản, đăng ký tại <a href="{{route('signup')}}">đây</a>
                                        </p>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div><!-- /.navbar-collapse -->
    </nav>
</div><!--  end header section  -->
