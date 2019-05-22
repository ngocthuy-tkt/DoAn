@extends('layouts.index')

@section('page_title','Giỏ hàng của bạn')

@section('content')
    <div class="main">
        <div class="container">
            @if(empty($cart))
                <p>Giỏ hàng đang trống, tiếp tục mua sắm đi</p>
            @else
                <table id="cart" class="table table-hover table-condensed">
                    <thead>
                    <tr>
                        <th style="width:50%">Sản phẩm</th>
                        <th style="width:20%">Giá</th>
                        <th style="width:10%">Số lượng</th>
                        <th style="width:20%"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cart as $key => $item)
                        <tr>
                            <td data-th="Product">
                                <div class="row">
                                    <div class="col-sm-2 hidden-xs">
                                        <img src="{{(preg_match('/http/', $item['image'])) ? $item['image'] : asset('storage/uploads/product/' . $item['image']) }}"
                                             alt="" class="img-responsive"
                                             title="{{$item['name']}}" style="width: 100px;height: 100px">
                                    </div>
                                </div>
                            </td>
                            <td data-th="Price"> {{format_money($item['price'])}} </td>
                            <td data-th="Quantity">
                                <input type="number" class="qty-{{$item['id']}} form-control text-center"
                                       value="{{$item['qty']}}">
                            </td>
                            <td class="actions text-center">
                                <button class="btn btn-info btn-sm update-qty"
                                        data-id="{{$item['id']}}"
                                        data-url="{{route('update_cart',['id'=> $item['id'], 'qty'=>$item['qty']])}}"><i
                                            class="fa fa-refresh"></i></button>
                                <a href="{{route('remove_cart', ['id' => $item['id']])}}" class="btn btn-danger btn-sm"
                                   onclick="return confirm('Bạn có chắc muốn xóa sản phẩm khỏi giỏ hàng ?')"><i
                                            class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr style="height: 100px">
                        <td><a href="{{route('home')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp
                                tục
                                mua hàng</a></td>
                        {{--<td colspan="1" class="hidden-xs"></td>--}}
                        <td colspan="2" class="hidden-xs"><strong>Tổng: {{total_money_cart($cart)}}</strong></td>
                        <td><a href="{{route('checkout')}}" class="btn btn-success btn-block">Thanh toán <i
                                        class="fa fa-angle-right"></i></a>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            @endif
        </div>
    </div>
@endsection