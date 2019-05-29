@extends('backend.layout.index')
@section('page_title','Sửa nhà cung cấp')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Sửa nhà cung cấp
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('supplier.index')}}">Nhà cung cấp</a></li>
            <li class="active">add</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('supplier.update', ['id' => $ncc->Id_NCC])}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Sửa</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Nhập tên nhà cung cấp" name="TenNCC"
                                           id="TenNCC" value="{{ old('TenNCC', $ncc->TenNCC) }}">
                                </div>
                            </div>
                            @if($errors->has('TenNCC'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('TenNCC') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control" placeholder="Số điện thoại" name="Sdt" id="Sdt"
                                           value="{{ old('Sdt', $ncc->Sdt) }}">
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
                                    <input type="email" class="form-control" placeholder="Email" name="Gmail" id="Gmail"
                                           value="{{ old('Gmail', $ncc->Gmail) }}">
                                </div>
                            </div>
                            @if($errors->has('Gmail'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('Gmail') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Địa chỉ" name="DiaChi" id="DiaChi"
                                           value="{{ old('DiaChi', $ncc->DiaChi) }}">
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
                                        <input <?php $checked = ($ncc->TrangThai == 0) ? 'checked' : ''; ?> type="radio" name="TrangThai" value="0" {{$checked}}>
                                        <span class="label label-danger">Ban</span>
                                    </label>
                                    <label>
                                        <input <?php $checked = ($ncc->TrangThai == 1) ? 'checked' : ''; ?> type="radio" name="TrangThai" value="1" {{ $checked }}>
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
                        <a href="{{route('supplier.index')}}" class="btn btn-lg btn-primary"
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