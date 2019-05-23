@extends('layouts.index')

@section('page_title','Trang chủ')

@section('content')
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

    <div class="main">
        <div class="container products-list"><!-- end content -->
            @if(isset($products))
                <h2>Sản phẩm hot</h2>
                <div class="row">
                    @foreach($products as $product)
                        @php echo view('layouts.product-item',compact('product')) @endphp
                    @endforeach
                </div>
            @endif
            <div class="clearfix center-block max-width-content">
                {{$products->links()}}
            </div>
        </div>

    </div><!--  end main section  -->

@endsection