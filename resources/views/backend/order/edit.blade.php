@extends('backend.layout.index')
@section('page_title','Sửa')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('order.index')}}">Đơn hàng</a></li>
            <li class="active">edit</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{ route('order.update',['id' => $editOrder->Id_DonHang]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <input type="hidden" value="{{$editOrder->Id_DonHang}}" name="Id_DonHang">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Sửa đơn hàng</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thông tin sản phẩm</label>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="" name="TenNguoiNhan"
                                           id="TenNguoiNhan" value="{{ $editOrder->TenNguoiNhan }}">
                                </div>
                            </div>
                            @if($errors->has('TenNguoiNhan'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('TenNguoiNhan') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio"
                                               name="TrangThai" value="0" {{ ($editOrder->TrangThai == 0) ? 'checked' : '' }}>
                                        <span class="label label-warning">Chờ</span>
                                    </label>
                                    <label>
                                        <input type="radio"
                                               name="TrangThai" value="1" {{ ($editOrder->TrangThai == 1) ? 'checked' : '' }}>
                                        <span class="label label-success">Duyệt</span>
                                    </label>
                                    <label>
                                        <input type="radio"
                                               name="TrangThai" value="2" {{ ($editOrder->TrangThai == 2) ? 'checked' : '' }}>
                                        <span class="label label-success">Đã thanh toán</span>
                                    </label>
                                    <label>
                                        <input type="radio"
                                               name="TrangThai" value="-1" {{ ($editOrder->TrangThai == -1) ? 'checked' : '' }}>
                                        <span class="label label-danger">Hủy</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="center-block max-width-content">
                        <a href="{{route('order.index')}}" class="btn btn-lg btn-primary"
                           style="margin-right: 10px">Back</a>
                        <button type="submit" class="btn btn-lg btn-warning">Thay đổi trạng thái <i class="fa fa-pencil-square-o"></i>
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