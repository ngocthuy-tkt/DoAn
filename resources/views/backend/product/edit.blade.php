@extends('backend.layout.index')
@section('page_title','Sửa')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sửa sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('products.index')}}">Sản phẩm</a></li>
            <li class="active">edit</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{ route('products.update',['id' => $product->Id_SanPham]) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT')}}
            <input type="hidden" value="{{$product->Id_SanPham}}" name="Id_SanPham">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Sửa sản phẩm</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Thông tin sản phẩm</label>
                                <select class="form-control select2" style="width: 100%;" name="Id_DanhMucSp">
                                    <option value="0">Danh mục</option>
                                    @php multiple_lever_category($categories,0,'',$product->Id_DanhMucSp) @endphp;
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="text" class="form-control" placeholder="Nhập tên sản phẩm" name="TenSp"
                                           id="TenSp" value="{{ $product->TenSp }}">
                                </div>
                            </div>
                            @if($errors->has('TenSp'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('TenSp') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="MaSP" name="MaSP"
                                           id="MaSP"
                                           value="{{ $product->MaSP }}">
                                </div>
                            </div>
                            @if($errors->has('MaSP'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('MaSP') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" class="form-control" placeholder="Giá sản phẩm" name="DonGia"
                                           value="{{ $product->DonGia }}">
                                </div>
                            </div>
                            @if($errors->has('DonGia'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('DonGia') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" class="form-control" placeholder="Giá khuyến mãi" name="GiaKhuyenMai" value="{{ $product->GiaKhuyenMai }}">
                                </div>
                            </div>
                            @if($errors->has('GiaKhuyenMai'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('GiaKhuyenMai') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                    <input type="number" class="form-control" placeholder="Số sản phẩm hiện có"
                                           name="SoLuong"
                                           value="{{ $product->SoLuong }}">
                                </div>
                            </div>
                            @if($errors->has('SoLuong'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('SoLuong') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Kích cỡ</label>
                                <select class="form-control select2" style="width: 100%;" name="size[]" multiple>
                                    <option value="">|--- Chọn size---|</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Ảnh sản phẩm</label>
                                <div class="show-avatar show-product-img">
                                    <img src="{{ asset($product->AnhChinh) }}"
                                         alt="" id="img">
                                    <input type="file" name="AnhChinh" id="upload_img" style="display: none">
                                    <a id="browse_file" class="btn btn-success">
                                        <i class="fa fa-file-image-o"></i>
                                        Chọn ảnh
                                    </a>
                                </div>
                            </div>
                            @if($errors->has('AnhChinh'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('AnhChinh') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Hot</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio"
                                               name="Sp_Hot" value="0" {{ ($product->Sp_Hot == 0) ? 'checked' : '' }}>
                                        <span class="label label-violet">Không</span>
                                    </label>
                                    <label>
                                        <input type="radio"
                                               name="Sp_Hot" value="1" {{ ($product->Sp_Hot == 1) ? 'checked' : '' }}>
                                        <span class="label label-danger">Hot</span>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio"
                                               name="TrangThai" value="0" {{ ($product->TrangThai == 0) ? 'checked' : '' }}>
                                        <span class="label label-warning">Khóa</span>
                                    </label>
                                    <label>
                                        <input type="radio"
                                               name="TrangThai" value="1" {{ ($product->TrangThai == 1) ? 'checked' : '' }}>
                                        <span class="label label-success">Hoạt động</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="center-block max-width-content">
                        <a href="{{route('products.index')}}" class="btn btn-lg btn-primary"
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