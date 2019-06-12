@extends('layouts.index')

@section('page_title',$product->TenSp)

@section('style')
<link rel="stylesheet" href="{{asset('giaodien/css/chitiet.css')}}">
@end()

@section('content')
    <!-- <div class="main">
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
                                    <span>Thêm vào giỏ hàng</span>
                                </button>
                            </div>
                        </form>            
                    </div>
                </div><!--  end main section  -->
            </div>
        <!--</div>
    </div> -->

    <div id="content" style="background: none">
			<div id="product">
				<div class="wrapper">
					<div id="dm_sanpham">
						<ul>
							<li><img src="{{ asset('giaodien/img/vay/v1.jpg') }}"/></li>
							<li><img src="{{ asset('giaodien/img/vay/v1.jpg') }}"/></li>
							<li><img src="{{ asset('giaodien/img/vay/v1.jpg') }}"/></li>
							<li><img src="{{ asset('giaodien/img/vay/v1.jpg') }}"/></li>
						</ul>
					</div>
					<div id="img_sanpham">
						<img src="{{ asset($product->AnhChinh) }}"/>
					</div>
					<!-------thông số chi tiết sản phẩm---------->
					<div id="ThongSo">
						<table>
							<tr>
								<td colspan="2" id="ten"> {{$product->TenSp}} -{{$product->MaSP}}</td>
							</tr>
							<tr>
								<td id="LuotXem"> Lượt Xem </td>
								<td>{{ $product->LuotXem }}</td>
							</tr>
							<tr>
								<td colspan="2"><label id="khuyenmai">{{ discount($product->DonGia,$product->GiaKhuyenMai) }} OFF</label></td>
							</tr>
							<tr>
								<td colspan="2" id="gia">
								@if($product->GiaKhuyenMai != 0)
								<p class="special-price-item">
									<span>Giá:</span>
									<span id="span-price">{{format_money($product->GiaKhuyenMai)}}</span>
								</p>

								<p style="" class="saleoff-price-item">
									<span class="price-label">Tiết kiệm:</span>
									<span id="span-discount-percent"
										class="discount-percent">{{ discount($product->DonGia,$product->GiaKhuyenMai) }}</span>
								</p>

								<p style="" class="old-price-item">
									<span class="price-label">Giá thị trường:</span>
									<span id="span-list-price">{{format_money($product->DonGia)}}</span>
								</p>
								@else 
								<p class="special-price-item">
									<span>Giá:</span>
									<span id="span-price">{{format_money($product->DonGia)}}</span>
								</p>    
								@endif
								</td>
							</tr>
							<!-- <tr>
								<td> Size:</td>
								<td>
									<select id="size">
										<option> S</option>
										<option> M</option>
										<option> L</option>	
									</select>
								</td>
							</tr> -->
							<tr>
								<td>MÃ:</td>
								<td>{{ $product->MaSP }}</td>
							</tr>
							<tr>
								<td>Tình Trạng</td>
								<td class="tinhtrang">
								@if($product->SoLuong == 0)
									Hết hàng 
								@else 
									Còn Hàng
								@endif
								</td>
							</tr>
							<!-- <tr>
								<td>Số Lượng</td>
								<td>
									<label class="soluong"> - </label>
									<label class="soluong">1 </label>
									<label class="soluong">+ </label>
								</td>
							</tr> -->
								<td colspan="2">
									<form action="{{ route('addToCart') }}" method="post" class="variants form-nut-grid has-validation-callback" enctype="multipart/form-data">
										{{ csrf_field() }}
										<div>
											<input type="hidden" name="Id_SanPham" value="{{ $product->Id_SanPham }}">
											<input type="hidden" name="TenSp" value="{{ $product->TenSp }}">
											<input type="hidden" name="GiaKhuyenMai" value="{{ $product->GiaKhuyenMai }}">
											<input type="hidden" name="DonGia" value="{{ $product->DonGia }}">
											<input type="hidden" name="AnhChinh" value="{{ $product->AnhChinh }}">
											<button type="submit" id="sbm" class="add2cart btn-buy btn-cart btn btn-gray left-to btn-primary add_to_cart" title="Đặt mua ngay">
												<span>Thêm vào giỏ hàng</span>
											</button>
										</div>
									</form> 
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<!--------cỡ may---------------->
			<div id="description">
				<div class="wrapper">
					<div id="tieude">
						<h3>Mô tả</h3>
					</div>
					
					<div id="chitiet_mta">	
						<ul>
							<li><b>Kiểu dáng: </b>{{ $product->TenSp }}</li>
							<li><b>Xuất xứ:</b>Việt Nam</li>
							<li><b>Chất liệu:</b>Vải Lụa Tuyết</li>
							<li><b>Màu Sắc:</b>Màu Hồng Ruốc</li>
							<li><b>Trọng lượng:</b>380g</li>
						</ul>
						
						<table id="bang" border="1px">
							<tr>
								<th>THÔNG SỐ</th>
								<th>VAI</th>
								<th>NGỰC</th>
								<th>EO</th>
								<th>MÔNG</th>
								<th>DÀI</th>
							</tr>
							<tr>
								<td>S</td>
								<td>34-35</td>
								<td>82-86</td>
								<td>68-74</td>
								<td>84-88</td>
								<td>86</td>
							</tr>
							<tr>
								<td>M</td>
								<td>35-36</td>
								<td>86-90</td>
								<td>74-80</td>
								<td>88-92</td>
								<td>88</td>
							</tr>
							<tr>
								<td>L</td>
								<td>36-37</td>
								<td>90-94</td>
								<td>80-86</td>
								<td>92-96</td>
								<td>90</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
	
		</div>
@endsection