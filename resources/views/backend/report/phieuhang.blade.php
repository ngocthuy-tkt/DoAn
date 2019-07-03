@extends('backend.layout.index')
@section('page_title','Báo cáo phiếu hàng')

@section('custom_css')
    <style>
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Báo cáo phiếu hàng
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Báo cáo phiếu hàng</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="row">
				        <!-- /.col -->
				        <div class="col-md-12">
				           <div class="box">
				              <div class="box-header with-border">
				                <h3 class="box-title">Báo cáo phiếu hàng</h3>
				              </div>
				              <div class="box-header with-border">
				                <button class="btn btn-sm btn-info" onclick="window.print();">In</button>
				              </div>
				              <!-- /.box-header -->
				              <div class="box-body">
				                <table class="table table-bordered">
				                  <tbody>
				                      <tr>
				                        <th style="width: 10px">#</th>
				                        <th>Mã đơn hàng</th>
				                        <th>Ghi chú</th>
				                        <th>Ngày tạo</th>
				                      </tr>
				                      @php $i=1; @endphp
				                      @foreach($baocao as $res)
				                      <tr>
				                        <td>{{ $i }}</td>
				                        <td>{{ $res->MaDonHang }}</td>
				                        <td>
				                          {{ $res->GhiChu }} 
				                        </td>
				                        <td>
				                        	{{ \Carbon\Carbon::parse($res->NgayTao)->format('d-m-Y') }} 
				                        </td>
				                      </tr>
				                      @php $i++; @endphp
				                      @endforeach()
				                    </tbody>
				                  </table>
				              </div>
				              <!-- /.box-body -->
				              <div class="box-footer clearfix">
				                <ul class="pagination pagination-sm no-margin pull-right">
				                  <li><a href="#">«</a></li>
				                  <li><a href="#">1</a></li>
				                  <li><a href="#">2</a></li>
				                  <li><a href="#">3</a></li>
				                  <li><a href="#">»</a></li>
				                </ul>
				              </div>
				          </div>
				        </div>
				    </div>
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

        // Show a post
        $(document).on('click', '.show-modal', function () {
            $('#id').val($(this).data('id'));
            $('#name').val($(this).data('name'));
            $('#sdt').val($(this).data('sdt'));
            $('#diachi').val($(this).data('diachi'));
            $('#money').val($(this).data('money'));
            $('#note').val($(this).data('note'));
            $('#showModal').modal('show');
        });

    </script>
@endsection