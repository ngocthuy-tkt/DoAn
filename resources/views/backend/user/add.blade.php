@extends('backend.layout.index')
@section('page_title','Thêm mới')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới tài khoản khách hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('users.index')}}">users</a></li>
            <li class="active">add</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('users.store')}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thông tin tài khoản</label>
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Họ tên khách hàng" name="name" id="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            @if($errors->has('name'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('name') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="email" name="email" id="email" value="{{ old('email') }}">
                                </div>
                            </div>
                            @if($errors->has('email'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('email') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Giới tính</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="gender" value="0">
                                        <span>Nữ</span>
                                    </label>
                                    <label>
                                        <input checked type="radio" name="gender" value="1">
                                        <span>Nam</span>
                                    </label>
                                </div>
                            </div>
                           
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                                    <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" data-inputmask="'mask': ['9999999999[9]']" data-mask="" placeholder="Số điện thoại">
                                </div>
                            </div>
                            @if($errors->has('phone'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('phone') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="date" class="form-control" placeholder="Ngày sinh" name="birthday" value="{{ old('birthday') }}">
                                </div>
                            </div>
                            @if($errors->has('birthday'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('birthday') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="address" value="{{ old('address') }}">
                                </div>
                            </div>
                            @if($errors->has('address'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('address') !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="center-block max-width-content">
                        <button type="submit" class="btn btn-primary">Tạo mới</button>
                        <button type="reset" class="btn btn-warning ">Làm lại</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
@section('script')
    <!-- InputMask -->
    <script src="{{asset('backend/plugins/input-mask/jquery.inputmask.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- page script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
            $('[data-mask]').inputmask();
        })
    </script>
@endsection