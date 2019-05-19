@extends('backend.layout.index')
@section('page_title','Thêm mới')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới danh mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('category.index')}}">Danh mục</a></li>
            <li class="active">add</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('category.store')}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thông tin danh mục</label>
                                <select class="form-control select2" style="width: 100%;" name="Id_NhomSp_Cha">
                                    <option value="0" selected="selected">Danh mục cha</option>
                                    @php multiple_lever_category($categories) @endphp;
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="TieuDe"
                                           id="TieuDe" value="{{ old('TieuDe') }}">
                                </div>
                            </div>
                            @if($errors->has('TieuDe'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('TieuDe') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" readonly class="form-control" placeholder="Slug" name="Slug" id="Slug"
                                           value="{{ old('Slug') }}">
                                </div>
                            </div>
                            @if($errors->has('Slug'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('Slug') !!}
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="TrangThai" value="0">
                                        <span class="label label-danger">Ban</span>
                                    </label>
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