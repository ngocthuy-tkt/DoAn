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
            'name' => 'required',
            'email' => 'required|email|unique:khachhang,email',
            'password' => 'required|min:4',
            'phone'  => 'min:9| max:11',
            'address' => 'required',
            'birthday' => 'required',
            'gender' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Họ tên không được để trống',
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng',
            'email.unique' => 'Email đã tồn tại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu quá ngắn',
            'phone.min' => 'Số điện thoại không đúng',
            'phone.max' => 'Số điện thoại không đúng',
            'address.required' => 'Địa chỉ không được để trống',
            'birthday.required' => 'Ngày sinh không được để trống',
            'gender.required' => 'Giới tính không được để trống'
        ];
    }
}
