@extends('backend.layout.index')
@section('page_title','Sửa')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa danh mục
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('category.index')}}">Danh mục</a></li>
            <li class="active">edit</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{ route('category.update',['id' => $cat->Id_DanhMucSp]) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Sửa tài khoản</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thông tin danh mục</label>
                                <select class="form-control select2" style="width: 100%;" name="Id_NhomSp_Cha">
                                    <option value="0">Danh mục cha</option>
                                    @php multiple_lever_category($categories,0,'',$cat->    Id_NhomSp_Cha) @endphp;
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="TieuDe"
                                           id="TieuDe" value="{{ $cat->TieuDe }}">
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
                                    <input type="text" class="form-control" placeholder="Mô tả" name="MoTa" id="MoTa"
                                           value="{{ $cat->MoTa }}">
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <label>Trạng thái</label>
                            <div class="radio">
                                <label>
                                    <input <?php $checked = ($cat->TrangThai == 0) ? 'checked' : ''; ?> type="radio"
                                           name="TrangThai" value="0" {{$checked}}>
                                    <span class="label label-danger">Ban</span>
                                </label>
                                <label>
                                    <input <?php $checked = ($cat->TrangThai == 1) ? 'checked' : ''; ?> type="radio"
                                           name="TrangThai" value="1" {{$checked}}>
                                    <span class="label label-success">Active</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="center-block max-width-content">
                        <a href="{{route('category.index')}}" class="btn btn-lg btn-primary"
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