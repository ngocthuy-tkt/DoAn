@extends('backend.layout.index')
@section('page_title','Thêm mới')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới hóa đơn mua
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('invoice.index')}}">Hóa đơn mua</a></li>
            <li class="active">add</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('invoice.store')}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <select class="form-control select2" style="width: 100%;" name="Id_NhaCC">
                                    <option value="0" selected="selected">Chọn nhà cung cấp</option>
                                    @foreach($ncc as $item)
                                        <option value="{{ $item->Id_NCC }}">{{ $item->TenNCC }}</option>
                                    @endforeach()
                                </select>
                                @if($errors->has('TongTien'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('TongTien') !!}
                                </div>
                            @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="date" class="form-control" placeholder="Ngày tạo" name="NgayTao"
                                           id="NgayTao" value="{{ old('NgayTao') }}">
                                </div>
                            </div>
                            @if($errors->has('NgayTao'))
                                <div class="help-block text-red">
                                    {!! $errors->first('NgayTao') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="date" class="form-control" placeholder="Ngày cập nhập" name="NgayCapNhap" id="NgayCapNhap"
                                           value="{{ old('NgayCapNhap') }}">
                                </div>
                            </div>
                            @if($errors->has('NgayCapNhap'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('NgayCapNhap') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Tổng tiền" name="TongTien" id="TongTien"
                                           value="{{ old('TongTien') }}">
                                </div>
                            </div>
                            @if($errors->has('TongTien'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('TongTien') !!}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input checked type="radio" name="TrangThai" value="1">
                                        <span class="label label-success">Active</span>
                                    </label>
                                </div>
                            </div>
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