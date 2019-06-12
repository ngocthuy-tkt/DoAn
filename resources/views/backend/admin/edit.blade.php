@extends('backend.layout.index')
@section('page_title','Sửa')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa tài khoản quản trị
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('administration.index')}}">administration</a></li>
            <li class="active">edit</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{ route('administration.update',['id' => $admin->Id_NhanVien]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Sửa tài khoản</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Minimal style -->
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Tên đăng nhập" name="MaNV"
                                           value="{{ $admin->MaNV }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Quyền</label>
                                <select class="form-control select2" style="width: 100%;" name="quyen">
                                    <option value="1" {{($admin->quyen == 1 ) ? 'selected' : ''}}>
                                        Super Admin
                                    </option>
                                    <option value="2" {{($admin->quyen == 2) ? 'selected' : ''}}>
                                        Nhân Viên Bán Hàng
                                    </option>
                                    <option value="3" {{($admin->quyen == 3) ? 'selected' : ''}}>
                                        Nhân Viên Kho
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                                    <input type="date" class="form-control" placeholder="Nhập ngày sinh" name="NgaySinh" value="{{ old('NgaySinh', $admin->NgaySinh) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                                    <input type="number" class="form-control" placeholder="Nhập số điện thoại" name="Sdt" value="{{ old('Sdt', $admin->Sdt) }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-eye-slash"></i></span>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="DiaChi" value="{{ old('DiaChi', $admin->DiaChi) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Minimal style -->
                            <div class="form-group">
                                <label>Mật khẩu mới ( Thay mật khẩu bằng mật khẩu của bạn )</label>
                                <input type="password" class="form-control" placeholder="Nhập mật khẩu mới" name="MatKhau" value="{{ old('MatKhau') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <!-- Minimal style -->
                            <div class="form-group">
                                <label>Giới tính</label>
                                <select class="form-control select2" style="width: 100%;" name="GioiTinh">
                                    <option value="1" {{($admin->GioiTinh == 1 ) ? 'selected' : ''}}>Nam</option>
                                    <option value="2" {{($admin->GioiTinh == 2 ) ? 'selected' : ''}}>Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label>Trạng thái</label>
                            <div class="radio">
                                <label>
                                    <input <?php $checked = ($admin->TrangThai == 0) ? 'checked' : ''; ?> type="radio"
                                           name="TrangThai" value="0" {{$checked}}>
                                    <span class="label label-danger">khóa</span>
                                </label>
                                <label>
                                    <input <?php $checked = ($admin->TrangThai == 1) ? 'checked' : ''; ?> type="radio"
                                           name="TrangThai" value="1" {{$checked}}>
                                    <span class="label label-success">hoạt động</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="center-block max-width-content">
                        <a href="{{route('administration.index')}}" class="btn btn-lg btn-primary"
                           style="margin-right: 10px">Back</a>
                        <button type="submit" class="btn btn-lg btn-warning">Sửa <i class="fa fa-pencil-square-o"></i>
                        </button>
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