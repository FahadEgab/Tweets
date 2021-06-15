<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' =>'required|max:50|unique:users',
            'email' =>'required|max:50|unique:users|email',
            'password' =>'required|min:5',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'هذا الحقل إجباري',
            'name.max' => 'يجب ان تكون عدد الاحرف اقل من 50',
            'name.unique' => 'مستخدم من قبل',
            'email.required' => 'هذا الحقل إجباري',
            'email.email' => 'يجب ان يكون البريد المدخل صحيح',
            'email.max' => 'يجب ان تكون عدد الاحرف اقل من 50',
            'email.unique' => 'مستخدم من قبل',
            'password.required' => 'هذا الحقل إجباري',
            'password.min' => 'يجب ان تكون عدد الاحرف اكثر من 5',

        ];
    }
}
