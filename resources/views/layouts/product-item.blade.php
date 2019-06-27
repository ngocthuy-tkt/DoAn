<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
    <div class="ds_sanpham">
        <ul style="list-style: none">
            <li>
                <a href="{{route('detail',['slug' => $product->TenSp, 'id' => $product->Id_SanPham])}}">
                    <img  src="{{ asset($product->AnhChinh) }}" alt="{{$product->TenSp}}" class="img-responsive"/>
                    @if(!empty($product->GiaKhuyenMai))
                    <label class="khuyenmai">GIẢM <span class="sale-tag">{{ discount($product->DonGia,$product->GiaKhuyenMai) }}</span></label>
                    @endif
                    <h4> {{$product->TenSp}}</h4>
                    @if(!empty($product->GiaKhuyenMai))
                        <span class="final-price gia">{{format_money($product->GiaKhuyenMai)}}</span>
                        <span class="price-regular">{{format_money($product->DonGia)}}</span>
                    @else
                        <span class="final-price gia">{{format_money($product->DonGia)}}</span>
                    @endif
                </a>
            </li>
        </ul>
    </div>
</div><!--/ product-item -->