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
                                <a class="nav-link success" id="pills-profile-tab" data-toggle="pill" href="#profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="background: #3c8dbc; color: #fff">Đơn hàng thanh toán</a>
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
                                            <td>{{$item->Id_DonHang}}</td>
                                            <td>#OD-00{{$item->Id_DonHang}}</td>
                                            <td>{{$item->TenNguoiNhan}}</td>
                                            <td>{{$item->Sdt}}</td>
                                            <td>{{$item->DiaChi}}</td>
                                            <td>{{$item->TongTien}}</td>
                                            <td>{{$item->GhiChu}}</td>
                                            <td>
                                                @if($item->KieuThanhToan == 1)
                                                    Thanh toán tại nhà
                                                @else
                                                    Chuyển khoản
                                                @endif
                                            </td>
                                            <td>{{$item->ship}}</td>
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
                                                <a href="{{route('order.edit',['id' => $item->Id_DonHang])}}"
                                                    class="btn btn-action label label-success"><i
                                                                class="fa fa-pencil"></i></a>
                                            @endif  
                                            @if(Auth::guard('admin')->user()->quyen == 1)   
                                                <!-- <button type="button" class="btn btn-xs btn-primary show-modal" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" data-id="#OD-00{{ $item->Id_DonHang }}" data-name="{{ $item->TenNguoiNhan }}" data-sdt="{{ $item->Sdt }}" data-diachi="{{ $item->DiaChi }}" data-money="{{ $item->TongTien }}" data-note="{{ $item->GhiChu }}" data-tensp="{{ $item->TenSp }}" data-size="{{ $item->size }}" data-qty="{{ $item->SoLuong }}"><i class="fa fa-eye"></i></button> -->

                                                <a href="{{ route('order.show', ['id' =>$item->Id_DonHang]) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>                
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
                                            <td>{{$item->Id_DonHang}}</td>
                                            <td>#OD-00{{$item->Id_DonHang}}</td>
                                            <td>{{$item->TenNguoiNhan}}</td>
                                            <td>{{$item->Sdt}}</td>
                                            <td>{{$item->DiaChi}}</td>
                                            <td>{{$item->TongTien}}</td>
                                            <td>{{$item->GhiChu}}</td>
                                            <td>
                                                @if($item->KieuThanhToan == 1)
                                                    Thanh toán tại nhà
                                                @else
                                                    Chuyển khoản
                                                @endif
                                            </td>
                                            <td>{{$item->ship}}</td>
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
                                                <a href="{{route('order.edit',['id' => $item->Id_DonHang])}}"
                                                    class="btn btn-action label label-success"><i
                                                                class="fa fa-pencil"></i></a>
                                            @endif  
                                            @if(Auth::guard('admin')->user()->quyen == 1)   
                                                <!-- <button type="button" class="btn btn-xs btn-primary show-modal" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" data-id="#OD-00{{ $item->Id_DonHang }}" data-name="{{ $item->TenNguoiNhan }}" data-sdt="{{ $item->Sdt }}" data-diachi="{{ $item->DiaChi }}" data-money="{{ $item->TongTien }}" data-note="{{ $item->GhiChu }}" data-tensp="{{ $item->TenSp }}" data-size="{{ $item->size }}" data-qty="{{ $item->SoLuong }}"><i class="fa fa-eye"></i></button> -->

                                                <a href="{{ route('order.show', ['id' =>$item->Id_DonHang]) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>

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
                                    <td>{{$item->Id_DonHang}}</td>
                                    <td>#OD-00{{$item->Id_DonHang}}</td>
                                    <td>{{$item->TenNguoiNhan}}</td>
                                    <td>{{$item->Sdt}}</td>
                                    <td>{{$item->DiaChi}}</td>
                                    <td>{{$item->TongTien}}</td>
                                    <td>{{$item->GhiChu}}</td>
                                    <td>
                                        @if($item->KieuThanhToan == 1)
                                            Thanh toán tại nhà
                                        @else
                                            Chuyển khoản
                                        @endif
                                    </td>
                                    <td>{{$item->ship}}</td>
                                    <td>
                                        @if($item->TrangThai == 1)
                                            <label class="label label-success">Đã duyệt</label>
                                        @elseif($item->TrangThai == 0)
                                            <label class="label label-danger">Chờ</label>
                                        @endif
                                    </td>
                                    <td>
                                    @if(Auth::guard('admin')->user()->quyen == 1)   
                                        <a href="{{route('order.edit',['id' => $item->Id_DonHang])}}"
                                            class="btn btn-action label label-success"><i
                                                        class="fa fa-pencil"></i></a>
                                    @endif  
                                    @if(Auth::guard('admin')->user()->quyen == 1)   
                                        <!-- <button type="button" class="btn btn-xs btn-primary show-modal" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" data-id="#OD-00{{ $item->Id_DonHang }}" data-name="{{ $item->TenNguoiNhan }}" data-sdt="{{ $item->Sdt }}" data-diachi="{{ $item->DiaChi }}" data-money="{{ $item->TongTien }}" data-note="{{ $item->GhiChu }}" data-tensp="{{ $item->TenSp }}" data-size="{{ $item->size }}" data-qty="{{ $item->SoLuong }}"><i class="fa fa-eye"></i></button>     -->
                                        <a href="{{ route('order.show', ['id' =>$item->Id_DonHang]) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>            
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chi tiết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Mã đơn hàng:</label>
            <input type="text" class="form-control" id="id">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">tên khách hàng:</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Số điện thoại:</label>
            <input type="text" class="form-control" id="sdt">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Địa chỉ:</label>
            <input type="text" class="form-control" id="diachi">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="TenSP">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Số lượng:</label>
            <input type="text" class="form-control" id="SoLuong">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Size:</label>
            <input type="text" class="form-control" id="size">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tổng tiền:</label>
            <input type="text" class="form-control" id="money">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Ghi chú:</label>
            <textarea class="form-control" id="note"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

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

        // Show a post
        $(document).on('click', '.show-modal', function () {
            $('#id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('#sdt').val($(this).data('sdt'));
            $('#diachi').val($(this).data('diachi'));
            $('#TenSP').val($(this).data('tensp'));
            $('#SoLuong').val($(this).data('qty'));
            $('#size').val($(this).data('size'));
            $('#money').val($(this).data('money'));
            $('#note').val($(this).data('note'));
            $('#showModal').modal('show');
        });

    </script>
@endsection