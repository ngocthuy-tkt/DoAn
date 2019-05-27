<?php

namespace App\Http\Controllers\Backend;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use Auth;

class OrderController extends BackendController
{
    public function index()
    {
        $orders = Order::get();
        $columns = [
            'ID', 'Tên khách hàng', 'Số điện thoại', 'Địa chỉ', 'Tổng tiền', 'Trạng thái' , 'Hành động'
        ];
        $orderSucc = DB::table('donhang')->where('TrangThai', '=' , 2)->get();
        $orderCan = DB::table('donhang')->where('TrangThai', '=' , -1)->get();
        return view('backend.order.index', compact('orders', 'columns', 'orderSucc', 'orderCan'));
    }

    public function edit($id)
    {
    	$editOrder = DB::table('donhang')
    		->where('Id_HoaDonBan', '=', $id)
            ->select('donhang.*')
            ->first();   
        return view('backend.order.edit', compact('editOrder'));    
    }

    public function update(Request $request, $id)
    {
    	$orders = Order::find($id);
    	$id = Auth::guard('admin')->user()->Id_NhanVien;
    	$data = [
    		'Id_NhanVien' => $id,
    		'TrangThai' => $request->TrangThai
    	];

    	try {
            if($orders->update($data)) {
                return redirect()->back()->with('success','Cập nhập thành công');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error','Sửa thất bại, vui lòng thử lại');
        }
    }
}
