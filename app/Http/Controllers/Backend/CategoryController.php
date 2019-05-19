<?php

namespace App\Http\Controllers\Backend;

use App\Models\DanhMucSp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends BackendController
{

    public function index()
    {
        $categories = DanhMucSp::all();
        $categories = $this->categoryRepository->all();
        $columns = [
            'ID', 'Tiêu đề', 'mô tả','Slug', 'Id_NhomSp_Cha', 'trạng thái', 'Hành động'
        ];
        return view('backend.category.index', compact('categories', 'columns'));
    }

    public function create()
    {
        $categories = $this->categoryRepository->all();
        return view('backend.category.add', compact('categories'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'TieuDe' => 'required|unique:categories,TieuDe',
            'Slug' => 'required|unique:categories,Slug',
        ], [
            'TieuDe.required' => 'Tên danh mục không được để trống',
            'TieuDe.unique' => 'Tên danh mục đã tồn tại',
            'Slug.required' => 'Slug danh mục không được để trống',
            'Slug.unique' => 'Slug danh mục đã tồn tại',
        ]);
        $request->offsetunset('_token');
        if (DanhMucSp::create($request->all())) {
            return redirect()->back()->with('success', 'Thêm mới danh mục thành công');
        } else {
            return redirect()->back()->with('error', 'Thêm mới thất bại, vui lòng thử lại');
        }

    }

    public function edit($id)
    {
        $cat = $this->categoryRepository->findById($id);
        $categories = $this->categoryRepository->allNotMyChild($id);
        return view('backend.category.edit', compact('cat', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $cat = $this->categoryRepository->findById($id);
        $this->validate($request, [
            'TieuDe' => 'required|unique:categories,TieuDe,' . $cat->id . ',Id_DanhMucSp',
            'Slug' => 'required|unique:categories,Slug,' . $cat->id . ',Id_DanhMucSp',
        ], [
            'TieuDe.required' => 'Tên danh mục không được để trống',
            'TieuDe.unique' => 'Tên danh mục đã tồn tại',
            'Slug.required' => 'Slug danh mục không được để trống',
            'Slug.unique' => 'Slug danh mục đã tồn tại',
        ]);
        $request->offsetunset('_token');
        $cat->TieuDe = $request->TieuDe;
        $cat->MoTa = $request->MoTa;
        $cat->Slug = $request->Slug;
        $cat->Id_NhomSp_Cha = $request->Id_NhomSp_Cha;
        $cat->TrangThai = $request->TrangThai;
        $check = $cat->save();
        if ($check) {
            return redirect()->route('category.index')->with('success', 'Sửa thành công');
        } else {
            return redirect()->back()->with('error', 'Sửa thất bại, vui lòng thử lại');
        }
    }

    public function destroy($id)
    {
        $cat = $this->categoryRepository->findById($id);
        if ($cat->child()->count() == 0 && $cat->product()->count() == 0) {
            if ($cat->delete()) {
                return redirect()->back()->with('success', 'Xóa thành công');
            } else {
                return redirect()->back()->with('error', 'Xóa không thành công');
            }
        }
        return redirect()->back()->with('error', 'Xóa thất bại');
    }
}
