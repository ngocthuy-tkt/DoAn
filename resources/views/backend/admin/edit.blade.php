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
                                <select class="form-control select2" style="width: 100%;" name="role">
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

                        </div>
                        <div class="col-md-6">
                            <label>Trạng thái</label>
                            <div class="radio">
                                <label>
                                    <input <?php $checked = ($admin->TrangThai == 0) ? 'checked' : ''; ?> type="radio"
                                           name="active" value="0" {{$checked}}>
                                    <span class="label label-danger">khóa</span>
                                </label>
                                <label>
                                    <input <?php $checked = ($admin->TrangThai == 1) ? 'checked' : ''; ?> type="radio"
                                           name="active" value="1" {{$checked}}>
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