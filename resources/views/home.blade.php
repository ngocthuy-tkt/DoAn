@extends('layouts.index')

@section('page_title','Thế giới thời trang chị em')

@section('content')
<img src="giaodien/img/banner_logo.png">
    <div class="banner">
        @if(isset($banners))
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    @foreach($banners as $key => $ban)
                        <li data-target="#myCarousel" data-slide-to="{{$key}}"
                            class="{{($key == 0) ? 'active' : ''}}"></li>
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @foreach($banners as $key => $ban)
                        <div class="item {{($key == 0) ? 'active' : ''}}">
                            <a href="{{$ban->link}}" title="{{$ban->title}}">
                                <img src="{{(preg_match('/http/', $ban->image)) ? $ban->image : asset('storage/uploads/user/' . $ban->image) }}"
                                     class="img-responsive" title="{{$ban->title}}">
                            </a>
                        </div>
                    @endforeach
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                    <span class="fa fa-angle-left fa-2x"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                    <span class="fa fa-angle-right fa-2x"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        @endif

        
    </div><!--  end banner section  -->
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
                    <p> Chị:Nguyễn Thị Hoa</p>
                </li>
                <li>
                    <img src="giaodien/img/kh3.jpg"/>
                    <p> Chị:Nguyễn Thị Hoa</p>
                </li>
                <li>
                    <img src="giaodien/img/kh4.jpg"/>
                    <p> Chị:Nguyễn Thị Hoa</p>
                </li>
                <li>
                    <img src="giaodien/img/kh2.jpg"/>
                    <p> Chị:Nguyễn Thị Hoa</p>
                </li>
            </ul>
        </div>
    </div>

@endsection