@extends('backend.layout.index')
@section('page_title','Danh mục sản phẩm | Administration')

@section('custom_css')
    <style>
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Quản lý danh mục sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Danh mục sản phẩm</li>

        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Danh sách danh mục (k được xóa danh mục có sản phẩm)</h3>
                    </div>
                    <div class="box-header">
                        <a href="{{ route('category.create') }}" class="btn btn-sm btn-success">Thêm mới</a>
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
                            @php table_category($categories)@endphp
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
            })
        })
    </script>
@endsection