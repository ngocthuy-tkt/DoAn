@extends('layouts.index')

@section('page_title',$product->name)

@section('content')
    <div class="main">
        <!--  </div> -->
        <div class="container_fullwidth">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="products-details">
                            <img src="{{ asset($product->AnhChinh) }}"
                                 alt="" class="img-responsive"
                                 title="{{$product->TenSp}}" style="margin: auto">
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <h5 class="name">
                            {{$product->TenSp}}
                        </h5>

                        
                        <hr class="border">
                        <div class="price-block show-border">
                            @if($product->GiaKhuyenMai != 0)
                                <p class="special-price-item">
                                    <span>Giá:</span>
                                    <span id="span-price">{{format_money($product->DonGia)}}</span>
                                </p>

                                <p style="" class="saleoff-price-item">
                                    <span class="price-label">Tiết kiệm:</span>
                                    <span id="span-discount-percent"
                                          class="discount-percent">{{ discount($product->DonGia,$product->GiaKhuyenMai) }}</span>
                                </p>

                                <p style="" class="old-price-item">
                                    <span class="price-label">Giá thị trường:</span>
                                    <span id="span-list-price">{{format_money($product->GiaKhuyenMai)}}</span>
                                </p>
                            @else
                                <p class="special-price-item">
                                    <span>Giá:</span>
                                    <span id="span-price">{{format_money($product->DonGia)}}</span>
                                </p>
                            @endif
                        </div>
                        <a href="{{route('add_cart',['id'=>$product->id])}}" class="btn btn-warning"><i
                                    class="fa fa-cart-plus"></i> Đặt mua ngay</a>
                    </div>
                </div><!--  end main section  -->
            </div>
        </div>
    </div>
@endsection