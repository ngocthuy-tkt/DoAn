@extends('layouts.index')

@section('page_title','Thanh toán')

@section('content')
    <div class="main">
        <!--  </div> -->
        <div class="container_fullwidth">
            <div class="container">

                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-check"></i> Thanh toán thành công!</h4> Quay lại <a href="{{route('home')}}"> Trang chủ </a>
                    {!! Session::get('success') !!}
                </div>

            </div>
        </div>
    </div>
@endsection