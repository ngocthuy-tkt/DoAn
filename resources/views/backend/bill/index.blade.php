@extends('backend.layout.index')
@section('page_title','Administration')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý hóa đơn bán
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">user</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách hóa đơn bán</h3>
                    </div>
                    <div class="box-header">
                        <a href="{{ route('bill.create') }}" class="btn btn-sm btn-success">Thêm mới</a>
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

                            @foreach($hdb as $user)
                                <tr>
                                    <td>{{$user->Id_HoaDonBan}}</td>
                                    <td>#HB-00{{$user->Id_HoaDonBan}}</td>
                                    <td>{{$user->HoTen}}</td>
                                    <td>{{$user->TenKhachhang}}</td>
                                    <td>{{$user->Sdt}}</td>
                                    <td>{{$user->DiaChi}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->NgayTao)->format('d-m-Y')}}</td>
                                    <td>
                                        <!-- @if(Auth::guard('admin')->user()->quyen == 1)
                                            <a href="{{route('invoice.edit',['id' => $user->Id_HoaDonBan])}}"
                                               class="btn btn-action label label-success"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif -->

                                        @if(Auth::guard('admin')->user()->quyen == 1)
                                            <form action="{{ route('invoice.destroy', ['id' => $user->Id_HoaDonBan]) }}"
                                                  method="post" class="inline">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" onclick="return confirm('Bạn có chắc muốn xóa')"
                                                        class="btn btn-action label label-danger">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                        @if(Auth::guard('admin')->user()->quyen == 1)   
                                            <button type="button" class="btn btn-xs btn-primary show-modal" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" data-id="#HB-00{{ $user->Id_HoaDonBan }}" data-nameNV="{{ $user->HoTen }}" data-nameKH="{{ $user->TenKhachhang }}" data-diachi="{{ $user->DiaChi }}" data-sdt="{{ $user->Sdt }}" data-note="{{ $user->GhiChu }}" data-soluong="{{ $user->SoLuong }}" data-dongia="{{ $user->DonGia }}" data-tensp="{{ $user->TenSP }}"><i class="fa fa-eye"></i></button>                
                                        @endif 
                                    </td>
                                </tr>
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
            <label for="recipient-name" class="col-form-label">Tên nhân viên:</label>
            <input type="text" class="form-control" id="nameNV">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tên khách hàng:</label>
            <input type="text" class="form-control" id="nameKH">
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
            <label for="message-text" class="col-form-label">Ghi chú:</label>
            <textarea class="form-control" id="note"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Số lượng:</label>
            <input type="text" class="form-control" id="soluong">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Đơn giá:</label>
            <input type="text" class="form-control" id="dongia">
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="tensp">
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
                "order": [[0, "desc"]]
            })
        })

        // Show a post
        $(document).on('click', '.show-modal', function () {
            $('#id').val($(this).data('id'));
            $('#nameNV').val($(this).data('nameNV'));
            $('#nameKH').val($(this).data('nameKH'));
            $('#sdt').val($(this).data('sdt'));
            $('#diachi').val($(this).data('diachi'));
            $('#soluong').val($(this).data('soluong'));
            $('#note').val($(this).data('note'));
            $('#dongia').val($(this).data('dongia'));
            $('#tensp').val($(this).data('tensp'));
            $('#showModal').modal('show');
        });
    </script>
@endsection