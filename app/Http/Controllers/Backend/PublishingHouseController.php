<?php

namespace App\Http\Controllers\Backend;

use App\Models\PublishingHouse;
use Illuminate\Http\Request;

class PublishingHouseController extends BackendController
{
    public function index()
    {
        $pubs = $this->publishingHouseRepository->all();
        $columns = [
            'ID', 'Tên nhà xuất bản', 'Sản phẩm có trong shop', 'Active', 'Hành động'
        ];
        return view('backend.publishing_house.index', compact('pubs', 'columns'));
    }

    public function create()
    {
        return view('backend.publishing_house.add');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5|unique:publishing_house,name',
        ], [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.min' => 'Tên quá ngắn',
        ]);
        $request->offsetunset('_token');
        if (PublishingHouse::create($request->all())) {
            return redirect()->back()->with('success', 'Thêm mới danh mục thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm mới thất bại, vui lòng thử lại');
        }
    }

    public function edit($id)
    {
        $pub = $this->publishingHouseRepository->findById($id);
        return view('backend.publishing_house.edit', compact('pub'));
    }

    public function update(Request $request, $id)
    {
        $pub = $this->publishingHouseRepository->findById($id);
        $this->validate($request, [
            'name' => 'required|min:5|unique:publishing_house,name,' . $pub->id . 'id',
        ], [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã tồn tại',
            'name.min' => 'Tên quá ngắn',
        ]);
        $request->offsetunset('_token');
        $pub->name = $request->name;
        $pub->active = $request->active;
        $check = $pub->save();
        if ($check) {
            return redirect()->route('publishing_house.index')->with('success', 'Sửa thông tin nhà xuất bản thành công');
        } else {
            return redirect()->back()->with('error', 'Sửa thất bại, vui lòng thử lại');
        }
    }

    public function destroy($id)
    {
        $pub = $this->publishingHouseRepository->findById($id);
        if ($pub->product()->count() == 0) {
            if ($pub->delete()) {
                return redirect()->back()->with('success', 'Xóa thành công');
            } else {
                return redirect()->back()->with('error', 'Xóa không thành công');
            }
        }
        return redirect()->back()->with('error', 'Xóa thất bại');
    }
}
