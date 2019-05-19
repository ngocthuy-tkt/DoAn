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
                            <img src="{{(preg_match('/http/', $product->image)) ? $product->image : asset('storage/uploads/product/' . $product->image) }}"
                                 alt="" class="img-responsive"
                                 title="{{$product->name}}" style="margin: auto">
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <h5 class="name">
                            {{$product->name}}
                        </h5>

                        <p>
                            Tác giả:
                            <span class=" light-red">
                                {{$product->author->name}}
                            </span>
                        </p>
                        <hr class="border">
                        <div class="price-block show-border">
                            @if($product->discount_price != 0)
                                <p class="special-price-item">
                                    <span>Giá:</span>
                                    <span id="span-price">{{format_money($product->price)}}</span>
                                </p>

                                <p style="" class="saleoff-price-item">
                                    <span class="price-label">Tiết kiệm:</span>
                                    <span id="span-discount-percent"
                                          class="discount-percent">{{ discount($product->price,$product->discount_price) }}</span>
                                </p>

                                <p style="" class="old-price-item">
                                    <span class="price-label">Giá thị trường:</span>
                                    <span id="span-list-price">{{format_money($product->discount_price)}}</span>
                                </p>
                            @else
                                <p class="special-price-item">
                                    <span>Giá:</span>
                                    <span id="span-price">{{format_money($product->price)}}</span>
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