<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
    <div class="thumbnail product-item">
        <a href="{{route('detail',['slug' => $product->slug, 'id' => $product->id])}}">
            <span class="image">
                <img src="{{(preg_match('/http/', $product->image)) ? $product->image : asset('storage/uploads/user/' . $product->image) }}"
                     alt="" class="img-responsive">
            </span>
            <div class="caption">
                <h3 class="title">{{$product->name}}</h3>
                <p class="author">{{$product->author->name}}</p>
                <p class="price-sale">
                    @if($product->discount_price != 0)
                        <span class="final-price">{{format_money($product->price)}}</span>
                        <span class="price-regular">{{format_money($product->discount_price)}}</span>
                        <span class="sale-tag">{{ discount($product->price,$product->discount_price) }}</span>
                    @else
                        <span class="final-price">{{format_money($product->price)}}</span>
                    @endif
                </p>
            </div>
        </a>
    </div>
</div><!--/ product-item -->