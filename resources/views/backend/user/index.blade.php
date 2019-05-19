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
            Quản lý tài khoản khách hàng
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
                        <h3 class="box-title">Danh sách tài khoản khách hàng</h3>
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

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->Id_KhachHang}}</td>
                                    <td>{{$user->HoTen}}</td>
                                    <td>{{$user->NgaySinh}}</td>
                                    <td>{{$user->GioiTinh}}</td>
                                    <td>{{$user->Sdt}}</td>
                                    <td>{{$user->DiaChi}}</td>
                                    <td><img src="{{(preg_match('/http/', $user->Avatar)) ? $user->Avatar : asset('storage/uploads/user/' . $user->Avatar) }}" alt="" style="width: 60px; height: 60px"
                                             title="{{$user->HoTen}}"></td>
                                    <td>{{$user->NgayTao}}</td>
                                    <td>
                                        @if($user->TrangThai == 1)
                                            <label class="label label-success">Hoạt Động</label>
                                        @else
                                            <label class="label label-danger">Khóa</label>
                                        @endif
                                    </td>
                                    <td>{{$user->Xu}}</td>
                                    <td>
                                        @if(Auth::guard('admin')->user()->quyen == 1)
                                            <a href="{{route('users.edit',['id' => $user->Id_KhachHang])}}"
                                               class="btn btn-action label label-success"><i
                                                        class="fa fa-pencil"></i></a>
                                       {{--  @endif

                                        @if(Auth::guard('admin')->user()->delete == 1) --}}
                                            <form action="{{ route('users.destroy', ['id' => $user->Id_KhachHang]) }}"
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