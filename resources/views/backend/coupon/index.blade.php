@extends('backend.layout.index')
@section('page_title','Administration')

@section('custom_css')
    <style>
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý phiếu hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Phiếu hàng</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title" style="margin-bottom: 15px">Danh sách phiếu hàng</h3>
                        <div class="box-header">
	                        <a href="{{ route('phieunhap.create') }}" class="btn btn-sm btn-success">Thêm mới</a>
	                    </div>
                    </div>
                    <!-- /.box-header -->
                    
                    <div class="box-body table-responsive table_full">
                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                @foreach($columns as $column)
                                    <th>{{$column}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($phieunhap as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->NgayTao)->format('d-m-Y')}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->NgayCapNhap)->format('d-m-Y')}}</td>
                                    <td>{{$item->TongTien}}</td>
                                    <td>{{$item->GhiChu}}</td>
                                    <td>
                                        @if(Auth::guard('admin')->user()->quyen == 1)
                                            <a href="{{route('phieunhap.edit',['id' => $item->id])}}"
                                               class="btn btn-action label label-success"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif

                                        @if(Auth::guard('admin')->user()->quyen == 1)
                                            <form action="{{ route('phieunhap.destroy', ['id' => $item->id]) }}"
                                                  method="post" class="inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa')"
                                                        class="btn btn-action label label-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                   
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                @foreach($columns as $column)
                                    <th>{{$column}}</th>
                                @endforeach
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection

@section('script')

    <script>
        $(function () {
            $('#data_table').DataTable({
                "ordering": false
            });

            $('#table_success').DataTable({
                "ordering": false
            });

            $('#table_cancel').DataTable({
                "ordering": false
            });

            $('.success').on('click', function(){
                $('.table_full').css('display', 'none');
            });
        })
    </script>
@endsection