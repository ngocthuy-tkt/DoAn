@extends('layouts.index')

@section('page_title','Giỏ hàng của bạn')

@section('content')
    <div class="main">
        @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Thành công!</h4>
                    {!! Session::get('success') !!}
                </div>
        @endif
        @if(\Cart::count() > 0)
        <div class="container">
            <table id="cart" class="table table-hover table-condensed">
                <thead>
                <tr>
                    <th style="width:50%">Sản phẩm</th>
                    <th style="width:10%">Tên sản phẩm</th>
                    <th style="width:10%">Giá</th>
                    <th style="width:10%">Số lượng</th>
                    <th style="width:20%"></th>
                </tr>
                </thead>
                <tbody>
                @foreach(\Cart::content() as $item)
                    <tr>
                        <td>
                            <div class="row">
                                <div class="col-sm-2 hidden-xs">
                                    <img src=""
                                        alt="{{ $item->AnhChinh }}" class="img-responsive"
                                        title="{{ $item->name }}" style="width: 100px;height: 100px">
                                </div>
                            </div>
                        </td>
                        <td> {{ $item->name }} </td>
                        <td> {{$item->subtotal}} </td>
                        <td>
                            <select class="quantity" data-id="{{ $item->rowId }}">
                                @for($i=1; $i<=100; $i++)
                                    <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>
                                @endfor
                            </select>
                        </td>
                        <td class="actions text-center">
                            <form action="{{ route('cart.destroy', $item->rowId ) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm btn-item-delete remove-item-cart" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm khỏi giỏ hàng ?')">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>            
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr style="height: 100px">
                    <td><a href="{{route('home')}}" class="btn btn-warning"><i class="fa fa-angle-left"></i> Tiếp tục mua hàng</a></td>
                    <td colspan="2" class="hidden-xs"><strong>Tổng: {{ \Cart::total() }}</strong></td>
                    <td><a href="{{route('checkout')}}" class="btn btn-success btn-block">Thanh toán <i class="fa fa-angle-right"></i></a>
                    </td>
                </tr>
                </tfoot>
            </table>
        </div>
        @else 
            Giỏ hàng trống
        @endif
    </div>
@endsection()

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        (function(){
            const classname = document.querySelectorAll('.quantity');
            Array.from(classname).forEach(function(element){
               element.addEventListener('change', function (){
                   const id = element.getAttribute('data-id');
                   axios.patch(`gio-hang/${id}`, {
                       quantity: this.value
                   })
                   .then(function (response) {
                       // console.log(response);
                        window.location.href='{{ route('cart') }}';
                   })
                   .catch(function (error) {
                       console.log(error);
                       window.location.href='{{ route('cart') }}';
                   })
               });
            });
        })();
    </script>
@stop