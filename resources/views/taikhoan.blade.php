@extends('layouts.index')

@section('page_title','Thông tin cá nhân')

@section('content')
    <div class="main">
        <div class="container">
            <div id="content" style="background: none">
            <div class="wrapper">
                <div id="danhmuc">
                    <!-- <h3>TRANG CÁ NHÂN</h3>
                    <ul>
                        <li>Thông Tin Cá Nhân</li>
                        <li>Đơn Hàng</li>
                        <li>Tích Xu</li>
                    </ul> -->
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Thành công!</h4>
                        {!! Session::get('success') !!}
                    </div>
                @endif
                <div id="ndung">
                    <form action="{{ route('detailAccount') }}" method="post">
                        @csrf()
                        <table>
                            <tr>
                                <th colspan="2">HỒ SƠ CỦA TÔI</th>
                            </tr>
                            <tr>
                                <td>Họ Tên:</td>
                                <td><input type="text" class="text" name="name" value="{{ Auth::user()->name }}"/></td>
                            </tr>
                            <tr>
                                <td>Số điện thoại:</td>
                                <td><input type="text" class="text" name="phone" value="{{ Auth::user()->phone }}"/></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" class="text" name='email' value="{{ Auth::user()->email }}"/></td>
                            </tr>
                            <tr>
                                <td>Giới Tính:</td>
                                <td>
                                    <input type="radio" name="gender" value="0" @if(Auth::user()->gender == 0) checked @endif />Nữ
                                    <input type="radio" name="gender" value="1" @if(Auth::user()->gender == 1) checked @endif/>Nam
                                </td>
                            </tr>
                            <tr>
                                <td>Ngày Sinh:</td>
                                <td>
                                    <input type="date" class="text" name="birthday" placeholder="Ngày sinh" name="birthday" value="{{Auth::user()->birthday}}">
                                </td>
                            </tr>
                            <tr>
                                <td>Mật khẩu cũ</td>
                                <td><input type="password" class="text" readonly placeholder="*******" /></td>
                            </tr>
                            <tr>
                                <td>Mật khẩu mới</td>
                                <td><input type="password" class="text" name="password" placeholder="Mật khẩu mới" /></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" value="Cập Nhật" class="luu"/></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection()