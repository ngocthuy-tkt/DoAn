@extends('backend.layout.index')
@section('page_title','Sửa')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa tài khoản người dùng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('users.index')}}">administration</a></li>
            <li class="active">edit</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{ route('users.update',['id' => $user->Id_KhachHang]) }}" method="POST" enctype="multipart/form-data">
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
                                <label>Thông tin tài khoản</label>
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="text" class="form-control" placeholder="Nhập họ và tên" name="HoTen" value="{{ $user->HoTen }}">
                                </div>
                            </div>
                            @if($errors->has('HoTen'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('HoTen') !!}
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Giới tính</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="GioiTinh" value="0">
                                        <span>Nữ</span>
                                    </label>
                                    <label>
                                        <input checked type="radio" name="GioiTinh" value="1">
                                        <span>Nam</span>
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <input type="text" class="form-control" name="Sdt" value="{{ $user->Sdt }}" data-inputmask="'mask': ['9999999999[9]']" data-mask="" placeholder="Số điện thoại">
                                </div>
                            </div>
                            @if($errors->has('Sdt'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('Sdt') !!}
                                </div>
                            @endif

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">#</span>
                                    <input type="text" class="form-control" placeholder="Nhập địa chỉ" name="DiaChi" value="{{ $user->DiaChi }}">
                                </div>
                            </div>
                            @if($errors->has('DiaChi'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('DiaChi') !!}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input <?php $checked = ($user->TrangThai == 0) ? 'checked' : ''; ?> type="radio" name="TrangThai" value="0" {{$checked}}>
                                        <span class="label label-danger">Khóa</span>
                                    </label>
                                    <label>
                                        <input <?php $checked = ($user->TrangThai == 1) ? 'checked' : ''; ?> type="radio" name="TrangThai" value="1" {{$checked}}>
                                        <span class="label label-success">Hoạt động</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <div class="show-avatar">
                                    <img src="{{(preg_match('/http/', $user->Avatar)) ? $user->Avatar : asset('storage/uploads/user/' . $user->Avatar) }}" alt="" id="img">
                                    <input type="file" name="upload_avatar" id="upload_img" style="display: none">
                                    <a id="browse_file" class="btn btn-success"><i class="fa fa-file-image-o"></i> Chọn avatar</a>
                                </div>
                            </div>
                            @if($errors->has('upload_avatar'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('upload_avatar') !!}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="center-block max-width-content">
                        <a href="{{route('users.index')}}" class="btn btn-lg btn-primary"
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