@extends('backend.layout.index')
@section('page_title','Thêm mới')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới hàng tồn kho
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('inventory.index')}}">Tồn kho</a></li>
            <li class="active">add</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('inventory.store')}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sản phẩm</label>
                                <select class="form-control select2" style="width: 100%;" name="Id_SanPham">
                                    <option>-- Chọn sản phẩm --</option>
                                    @foreach($sanpham as $item)
                                    	<option value="{{ $item->Id_SanPham }}">{{ $item->TenSp }}</option>
                                    @endforeach()
                                </select>
                                @if($errors->has('Id_SanPham'))
	                                <div class="help-block text-red">
	                                    * {!! $errors->first('Id_SanPham') !!}
	                                </div>
	                            @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Mã đơn hàng" name="MaDonHang" id="MaDonHang"
                                           value="{{ old('MaDonHang') }}">
                                </div>
                            </div>
                            @if($errors->has('MaDonHang'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('MaDonHang') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control" placeholder="Số lượng" name="SoLuong" id="SoLuong"
                                           value="{{ old('SoLuong') }}">
                                </div>
                            </div>
                            @if($errors->has('SoLuong'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('SoLuong') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control" placeholder="Giá tiền" name="GiaTien" id="GiaTien"
                                           value="{{ old('GiaTien') }}">
                                </div>
                            </div>
                            @if($errors->has('GiaTien'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('GiaTien') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="date" class="form-control" placeholder="Ngày tạo" name="NgayTao" id="NgayTao"
                                           value="{{ old('NgayTao') }}">
                                </div>
                            </div>
                            @if($errors->has('NgayTao'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('NgayTao') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Ghi chú" name="GhiChu" id="GhiChu"
                                           value="{{ old('GhiChu') }}">
                                </div>
                            </div>
                            @if($errors->has('GhiChu'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('GhiChu') !!}
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