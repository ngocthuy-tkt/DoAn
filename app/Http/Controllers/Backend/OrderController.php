<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends BackendController
{
    public function index()
    {
        $orders = Order::get();
        $columns = [
            'ID', 'Tên khách hàng', 'Số điện thoại', 'Địa chỉ', 'Tổng tiền', 'Trạng thái' , 'Hành động'
        ];
        return view('backend.order.index', compact('orders', 'columns'));
    }
}
