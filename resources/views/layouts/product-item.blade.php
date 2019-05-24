<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
    <div class="thumbnail product-item">
        <a href="{{route('detail',['slug' => $product->TenSp, 'id' => $product->Id_SanPham])}}">
            <span class="image">
                <img src="{{ asset($product->AnhChinh) }}"
                     alt="" class="img-responsive">
            </span>
            <div class="caption">
                <h3 class="title">{{$product->TenSp}}</h3>
                <p class="price-sale">
                    @if(!empty($product->GiaKhuyenMai))
                        <span class="final-price">{{format_money($product->GiaKhuyenMai)}}</span>
                        <span class="price-regular">{{format_money($product->DonGia)}}</span>
                        <!-- <span class="sale-tag">{{ discount($product->DonGia,$product->GiaKhuyenMai) }}</span> -->
                    @else
                        <span class="final-price">{{format_money($product->DonGia)}}</span>
                    @endif
                </p>
            </div>
        </a>
    </div>
</div><!--/ product-item -->