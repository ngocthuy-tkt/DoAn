@extends('backend.layout.index')
@section('page_title','Thêm mới')
@section('link_css')
    <link rel="stylesheet" href="{{asset('backend/bower_components/select2/dist/css/select2.min.css')}}">
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Thêm mới hóa đơn mua
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('invoice.index')}}">Hóa đơn mua</a></li>
            <li class="active">add</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <form action="{{route('invoice.store')}}" method="POST" role="form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Thêm mới</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nhà cung cấp</label>
                                <select class="form-control select2" style="width: 100%;" name="Id_NhaCC">
                                    <option value="0" selected="selected">Chọn nhà cung cấp</option>
                                    @foreach($ncc as $item)
                                        <option value="{{ $item->Id_NCC }}">{{ $item->TenNCC }}</option>
                                    @endforeach()
                                </select>
                                @if($errors->has('TongTien'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('TongTien') !!}
                                </div>
                            @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon">@</span>
                                    <input type="date" class="form-control" placeholder="Ngày tạo" name="NgayTao"
                                           id="NgayTao" value="{{ old('NgayTao') }}">
                                </div>
                            </div>
                            @if($errors->has('NgayTao'))
                                <div class="help-block text-red">
                                    {!! $errors->first('NgayTao') !!}
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-3"></div>
                    </div>
                    <div class="detail-form row">
                        <div class="col-md-3">
                            <button style="float: right;" type="button" class="btn btn-xs btn-primary add">Thêm</button>
                            <label for="">Sản phẩm 1</label>
                            <div class="form-group">
                                <select class="form-control select2" style="width: 100%;" name="Id_SanPham[]" id="mySelect">
                                    <option value="">Chọn sản phẩm</option>
                                    @foreach($product as $pro)
                                        <option value="{{ $pro->Id_SanPham }}" data-price="{{$pro->DonGia}}" data-name="{{$pro->TenSp}}">{{ $pro->TenSp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control soluong" placeholder="Số lượng" name="SoLuong[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control dongia" id="dongia" placeholder="Đơn giá" name="DonGia[]">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Sản phẩm 2</label>
                            <div class="form-group">
                                <select class="form-control select2" style="width: 100%;" name="Id_SanPham[]" id="sp2">
                                    <option value="">Chọn sản phẩm</option>
                                    @foreach($product as $pro)
                                        <option value="{{ $pro->Id_SanPham }}" data-price="{{$pro->DonGia}}" data-name="{{$pro->TenSp}}">{{ $pro->TenSp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control soluong1" placeholder="Số lượng" name="SoLuong[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control dongia1" id="dongia1" placeholder="Đơn giá" name="DonGia[]">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Sản phẩm 3</label>
                            <div class="form-group">
                                <select class="form-control select2" style="width: 100%;" name="Id_SanPham[]" id="sp3">
                                    <option value="">Chọn sản phẩm</option>
                                    @foreach($product as $pro)
                                        <option value="{{ $pro->Id_SanPham }}" data-price="{{$pro->DonGia}}" data-name="{{$pro->TenSp}}">{{ $pro->TenSp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control soluong2" placeholder="Số lượng" name="SoLuong[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control dongia2" id="dongia2" placeholder="Đơn giá" name="DonGia[]">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="">Sản phẩm 4</label>
                            <div class="form-group">
                                <select class="form-control select2" style="width: 100%;" name="Id_SanPham[]" id="sp4">
                                    <option value="">Chọn sản phẩm</option>
                                    @foreach($product as $pro)
                                        <option value="{{ $pro->Id_SanPham }}" data-price="{{$pro->DonGia}}" data-name="{{$pro->TenSp}}">{{ $pro->TenSp }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control soluong3" placeholder="Số lượng" name="SoLuong[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="number" class="form-control dongia3" id="dongia3" placeholder="Đơn giá" name="DonGia[]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">Sản phẩm</th>
                              <th scope="col">Số lượng</th>
                              <th scope="col">Giá</th>
                            </tr>
                          </thead>
                          <tbody>
                           
                          </tbody>
                        </table>
                        <div>
                            Tổng tiền: <p class="total"></p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="center-block max-width-content">
                        <button type="submit" class="btn btn-primary">Tạo mới</button>
                        <button type="reset" class="btn btn-warning ">Làm lại</button>
                        <button type="reset" class="btn btn-warning " onclick='window.print();'>In</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
    <!-- /.content -->
@endsection
@section('script')
    <!-- Select2 -->
    <script src="{{asset('backend/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- page script -->
    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2();
        });

        $(document).ready(function(){
         
          $(".add").click(function(){
            var soluong = $('.soluong').val();
            var dongia = $('.dongia').val();
            var e = document.getElementById("mySelect");
            var name = e.options[e.selectedIndex].text;

            var soluong1 = $('.soluong1').val();
            var dongia1 = $('.dongia1').val();
            var e = document.getElementById("sp2");
            var name1 = e.options[e.selectedIndex].text;

            var soluong2 = $('.soluong2').val();
            var dongia2 = $('.dongia2').val();
            var e = document.getElementById("sp3");
            var name2 = e.options[e.selectedIndex].text;

            var soluong3 = $('.soluong3').val();
            var dongia3 = $('.dongia3').val();
            var e = document.getElementById("sp4");
            var name3 = e.options[e.selectedIndex].text;

            var total = Number(dongia)+ Number(dongia1) + Number(dongia2) +Number(dongia3);

            var tbody =  "<tr>" +
                            "<td id='sp'>"+ name +"</td>" +
                            "<td id='sl'>"+ soluong +"</td>" +
                            "<td id='gia'>"+ dongia +"</td>" +
                         "</tr>";   

            var tbody2 =  "<tr>" +
                            "<td id='sp'>"+ name1 +"</td>" +
                            "<td id='sl'>"+ soluong1 +"</td>" +
                            "<td id='gia'>"+ dongia1 +"</td>" +
                         "</tr>";   
                         
            var tbody3 =  "<tr>" +
                            "<td id='sp'>"+ name2 +"</td>" +
                            "<td id='sl'>"+ soluong2 +"</td>" +
                            "<td id='gia'>"+ dongia2 +"</td>" +
                         "</tr>";   

            var tbody4 =  "<tr>" +
                            "<td id='sp'>"+ name3 +"</td>" +
                            "<td id='sl'>"+ soluong3 +"</td>" +
                            "<td id='gia'>"+ dongia3 +"</td>" +
                         "</tr>";    

            var contents = {},duplicates = false;

            $("table td").each(function() {
                var tdContent = $(this).text();
                if (contents[tdContent]) {
                    duplicates = true;
                    return false;
                }
                contents[tdContent] = true;
            });    
            
            if (duplicates){
               alert("Sản phẩm đã tồn tại.");
            } else {
                if(soluong.length === 0) {
                   alert('Bạn chưa nhập đủ thông tin'); 
                   return false;
                } else {
                    $('tbody').append(tbody);
                }

                $('.total').append(total);

                if(soluong1.length === 0) {
                   return false;
                } else {
                    $('tbody').append(tbody2);
                }

                if(soluong2.length === 0) {
                   return false;
                } else {
                    $('tbody').append(tbody3);
                }

                if(soluong3.length === 0) {
                   return false;
                } else {
                    $('tbody').append(tbody4);
                }
            }
          })

          $('.detail-form #mySelect').on('change', function(){
            var option = $(this).find('option:selected');
            $('#dongia').val(option.data('price'));
          });

          $('.detail-form #sp2').on('change', function(){
            var option1 = $(this).find('option:selected');
            $('#dongia1').val(option1.data('price'));
          });

          $('.detail-form #sp3').on('change', function(){
            var option2 = $(this).find('option:selected');
            $('#dongia2').val(option2.data('price'));
          });

          $('.detail-form #sp4').on('change', function(){
            var option3 = $(this).find('option:selected');
            $('#dongia3').val(option3.data('price'));
          });
      });
    </script>
@endsection