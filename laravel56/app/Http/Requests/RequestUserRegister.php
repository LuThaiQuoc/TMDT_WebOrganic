<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestUserRegister extends FormRequest
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
            'email' => 'required|unique:users,email'.$this->id,
            'address' => 'required',
            'password' => 'required|min:6',
            'phone' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên',
            'email.required'=>'Vui lòng đúng định dạng',
            'email.unique'=>'Email đã được sử dụng',
            'address.required'=>'Vui lòng địa chỉ liên hệ',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 6 kí tự',
            'phone.required'=>'Vui lòng nhập số điện thoại',
        ];
    }
}
