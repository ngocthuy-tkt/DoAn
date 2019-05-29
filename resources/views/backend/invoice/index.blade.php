@extends('backend.layout.index')
@section('page_title','Administration')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý hóa đơn mua 
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
                        <h3 class="box-title">Danh sách hóa đơn mua</h3>
                    </div>
                    <div class="box-header">
                        <a href="{{ route('invoice.create') }}" class="btn btn-sm btn-success">Thêm mới</a>
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

                            @foreach($hdm as $user)
                                <tr>
                                    <td>{{$user->Id_HoaDonMua}}</td>
                                    <td>{{$user->TenNCC}}</td>
                                    <td>{{\Carbon\Carbon::parse($user->NgayTao)->format('d-m-Y')}}</td>
                                    <td>{{$user->TongTien}}</td>
                                    <td>
                                        @if($user->TrangThai == 1)
                                            Kích hoạt 
                                        @endif        
                                    </td>
                                    <td>
                                        @if(Auth::guard('admin')->user()->quyen == 1)
                                            <a href="{{route('invoice.edit',['id' => $user->Id_HoaDonMua])}}"
                                               class="btn btn-action label label-success"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif

                                        @if(Auth::guard('admin')->user()->quyen == 1)
                                            <form action="{{ route('invoice.destroy', ['id' => $user->Id_HoaDonMua]) }}"
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

@endsection

@section('script')

    <script>
        $(function () {
            $('#data_table').DataTable({
                "order": [[0, "desc"]]
            })
        })
    </script>
@endsection