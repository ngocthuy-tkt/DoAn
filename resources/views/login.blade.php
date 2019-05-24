@extends('layouts.index')

@section('page_title','Đăng nhập')

@section('content')
    <div class="main">
        <div class="container">
            <div class="row">
                <h3>Đăng nhập</h3>
                @if(Session::has('error'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Lỗi rồi!</h4>
                        {!! Session::get('error') !!}
                    </div>
                @endif
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
                                <input class="form-control" placeholder="Mật khẩu" name="MatKhau" type="password">
                            </div>
                            @if($errors->has('MatKhau'))
                                <p class="text-red">
                                    * {!! $errors->first('MatKhau') !!}
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