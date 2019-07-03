<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        dd($this->get('id'));
        return [
            'TenSp' => 'required|unique:sanpham,TenSp,' . $this->get('Id_SanPham') . ',Id_SanPham',
            'DonGia' => 'required|numeric|min:4',
            'SoLuong' => 'required|numeric|min:0',
            'Id_DanhMucSp' => 'required',
            'MaSP' => 'required|unique:sanpham,MaSp,' . $this->get('Id_SanPham') . ',Id_SanPham',
            'AnhChinh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'TenSp.required' => 'Tên sản phẩm không được để trống',
            'TenSp.unique' => 'Sản phẩm đã tồn tại',
            'DonGia.required' => 'Không được để trống giá',
            'DonGia.numeric' => 'Giá phải là số',
            'SoLuong.required' => 'Số lượng không được để trống',
            'SoLuong.numeric' => 'Số lượng phải là số',
            'Id_DanhMucSp.required' => 'Danh mục không được để trống',
            'MaSP.required' => 'Mã sản phẩm không được để trống',
            'MaSP.unique' => 'Mã sản phẩm đã tồn tại',
            'AnhChinh.image' => 'File phải là ảnh',
            'AnhChinh.max' => 'Dung lượng file quá lớn',
        ];
    }
}