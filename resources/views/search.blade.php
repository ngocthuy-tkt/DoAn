@extends('layouts.index')

@section('page_title','Tìm kiếm')

@section('content')

    <div class="main">
        <div class="container products-list"><!-- end content -->
            @if(!empty($search))
                <h2>Kết quả tìm thấy có {{ count($search) }} sản phẩm</h2>
                <div class="row">
                    @foreach($search as $product)
                        @php echo view('layouts.product-item',compact('product')) @endphp
                    @endforeach
                </div>
            @else
            	Không tìm thấy sản phẩm nào    
            @endif
        </div>

    </div><!--  end main section  -->

@endsection