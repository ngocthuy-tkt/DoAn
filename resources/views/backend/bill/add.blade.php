@extends('backend.layout.index')
@section('page_title','Thêm mới')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới hóa đơn bán
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('bill.index')}}">Hóa đơn bán</a></li>
            <li class="active">add</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('bill.store')}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Tên khách hàng" name="TenKhachHang" value="{{ old('TenKhachHang') }}">
                                </div>
                            </div>
                            @if($errors->has('TenKhachHang'))
                                <div class="help-block text-red">
                                    {!! $errors->first('TenKhachHang') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control" placeholder="Số điện thoại" name="Sdt" value="{{ old('Sdt') }}">
                                </div>
                            </div>
                            @if($errors->has('Sdt'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('Sdt') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Địa chỉ" name="DiaChi" value="{{ old('DiaChi') }}">
                                </div>
                            </div>
                            @if($errors->has('DiaChi'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('DiaChi') !!}
                                </div>
                            @endif
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Ghi chú" name="GhiChu" value="{{ old('GhiChu') }}">
                                </div>
                            </div>
                            @if($errors->has('GhiChu'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('GhiChu') !!}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6 detail-form">
                            <label for="">Thêm chi tiết</label>
                            <div class="form-group">
                                <select class="form-control select2" style="width: 100%;" name="Id_SanPham[]" id="mySelect">
                                    <option value="">Chọn sản phẩm</option>
                                    @foreach($product as $pro)
                                        <option id="filter" value="{{ $pro->Id_SanPham }}" data-price="{{$pro->DonGia}}">{{ $pro->TenSp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control" placeholder="Số lượng" name="SoLuong[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control" placeholder="Đơn giá" name="DonGia[]">
                                </div>
                            </div>
                            <button type="button" class="btn btn-xs btn-primary add">Thêm chi tiết</button>
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
        });

        $(document).ready(function(){
          var element ='<div class="form-group">'+
                                '<select class="form-control select2" style="width: 100%;" name="Id_SanPham[]">'+
                                    '<option value="">Chọn sản phẩm</option>'+
                                    '@foreach($product as $pro)'+
                                        '<option value="{{ $pro->Id_SanPham }}">{{ $pro->TenSp }}</option>'+
                                    '@endforeach'+
                                '</select>'+
                            '</div>'+
                            '<div class="form-group">'+
                                '<div class="input-group">'+
                                    '<span class="input-group-addon"><i class="fa fa-user"></i></span>'+
                                    '<input type="number" class="form-control" placeholder="Số lượng" name="SoLuong[]">'+
                                '</div>'+
                            '</div>'+
                            '<div class="form-group">'+
                               '<div class="input-group">'+
                                    '<span class="input-group-addon"><i class="fa fa-user"></i></span>'+
                                    '<input type="number" class="form-control" placeholder="Đơn giá" name="DonGia[]">'+
                                '</div>'+
                            '</div>';  
          $(".add").click(function(){
            $(".detail-form").append(element);
          })

          $('#mySelect').on('change', function(){
            alert($(this).data('price'));
          });

        });
    </script>
@endsection