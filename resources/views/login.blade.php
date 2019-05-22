@extends('layouts.index')

@section('page_title','Đăng nhập')

@section('content')
    <div class="main">
        <div class="container">
            <div class="row">
                <h3>Đăng nhập để thanh toán</h3>
                <div class="col-md-3 col-md-offset-4">
                    <form action="" method="post">
                        @csrf
                        <div class="login-form">
                            <div class="form-group">
                                <input class="form-control" value="{{old('email')}}" placeholder="email" name="email" type="text">
                            </div>
                            @if($errors->has('email'))
                                <p class="text-red">
                                    * {!! $errors->first('email') !!}
                                </p>
                            @endif
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password">
                            </div>
                            @if($errors->has('password'))
                                <p class="text-red">
                                    * {!! $errors->first('password') !!}
                                </p>
                            @endif
                            <div class="form-group">
                                <div class="form-group">
                                    <button class="btn btn-lg btn-success btn-block" type="submit"> Đăng nhập</button>
                                </div>
                            </div>
                        </div>

                        <div>
                            <small>Không có tài khoản?</small> <a href="{{route('signup')}}"><small>Tạo tài khoản</small></a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div><!--  end main section  -->
@endsection