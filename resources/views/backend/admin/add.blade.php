@extends('backend.layout.index')
@section('page_title','Thêm mới')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới tài khoản quản trị viên
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('administration.index')}}">administration</a></li>
            <li class="active">add</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('administration.store')}}" method="POST" role="form" enctype="multipart/form-data">
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
                                    <input type="text" class="form-control" placeholder="Mã nhân viên" name="MaNV" id="MaNV"  value="{{ old('MaNV') }}">
                                </div>
                            </div>
                            @if($errors->has('MaNV'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('MaNV') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Tên đăng nhập" name="HoTen" value="{{ old('HoTen') }}">
                                </div>
                            </div>
                            @if($errors->has('HoTen'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('HoTen') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                                    <input type="password" class="form-control" placeholder="Nhập mật khẩu" name="MatKhau">
                                </div>
                            </div>
                            @if($errors->has('MatKhau'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('MatKhau') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="password_confirmation">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Minimal style -->
                            <div class="form-group">
                                <label>Quyền</label>
                                <select class="form-control select2" style="width: 100%;" name="quyen">
                                    <option value="1" selected="selected">Super Admin</option>
                                    <option value="2">Nhân viên bán hàng</option>
                                    <option value="3">Nhân viên kho</option>
                                </select>
                            </div>
                            @if($errors->has('quyen'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('quyen') !!}
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
    <!-- Select2 -->
    <script src="{{asset('backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- page script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        })
    </script>
@endsection