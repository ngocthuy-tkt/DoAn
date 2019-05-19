<!--/**
 * Created by PhpStorm.
 * User: Truong
 * Date: 8/7/2018
 * Time: 9:19 AM
 */-->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('backend/images/avatar04.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::guard('admin')->user()->fullname}}</p>
                <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree" data-animation-speed="300">
            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-navicon"></i><span>Danh mục</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('category.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{route('category.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa  fa-book"></i><span>Sản phẩm</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('products.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{route('products.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-cart-arrow-down"></i><span>Đơn hàng</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('order.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-image"></i><span>Banner</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('banner.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{route('banner.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-paint-brush"></i><span>Tác giả</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('author.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{route('author.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-institution"></i><span>Nhà xuất bản</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('publishing_house.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{route('publishing_house.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-users"></i><span>Tài khoản khách hàng</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('users.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{route('users.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-user"></i><span>Tài khoản quản trị</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('administration.index')}}"><i class="fa fa-circle-o"></i> Danh sách</a></li>
                    <li><a href="{{route('administration.create')}}"><i class="fa fa-circle-o"></i> Thêm mới</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="javascript:void(0)"><i class="fa fa-user"></i><span>Xuất- nhập hàng hóa</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('administration.index')}}"><i class="fa fa-circle-o"></i> hóa đơn bán</a></li>
                    <li><a href="{{route('administration.create')}}"><i class="fa fa-circle-o"></i> hóa đơn mua</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>