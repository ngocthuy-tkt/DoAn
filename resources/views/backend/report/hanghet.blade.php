@extends('backend.layout.index')
@section('page_title','Hàng sắp hết trong kho')

@section('custom_css')
    <style>
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Hàng sắp hết trong kho
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Hàng sắp hết trong kho</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="row">
				        <div class="col-md-12">
				           <div class="box">
				              <div class="box-header with-border">
				                <h3 class="box-title">Sản phẩm bán chậm</h3>
				              </div>
				              <div class="box-header with-border">
				                <button class="btn btn-sm btn-info" onclick="window.print();">In</button>
				              </div>
				              <!-- /.box-header -->
				              <div class="box-body">
				                <table class="table table-bordered">
				                  <tbody>
				                      <tr>
				                        <th style="width: 50px">#</th>
				                        <th style="width: 200px">Mã sản phẩm</th>
				                        <th>Tên sản phẩm</th>
				                        <th style="width: 100px">Lượt xem</th>
				                      </tr>
				                      @php $i=1; @endphp
				                      @foreach($pro as $res)
				                      <tr>
				                        <td>{{ $i }}</td>
				                        <td>{{ $res->MaSP }}</td>
				                        <td>
				                          {{ $res->TenSP }} 
				                        </td>
				                        <td><span class="badge bg-red">{{ $res->LuotXem }} </span></td>
				                      </tr>
				                      @php $i++; @endphp
				                      @endforeach()
				                    </tbody>
				                  </table>
				              </div>
				              <!-- /.box-body -->
				              <div class="box-footer clearfix" style="text-align: center;">
				                {!! $pro->links() !!}
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