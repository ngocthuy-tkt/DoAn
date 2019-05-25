á@extends('layouts.index')

@section('page_title','Đăng ký')

@section('content')
    <div class="main">
        <div class="container">
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Thành công!</h4>
                    {!! Session::get('success') !!}
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 well well-sm col-md-offset-4">
                    <p><i class="glyphicon glyphicon-globe"></i> Đăng ký!</p>
                    <form action="" method="post" class="form" role="form">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="" placeholder="Email" value="{{old('email')}}">
                        </div>
                        @if($errors->has('email'))
                            <div class="help-block text-red">
                                * {!! $errors->first('email') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" id="" placeholder="Nhập họ tên" value="{{old('name')}}">
                        </div>
                        @if($errors->has('name'))
                            <div class="help-block text-red">
                                * {!! $errors->first('name') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input class="form-control" name="password" placeholder="Mật khẩu" type="password" value="{{ old('password') }}">
                        </div>
                        @if($errors->has('password'))
                            <div class="help-block text-red">
                                * {!! $errors->first('password') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input class="form-control" name="birthday" placeholder="" type="date" value="{{old('birthday')}}">
                        </div>
                        @if($errors->has('birthday'))
                            <div class="help-block text-red">
                                * {!! $errors->first('birthday') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input class="form-control" name="phone" placeholder="Số điện thoại" type="number" value="{{old('phone')}}">
                        </div>
                        @if($errors->has('phone'))
                            <div class="help-block text-red">
                                * {!! $errors->first('phone') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input class="form-control" name="address" placeholder="Địa chỉ" type="text" value="{{old('address')}}">
                        </div>
                        @if($errors->has('address'))
                            <div class="help-block text-red">
                                * {!! $errors->first('address') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <select class="form-control" name="gender">
                                <option>-- Chọn giới tính --</option>
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>
                        @if($errors->has('gender'))
                            <div class="help-block text-red">
                                * {!! $errors->first('gender') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <button class="btn btn-lg btn-primary btn-block" type="submit"> Đăng ký</button>
                        </div>
                        <div class="form-group">
                            Bạn đã có tài khoản, đăng nhập tại đây <a href="{{route('login.submit')}}">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection