<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResgisterRequest extends FormRequest
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
        return [
            'HoTen' => 'required',
            'email' => 'required|email|unique:khachhang,email',
            'MatKhau' => 'required|min:4',
            'Sdt'  => 'min:9| max:11',
            'DiaChi' => 'required',
            'NgaySinh' => 'required',
            'GioiTinh' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'HoTen.required' => 'Họ tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng',
            'email.unique' => 'Email đã tồn tại',
            'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
            'MatKhau.min' => 'Mật khẩu quá ngắn',
            'Sdt.min' => 'Số điện thoại không đúng',
            'Sdt.max' => 'Số điện thoại không đúng',
            'DiaChi.required' => 'Địa chỉ không được để trống',
            'NgaySinh.required' => 'Ngày sinh không được để trống',
            'GioiTinh.required' => 'Giới tính không được để trống'
        ];
    }
}
