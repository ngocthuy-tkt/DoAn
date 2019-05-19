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
            'name' => 'required|unique:products,name,' . $this->get('id') . ',id',
            'slug' => 'required|unique:products,slug,' . $this->get('id') . ',id',
            'price' => 'required|numeric|min:4',
            'discount_price' => 'numeric|min:0',
            'quantity' => 'required|numeric|min:0',
            'category_id' => 'required',
            'author_id' => 'required',
            'publishing_house_id' => 'required',
            'upload_product' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.unique' => 'Sản phẩm đã tồn tại',
            'slug.required' => 'Đường dẫn không được để trống',
            'slug.unique' => 'Đường dẫn đã tồn tại',
            'price.required' => 'Không được để trống giá',
            'price.numeric' => 'Giá phải là số',
            'discount_price.numeric' => 'Giá phải là số',
            'quantity.required' => 'Số lượng không được để trống',
            'quantity.numeric' => 'Số lượng phải là số',
            'upload_product.image' => 'File phải là ảnh',
            'upload_product.max' => 'Dung lượng file quá lớn',
        ];
    }
}
