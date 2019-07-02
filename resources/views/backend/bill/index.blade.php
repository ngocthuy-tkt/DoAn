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
                                  <input type="hidden" value="{{$user->Id_HoaDonBan}}" name="id">  
                                    <td>{{$user->Id_HoaDonBan}}</td>
                                    <td>#HB-00{{$user->Id_HoaDonBan}}</td>
                                    <td>{{$user->HoTen}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->address}}</td>
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

                                            <!-- <button type="button" class="btn btn-xs btn-primary show-modal" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" data-id="#HB-00{{ $user->Id_HoaDonBan }}" data-nameNV="{{ $user->HoTen }}" data-nameKH="{{ $user->name }}" data-diachi="{{ $user->DiaChi }}" data-sdt="{{ $user->Sdt }}" data-note="{{ $user->GhiChu }}" data-soluong="{{ $user->SoLuong }}" data-dongia="{{ $user->DonGia }}" data-tensp="{{ $user->TenSP }}"><i class="fa fa-eye"></i></button>      -->  

                                            <a href="{{ route('bill.show', ['id' =>$user->Id_HoaDonBan]) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>         
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