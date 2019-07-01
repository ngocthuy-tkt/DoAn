@extends('backend.layout.index')
@section('page_title','Sản phẩm bán chạy')

@section('custom_css')
    <style>
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Sản phẩm bán chạy
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Sản phẩm bán chạy</li>
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
				              <h3 class="box-title">Monthly Recap Report</h3>

				              <div class="box-tools pull-right">
				                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
				                </button>
				                <div class="btn-group">
				                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
				                    <i class="fa fa-wrench"></i></button>
				                  <ul class="dropdown-menu" role="menu">
				                    <li><a href="#">Action</a></li>
				                    <li><a href="#">Another action</a></li>
				                    <li><a href="#">Something else here</a></li>
				                    <li class="divider"></li>
				                    <li><a href="#">Separated link</a></li>
				                  </ul>
				                </div>
				                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				              </div>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				              <div class="row">
				                <div class="col-md-8">
				                  <p class="text-center">
				                    <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
				                  </p>

				                  <div class="chart">
				                    <!-- Sales Chart Canvas -->
				                    <canvas id="salesChart" style="height: 180px; width: 703px;" width="703" height="180"></canvas>
				                  </div>
				                  <!-- /.chart-responsive -->
				                </div>
				                <!-- /.col -->
				                <div class="col-md-4">
				                  <p class="text-center">
				                    <strong>Goal Completion</strong>
				                  </p>

				                  <div class="progress-group">
				                    <span class="progress-text">Add Products to Cart</span>
				                    <span class="progress-number"><b>160</b>/200</span>

				                    <div class="progress sm">
				                      <div class="progress-bar progress-bar-aqua" style="width: 80%"></div>
				                    </div>
				                  </div>
				                  <!-- /.progress-group -->
				                  <div class="progress-group">
				                    <span class="progress-text">Complete Purchase</span>
				                    <span class="progress-number"><b>310</b>/400</span>

				                    <div class="progress sm">
				                      <div class="progress-bar progress-bar-red" style="width: 80%"></div>
				                    </div>
				                  </div>
				                  <!-- /.progress-group -->
				                  <div class="progress-group">
				                    <span class="progress-text">Visit Premium Page</span>
				                    <span class="progress-number"><b>480</b>/800</span>

				                    <div class="progress sm">
				                      <div class="progress-bar progress-bar-green" style="width: 80%"></div>
				                    </div>
				                  </div>
				                  <!-- /.progress-group -->
				                  <div class="progress-group">
				                    <span class="progress-text">Send Inquiries</span>
				                    <span class="progress-number"><b>250</b>/500</span>

				                    <div class="progress sm">
				                      <div class="progress-bar progress-bar-yellow" style="width: 80%"></div>
				                    </div>
				                  </div>
				                  <!-- /.progress-group -->
				                </div>
				                <!-- /.col -->
				              </div>
				              <!-- /.row -->
				            </div>
				            <!-- ./box-body -->
				            <div class="box-footer">
				              <div class="row">
				                <div class="col-sm-3 col-xs-6">
				                  <div class="description-block border-right">
				                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 17%</span>
				                    <h5 class="description-header">$35,210.43</h5>
				                    <span class="description-text">TOTAL REVENUE</span>
				                  </div>
				                  <!-- /.description-block -->
				                </div>
				                <!-- /.col -->
				                <div class="col-sm-3 col-xs-6">
				                  <div class="description-block border-right">
				                    <span class="description-percentage text-yellow"><i class="fa fa-caret-left"></i> 0%</span>
				                    <h5 class="description-header">$10,390.90</h5>
				                    <span class="description-text">TOTAL COST</span>
				                  </div>
				                  <!-- /.description-block -->
				                </div>
				                <!-- /.col -->
				                <div class="col-sm-3 col-xs-6">
				                  <div class="description-block border-right">
				                    <span class="description-percentage text-green"><i class="fa fa-caret-up"></i> 20%</span>
				                    <h5 class="description-header">$24,813.53</h5>
				                    <span class="description-text">TOTAL PROFIT</span>
				                  </div>
				                  <!-- /.description-block -->
				                </div>
				                <!-- /.col -->
				                <div class="col-sm-3 col-xs-6">
				                  <div class="description-block">
				                    <span class="description-percentage text-red"><i class="fa fa-caret-down"></i> 18%</span>
				                    <h5 class="description-header">1200</h5>
				                    <span class="description-text">GOAL COMPLETIONS</span>
				                  </div>
				                  <!-- /.description-block -->
				                </div>
				              </div>
				              <!-- /.row -->
				            </div>
				            <!-- /.box-footer -->
				          </div>
				          <!-- /.box -->
				        </div>
				        <!-- /.col -->
				        <div class="col-md-12">
				          <div class="box">
				              <div class="box-header with-border">
				                <h3 class="box-title">Sản phẩm bán chạy</h3>
				              </div>
				              <div class="box-header with-border">
				                <button class="btn btn-sm btn-info" onclick="window.print();">In</button>
				              </div>
				              <!-- /.box-header -->
				              <div class="box-body">
				                <table class="table table-bordered">
				                  <tbody>
				                      <tr>
				                        <th style="width: 20px">#</th>
				                        <th style="width: 100px">Mã sản phẩm</th>
				                        <th>Tên sản phẩm</th>
				                        <th style="width: 100px">Lượt xem</th>
				                      </tr>
				                      @php $i=1; @endphp
				                      @foreach($result as $res)
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