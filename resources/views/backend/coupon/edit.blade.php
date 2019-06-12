@extends('backend.layout.index')
@section('page_title','Sửa')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chỉnh sửa hóa đơn mua
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('invoice.index')}}">Hóa đơn mua</a></li>
            <li class="active">add</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('phieunhap.update', ['id' => $ph->id])}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Chỉnh sửa</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <select class="form-control select2" style="width: 100%;" name="Id_NhaCC">
                                    <option value="0" selected="selected">Chọn nhà cung cấp</option>
                                    @foreach($ncc as $item)
                                        <option value="{{ $item->Id_NCC }}" {{ $item->Id_NCC == old('Id_NhaCC', $ph->Id_NhaCC) ? "selected" : "" }}>{{ $item->TenNCC }}</option>
                                    @endforeach()
                                </select>
                                @if($errors->has('Id_NhaCC'))
                                    <div class="help-block text-red">
                                       * {!! $errors->first('Id_NhaCC') !!}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="date" class="form-control" placeholder="Ngày tạo" name="NgayTao"
                                           id="NgayTao" value="{{ old('NgayTao', $ph->NgayTao) }}">
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
                                    <input type="date" class="form-control" placeholder="Ngày cập nhập" name="NgayCapNhap" id="NgayCapNhap"
                                           value="{{ old('NgayCapNhap', $ph->NgayCapNhap) }}">
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
                                           value="{{ old('TongTien', $ph->TongTien) }}">
                                </div>
                            </div>
                            @if($errors->has('TongTien'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('TongTien') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Ghi chú" name="GhiChu" id="GhiChu"
                                           value="{{ old('GhiChu', $ph->GhiChu) }}">
                                </div>
                            </div>
                            @if($errors->has('GhiChu'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('GhiChu') !!}
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
                        <a href="{{route('invoice.index')}}" class="btn btn-lg btn-primary"
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