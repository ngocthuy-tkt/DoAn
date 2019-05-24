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
                        <form action="{{ route('addToCart') }}" method="post" class="variants form-nut-grid has-validation-callback" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div>
                                <input type="hidden" name="Id_SanPham" value="{{ $product->Id_SanPham }}">
                                <input type="hidden" name="TenSp" value="{{ $product->TenSp }}">
                                <input type="hidden" name="GiaKhuyenMai" value="{{ $product->GiaKhuyenMai }}">
                                <input type="hidden" name="DonGia" value="{{ $product->DonGia }}">
                                <input type="hidden" name="AnhChinh" value="{{ $product->AnhChinh }}">
                                <button type="submit" class="add2cart btn-buy btn-cart btn btn-gray left-to btn-primary add_to_cart" title="Đặt mua ngay">
                                    <span>Đặt mua ngay</span>
                                </button>
                            </div>
                        </form>            
                    </div>
                </div><!--  end main section  -->
            </div>
        </div>
    </div>
@endsection