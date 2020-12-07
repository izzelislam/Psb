<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'name'=>'required',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|string|size:8'
        ];
    }

    public function messages()
    {
        return [
            'password.size' => ':attribute minimal 8 karakter',
            'password.required' => ':attribute wajib di isi.',
            'email.required'=>':attribute email wajib di isi'
        ];
    }
}
