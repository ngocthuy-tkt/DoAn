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
            Quản lý Admin
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">administration</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách tài khoản quản trị</h3>
                    </div>
                    <div class="box-header">
                        <a href="{{route('administration.create')}}" class="btn btn-sm btn-success">Thêm mới</a>
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
                            @foreach($admins as $admin)
                                <tr>
                                    <td>{{$admin->HoTen}}</td>
                                    <td>{{$admin->MaNV}}</td>
                                    <td>{{$admin->NgaySinh}}</td>
                                    <td>
                                        @if($admin->GioiTinh == 1)
                                            Nam
                                        @else
                                            Nữ
                                        @endif
                                    </td>
                                    <td>{{$admin->Sdt}}</td>
                                    <td>{{$admin->DiaChi}}</td>
                                    <td>
                                        @if($admin->TrangThai == 1)
                                            <label class="label label-success">Activated</label>
                                        @else
                                            <label class="label label-danger">Đợi duyệt</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if($admin->quyen == 1)
                                            <label class="label label-success">Super Admin</label>
                                        @elseif( $admin->quyen == 2)
                                            <label class="label label-warning">Nhân Viên Bán Hàng</label>
                                        @elseif( $admin->quyen == 3)
                                            <label class="label label-warning">Nhân Viên Kho</label>
                                        @endif
                                    </td>
                                    <td>
                                        @if(Auth::guard('admin')->user()->quyen == 1 && $admin->MaNV != 'admin')
                                            <a href="{{route('administration.edit',['id' => $admin->Id_NhanVien])}}"
                                               class="btn btn-action label label-success"><i
                                                        class="fa fa-pencil"></i></a>
                                        @endif

                                        @if(Auth::guard('admin')->user()->quyen == 1 && $admin->MaNV != 'admin')
                                            <form action="{{ route('administration.destroy', ['id' => $admin->Id_NhanVien]) }}"
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
            $('#data_table').DataTable()
        })
    </script>
@endsection