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
            Quản lý đơn hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Đơn hàng</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách đơn hàng</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="data_table" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                @foreach($columns as $column)
                                    <th>{{$column}}</th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{$item->Id_HoaDonBan}}</td>
                                    <td>{{$item->TenNguoiNhan}}</td>
                                    <td>{{$item->Sdt}}</td>
                                    <td>{{$item->DiaChi}}</td>
                                    <td>{{format_money($item->TongTien)}}</td>
                                    <td>
                                        @if($item->TrangThai == 1)
                                            <label class="label label-success">Đã duyệt</label>
                                        @elseif($item->TrangThai == 2)
                                            <label class="label label-success">Đã thanh toán</label>
                                        @elseif($item->TrangThai == -1)    
                                            <label class="label label-waring">Hủy</label>
                                        @else
                                            <label class="label label-danger">Chờ</label>
                                        @endif
                                    </td>
                                    <td>
                                    @if(Auth::guard('admin')->user()->quyen == 1)   
                                        <a href="{{route('order.edit',['id' => $item->Id_HoaDonBan])}}"
                                               class="btn btn-action label label-success"><i
                                                        class="fa fa-pencil"></i></a>
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
            })
        })
    </script>
@endsection