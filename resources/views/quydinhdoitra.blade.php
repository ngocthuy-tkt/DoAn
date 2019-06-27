@extends('layouts.index')

@section('page_title','Quy định đổi trả')

@section('style')
<style>
	ul {
		list-style: none;
	}
</style>
@stop

@section('content')
<div class="container">
   <div class="row">
   	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8">
   		<h2>Quy định đổi trả hàng</h2>
   		<div class="accordion-ho-tro">
			<div class="accordion-item">
				<h3 class="accordion-title">I. QUY ĐỊNH ĐỔI HÀNG ONLINE</h3>
				<div class="accordion-content">
					<div class="accordion-item">
						<h3 class="accordion-title">1. CHÍNH SÁCH ÁP DỤNG</h3>
						<div class="accordion-content">
							<ul>
								<li>Áp dụng 01 lần đổi/01 đơn hàng</li>
								<li>Không áp dụng đổi với sản phẩm phụ kiện và đồ lót</li>
								<li>Sản phẩm nguyên giá bạn được đổi sang các sản phẩm khác còn hàng tại website</li>
								<li>Sản phẩm giảm giá được đổi màu/size (nếu còn hàng) hoặc theo quy chế từng chương trình (nếu có) - Không hỗ trợ đổi sang sản phẩm khác</li>
							</ul>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-title">2. ĐiỀU KiỆN ĐỔI SẢN PHẨM</h3>
						<div class="accordion-content">
							<ul>
								<li>Đổi hàng trong vòng 15 ngày kể từ ngày khách hàng nhận được sản phẩm</li>
								<li>Sản phẩm còn nguyên tem, mác và chưa qua sử dụng.</li>
							</ul>
						</div>
					</div>

					<div class="accordion-item">
						<h3 class="accordion-title">3. THỰC HiỆN ĐỔI SẢN PHẨM</h3>
						<div class="accordion-content">
							<p>Bước 1: Gọi đến Tổng đài 1800.6061 - nhánh 1 (0đ), cung cấp mã đơn hàng và mã sản phẩm cần đổi</p>
							<p>Bước 2: Gửi hàng về địa chỉ 69 Cô lô nhuê, phường Đức Thắng, quận Bắc Từ Liêm, TP. Hà Nội.</p>
							<p>Bước 3: CANIFA gửi đổi sản phẩm mới khi nhận được hàng. Trong trường hợp hết hàng, CANIFA sẽ liên hệ xác nhận</p>
							<p>Lưu ý</p>
							<ul>
								<li>Đơn hàng đổi thuộc 6 quận nội thành Hà Nội (Cầu Giấy, Ba Đình, Đống Đa, Hoàn Kiếm, Hai Bà Trưng, Thanh Xuân), CANIFA hỗ trợ giao hàng đổi đến địa chỉ đơn hàng và nhận lại sản phẩm Khách hàng cần đổi</li>
								<li><b>Ngoài 6 quận trên khách gửi hàng về kho chịu phí vận chuyển, shop chịu chiều đi cho khách</b></li>
								<li>Đơn hàng không thuộc địa chỉ trên, Khách hàng vui lòng gửi hàng về Kho Online theo hướng dẫn</li>
								<li>Thời gian nhận hàng: Sáng 08h30-12h, Chiều 13h-17h từ thứ 2 – thứ 6</li>
								<li>Kho online không nhận giữ hàng trong thời gian khách hàng gửi sản phẩm về đổi hàng</li>
							</ul>
						</div>
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h3 class="accordion-title">II. QUY ĐỊNH TRẢ HÀNG ONLINE</h3>
				<div class="accordion-content">
					<div class="accordion-item">
						<h3 class="accordion-title">1. CHÍNH SÁCH ÁP DỤNG</h3>
						<div class="accordion-content">
							<ul>
								<li>CANIFA nhận lại sản phẩm trong trường hợp lỗi phát sinh từ nhà sản xuất</li>
								<li>Các trường hợp lỗi do nhà sản xuất gồm: <span style="color: red;">ố màu, phai màu, lỗi chất liệu, lỗi đường may, lỗi kiểu dáng… không theo đúng mô tả và tiêu chuẩn sản phẩm</span></li>
								<li>Hoàn tiền lại sản phẩm gặp lỗi qua tài khoản ngân hàng.</li>
								<li>CANIFA miễn phí 100% chi phí trả hàng.</li>
								<li>CANIFA sẽ xử lý trong vòng 10 ngày kể từ ngày nhận được sản phẩm lỗi</li>
							</ul>
						</div>
					</div>
					<div class="accordion-item">
						<h3 class="accordion-title">2. ĐiỀU KiỆN TRẢ SẢN PHẨM</h3>
						<div class="accordion-content">
							<ul>
								<li>Trả sản phẩm trong vòng 15 ngày kể từ ngày bạn nhận sản phẩm.</li>
								<li>Sản phẩm còn nguyên tem, mác và chưa qua sử dụng.</li>
							</ul>
						</div>
					</div>

					<div class="accordion-item">
						<h3 class="accordion-title">3. THỰC HiỆN TRẢ SẢN PHẨM</h3>
						<div class="accordion-content">
							<p>Bước 1: Gửi thông tin mã đơn hàng và tình trạng gặp lỗi vào địa chỉ mail saleonline@canifa.com</p>
							<p>Bước 2: Gửi sản phẩm lỗi về địa chỉ: <b>Tầng 2, số 335 Cầu Giấy, phường Quan Hoa, quận Cầu Giấy, Hà Nội</b></p>
						</div>
					</div>
				</div>
			</div>

			<div class="accordion-item">
				<h3 class="accordion-title">III. QUY ĐỊNH ĐỔI SẢN PHẨM MUA TẠI CỬA HÀNG</h3>
				<div class="accordion-content">
					<p>Bạn có thể đổi sản phẩm trong vòng 15 ngày kể từ ngày mua sản phẩm.</p>
					<p>Chính sách chỉ áp dụng đổi sản phẩm nguyên giá và chỉ được đổi 01 lần duy nhất. Chính sách chỉ áp dụng khi sản phẩm còn hóa đơn mua hàng, còn nguyên nhãn mác, thẻ bài đính kèm sản phẩm và sản phẩm không bị dơ bẩn, hư hỏng bởi những tác nhân bên ngoài cửa hàng sau khi mua sản phẩm.</p>
					<p>Chính sách không áp dụng đối với sản phẩm giảm giá hoặc đổi từ sản phẩm nguyên giá sang sản phẩm giảm giá, hoặc sản phẩm đang trong chương trình ưu đãi khác. Chính sách không áp dụng đối với sản phẩm đồ lót và phụ kiện (trừ khăn len và mũ len).</p>
					<p>Sản phẩm mua tại cửa hàng được đổi tại cửa hàng khác trên toàn hệ thống.</p>
					<p>Mọi thắc mắc về quy định chung tại cửa hàng vui lòng liên hệ hotline: 1800.6061 (nhánh số 2) hoặc email: chamsockhachhang@canifa.com</p>
				</div>
			</div>
			</div>
   	</div>
   </div>
</div>    

@endsection