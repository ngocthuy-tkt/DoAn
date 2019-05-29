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
                        <h3 class="box-title" style="margin-bottom: 15px">Danh sách đơn hàng</h3>
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <!-- <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#home" role="tab" aria-controls="pills-home" aria-selected="true">Danh sách đơn hàng</a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link success" id="pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="background: #3c8dbc; color: #fff">Đơn hàng đã duyệt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link cancel" id="pills-contact-tab" data-toggle="pill" href="#contact" role="tab" aria-controls="pills-contact" aria-selected="false" style="background: #3c8dbc; color: #fff">Đơn hàng hủy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <div class="box-body table-responsive">
                                <table id="table_success" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        @foreach($columns as $column)
                                            <th>{{$column}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderSucc as $item)
                                        <tr>
                                            <td>{{$item->Id_HoaDonBan}}</td>
                                            <td>{{$item->TenNguoiNhan}}</td>
                                            <td>{{$item->Sdt}}</td>
                                            <td>{{$item->DiaChi}}</td>
                                            <td>{{$item->TongTien}}</td>
                                            <td>
                                                @if($item->TrangThai == 1)
                                                    <label class="label label-success">Đã duyệt</label>
                                                @elseif($item->TrangThai == 2)
                                                    <label class="label label-success">Đã thanh toán</label>
                                                @elseif($item->TrangThai == -1)    
                                                    <label class="label label-danger">Hủy</label>
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
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <div class="box-body table-responsive">
                                <table id="table_cancel" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        @foreach($columns as $column)
                                            <th>{{$column}}</th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orderCan as $item)
                                        <tr>
                                            <td>{{$item->Id_HoaDonBan}}</td>
                                            <td>{{$item->TenNguoiNhan}}</td>
                                            <td>{{$item->Sdt}}</td>
                                            <td>{{$item->DiaChi}}</td>
                                            <td>{{$item->TongTien}}</td>
                                            <td>
                                                @if($item->TrangThai == 1)
                                                    <label class="label label-success">Đã duyệt</label>
                                                @elseif($item->TrangThai == 2)
                                                    <label class="label label-success">Đã thanh toán</label>
                                                @elseif($item->TrangThai == -1)    
                                                    <label class="label label-danger">Hủy</label>
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
                            @foreach($orders as $item)
                                <tr>
                                    <td>{{$item->Id_HoaDonBan}}</td>
                                    <td>{{$item->TenNguoiNhan}}</td>
                                    <td>{{$item->Sdt}}</td>
                                    <td>{{$item->DiaChi}}</td>
                                    <td>{{$item->TongTien}}</td>
                                    <td>
                                        @if($item->TrangThai == 1)
                                            <label class="label label-success">Đã duyệt</label>
                                        @elseif($item->TrangThai == 2)
                                            <label class="label label-success">Đã thanh toán</label>
                                        @elseif($item->TrangThai == -1)    
                                            <label class="label label-danger">Hủy</label>
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