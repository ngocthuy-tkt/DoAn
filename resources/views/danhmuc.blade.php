@extends('layouts.index')

@section('page_title','Danh mục ' . $cat->name)

@section('content')
    <div class="main">
        <div class="container products-list"><!-- end content -->
            @if(isset($products))
                <h2>Các sản phẩm trong danh mục {{$cat->name}}</h2>
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