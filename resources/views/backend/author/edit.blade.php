@extends('backend.layout.index')
@section('page_title','Sửa')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa tác giả
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('author.index')}}">Tác giả</a></li>
            <li class="active">edit</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{ route('author.update',['id' => $author->id]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Sửa tác giả</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Họ tên tác giả</label>
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Nhập tên danh mục" name="name"
                                           id="fullname" value="{{ $author->name }}">
                                </div>
                            </div>
                            @if($errors->has('name'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('name') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input <?php $checked = ($author->active == 0) ? 'checked' : ''; ?> type="radio"
                                               name="active" value="0" {{$checked}}>
                                        <span class="label label-danger">Ban</span>
                                    </label>
                                    <label>
                                        <input <?php $checked = ($author->active == 1) ? 'checked' : ''; ?> type="radio"
                                               name="active" value="1" {{$checked}}>
                                        <span class="label label-success">Active</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Avatar</label>
                                <div class="show-avatar">
                                    <img src="{{(preg_match('/http/', $author->avatar)) ? $author->avatar : asset('storage/uploads/user/' . $author->avatar) }}"
                                         alt="" id="img">
                                    <input type="file" name="upload_avatar" id="upload_img" style="display: none">
                                    <a id="browse_file" class="btn btn-success"><i class="fa fa-file-image-o"></i>
                                        Chọn avatar
                                    </a>
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
@endsection