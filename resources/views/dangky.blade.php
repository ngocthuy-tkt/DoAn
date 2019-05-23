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
                            <input type="text" class="form-control" name="HoTen" id="" placeholder="Nhập họ tên" value="{{old('HoTen')}}">
                        </div>
                        @if($errors->has('HoTen'))
                            <div class="help-block text-red">
                                * {!! $errors->first('HoTen') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input class="form-control" name="MatKhau" placeholder="Mật khẩu" type="password" value="{{ old('MatKhau') }}">
                        </div>
                        @if($errors->has('MatKhau'))
                            <div class="help-block text-red">
                                * {!! $errors->first('MatKhau') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input class="form-control" name="NgaySinh" placeholder="Số điện thoại" type="date" value="{{old('date')}}">
                        </div>
                        @if($errors->has('NgaySinh'))
                            <div class="help-block text-red">
                                * {!! $errors->first('NgaySinh') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input class="form-control" name="Sdt" placeholder="Số điện thoại" type="number" value="{{old('Sdt')}}">
                        </div>
                        @if($errors->has('Sdt'))
                            <div class="help-block text-red">
                                * {!! $errors->first('Sdt') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <input class="form-control" name="DiaChi" placeholder="Địa chỉ" type="text" value="{{old('DiaChi')}}">
                        </div>
                        @if($errors->has('DiaChi'))
                            <div class="help-block text-red">
                                * {!! $errors->first('DiaChi') !!}
                            </div>
                        @endif
                        <div class="form-group">
                            <select class="form-control" name="GioiTinh">
                                <option>-- Chọn giới tính --</option>
                                <option value="1">Nam</option>
                                <option value="0">Nữ</option>
                            </select>
                        </div>
                        @if($errors->has('GioiTinh'))
                            <div class="help-block text-red">
                                * {!! $errors->first('GioiTinh') !!}
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