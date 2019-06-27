@extends('layouts.index')

@section('page_title','Lịch sử mua hàng')

@section('content')
    <div class="main">
        <div class="container">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:10%">Mã đơn hàng</th>
                    <th style="width:50%">Sản phẩm</th>
                    <th style="width:10%">Số lượng</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:10%">Ngày đặt</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lichSuMua as $item)
                    <tr>
                        <td>
                           #OD00-{{ $item->Id_DonHang }}
                        </td>
                        <td>
                           {{ $item->TenSp }}
                        </td>
                        <td> {{ $item->SoLuong }} </td>
                        <td> 
                            @if($item->GiaKhuyenMai ==0)
                               {!!number_format($item->DonGia)!!}đ
                            @else
                               {!!number_format($item->GiaKhuyenMai)!!}đ
                            @endif
                        </td>
                        <td>
                            {{\Carbon\Carbon::parse($item->NgayTao)->format('d-m-Y')}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                
                </tfoot>
            </table>
        </div>
    </div>
@endsection()