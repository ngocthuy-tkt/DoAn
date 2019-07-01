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
            Quản lý tồn kho
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Tồn kho</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title" style="margin-bottom: 15px">Danh sách tồn kho</h3>
                        <div class="box-header">
	                        <a href="{{ route('inventory.create') }}" class="btn btn-sm btn-success">Thêm mới</a>
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
                            @foreach($hangloi as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->MaSp}}</td>
                                    <td>{{$item->MaDonHang}}</td>
                                    <td>{{$item->SoLuong}}</td>
                                    <td>{{$item->GiaTien}}</td>
                                    <td>{{\Carbon\Carbon::parse($item->NgayTao)->format('d-m-Y')}}</td>
                                    <td>{{$item->GhiChu}}</td>
                                   
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