<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => 'required|email',
            'MatKhau' => 'required | min:3 | max:40'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng',
            'MatKhau.required' => 'Bạn chưa nhập mật khẩu',
            'MatKhau.min' => 'Mật khẩu không được nhỏ hơn 3 ký tự',
            'MatKhau.max' => 'Mật khẩu không được lớn hơn 40 ký tự'
        ];
    }
}
