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
                                <input type="text" class="form-control" name="name" placeholder="Họ tên" value="{{Auth::user()->name}}">
                            </div>
                            @if($errors->has('name'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('name') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Điện thoại</label>
                                <input type="text" class="form-control" name="phone" placeholder="Số điện thoại" value="{{Auth::user()->phone}}">
                            </div>
                            @if($errors->has('phone'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('phone') !!}
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
                                <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ" value="{{Auth::user()->address}}">
                            </div>
                            @if($errors->has('address'))
                                <div class="help-block text-red">
                                    * {!! $errors->first('address') !!}
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="">Ghi chú</label>
                                <textarea class="form-control" name="note" style="height: 70px;resize:none"></textarea>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <h4>Phương thức thanh toán</h4>
                            <div class="radio">
                                <label>
                                    <input type="checkbox" name="payment_type" checked="checked" value="1">
                                    Thanh toán tại nhà
                                </label>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                            <h4>Chi tiết đơn hàng</h4>
                            @foreach($products_cart as $item)
                                <div class="payment_content_li">
                                    <img src="{{(preg_match('/http/', $item['image'])) ? $item['image'] : asset('storage/uploads/product/' . $item['image']) }}"
                                         alt="" class="img-responsive" title="{{$item['name']}}">
                                    <div class="payment_content_info">
                                        <h5>{{$item['name']}}</h5>
                                        <div class="sale-price">{{format_money($item['price'])}}</div>
                                        <p class="quantity">Số lượng: {{$item['qty']}}</p>
                                    </div>
                                </div>
                            @endforeach
                            <p>Tổng tiền : <strong class="text-red">{{total_money_cart($products_cart)}}</strong></p>
                            <input type="hidden" value="{{total_money_order($products_cart)}}" name="total_money_order">
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