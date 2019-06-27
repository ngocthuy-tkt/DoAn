@extends('backend.layout.index')
@section('page_title','Chi tiết')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Chi tiết hóa đơn bán
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('bill.index')}}">Hóa đơn bán</a></li>
            <li class="active">Chi tiết</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                       <table class="table table-bordered">
				          <thead>
				            <tr>
				              <th scope="col">Sản phẩm</th>
				              <th scope="col">Số lượng</th>
				              <th scope="col">Giá</th>
				            </tr>
				          </thead>
				          <tbody>
				            @foreach($hdb1 as $hd)
				           <tr>
				               <td>{{$hd->TenSP}}</td>
				               <td>{{$hd->SoLuong}}</td>
				               <td>{{$hd->DonGia}}</td>
				           </tr>
				           @endforeach()
				          </tbody>
				        </table>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="center-block max-width-content">
                        <a href="{{ route('bill.index') }}" class="btn btn-primary">Quay lại</a>
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
    
@endsection