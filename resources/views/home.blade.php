@extends('layouts.index')

@section('page_title','Thế giới thời trang chị em')

@section('content')
<div id="content">
    <img src="giaodien/img/banner_logo.png">
    <div id="phongcach">
        <div class="wrapper">
            <h3>STYLE PHONG CÁCH</h3>
            <ul>
                <li>
                    <img src="giaodien/img/thethao.jpg"/>
                    <p> THỂ THAO</p>
                </li>
                <li>
                    <img src="giaodien/img/congso.jpg"/>
                    <p> CÔNG SỞ</p>
                </li>
                <li>
                    <img src="giaodien/img/phukien.jpg"/>
                    <p>PHỤ KIỆN</p>
                </li>
                <li>
                    <img src="giaodien/img/daopho.jpg"/>
                    <p> DẠO PHỐ</p>
                </li>
                <li>
                    <img src="giaodien/img/vaydam.jpg"/>
                    <p> VÁY ĐẦM</p>
                </li>
            </ul>
        </div>
    </div>
    <div class="product">
        <div class="wrapper">
            <div class="tieude">
                <h3>Sản Phẩm Nổi Bật</h3>
            </div>
            @foreach($products as $product)
                @php echo view('layouts.product-item',compact('product')) @endphp
            @endforeach
        </div>
    </div>

    <div id="phongcach">
        <div class="wrapper">
            <h3>KHÁCH HÀNG MẶC ĐỒ CỦA CỬA HÀNG</h3>
            <ul>
                <li>
                    <img src="giaodien/img/kh1.jpg"/>
                    <p> Chị:Nguyễn Thị Hoa</p>
                </li>
                <li>
                    <img src="giaodien/img/kh2.jpg"/>
                    <p> Chị:Nguyễn Thị Hòa</p>
                </li>
                <li>
                    <img src="giaodien/img/kh3.jpg"/>
                    <p> Chị:Nguyễn Thị Thảo</p>
                </li>
                <li>
                    <img src="giaodien/img/kh4.jpg"/>
                    <p> Chị:Nguyễn Thị Hạnh</p>
                </li>
                <li>
                    <img src="giaodien/img/kh2.jpg"/>
                    <p> Chị:Nguyễn Thị Hồng</p>
                </li>
            </ul>
        </div>
    </div>
</div>    

@endsection