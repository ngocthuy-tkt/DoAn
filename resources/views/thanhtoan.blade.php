@extends('layouts.index')

@section('page_title','Thanh toán')

@section('content')
    <div class="main">
        <div class="container">
            <div class="row">
                <div class="row">
                    <form action="" method="post" role="form">
                        @csrf
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <h4>Thông tin khách hàng</h4>
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" class="form-control" name="TenNguoiNhan" placeholder="Họ tên" value="{{Auth::user()->name}}">
                            </div>
                            @if($errors->has('TenNguoiNhan'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('TenNguoiNhan') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Điện thoại</label>
                                <input type="text" class="form-control" name="Sdt" placeholder="Số điện thoại" value="{{Auth::user()->phone}}">
                            </div>
                            @if($errors->has('Sdt'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('Sdt') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Nhập email" value="{{Auth::user()->email}}">
                            </div>
                            @if($errors->has('email'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('email') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" name="DiaChi" placeholder="Nhập địa chỉ" value="{{Auth::user()->address}}">
                            </div>
                            @if($errors->has('DiaChi'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('DiaChi') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <textarea class="form-control" name="GhiChu" style="height: 70px;resize:none"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <h4>Phương thức thanh toán</h4>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="KieuThanhToan" checked="checked" value="1">
                                    Thanh toán tại nhà
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="KieuThanhToan" id="check" checked="checked" value="1">
                                    Chuyển khoản
                                </label>
                                <div id="show" style="display: none; margin-top: 20px;">
                                    <p>STK: 210000817775</p>
                                    <p>Chủ TK: Nguyễn Thị Ngọc Thủy</p>
                                    <p>Ngân hàng: BIDV - 191 Hai Bà Trưng, Hà Nội</p>
                                    <p>Nội dung: Mã đơn hàng + Tên người mua</p>
                                </div>
                            </div>
                            <div class="form-group"><br>
                                <label for="">Phí ship </label><br>
                                <input type="radio" name="ship" value="20"> Nội thành ( 20k )<br>
                                <input type="radio" name="ship" value="30"> Ngoại thành ( 30k )<br>
                                <input type="radio" name="ship" value="40"> Các tỉnh ( 40k )<br>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <h4>Chi tiết đơn hàng</h4>
                            @php $total = \Cart::total() - \Cart::tax(); @endphp   
                            @foreach(\Cart::content() as $item)
                                <div class="payment_content_li">
                                    <img src=""
                                         alt="{{ $item->name }}" class="img-responsive" title="{{ $item->name }}">
                                    <div class="payment_content_info">
                                        <h5>{{ $item->name }}</h5>
                                        <div class="sale-price">{{ $item->price }}</div>
                                        <p class="quantity">Số lượng: {{ $item->qty }}</p>
                                    </div>
                                </div>
                            @endforeach
                            <p>Tạm tính : <strong class="text-red">{{ \Cart::subtotal() }}</strong></p>
                            <p>Tổng tiền : <strong class="text-red">{{ $total }}</strong></p>
                            <div>
                            <button type="submit" class="btn btn-primary">Xác nhận & đặt hàng</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(document).ready(function(){
            $('#check').click(function(){
                $('#show').css('display', 'block');
            });
        });
    </script>
@stop