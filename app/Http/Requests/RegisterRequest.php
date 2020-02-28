<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function messages()
    {
      return [
      'email.required' => 'メールアドレスは入力必須です',
      'email.string' => '文字列で入力してください',
      'email.email' => 'メールアドレスを入力してください',
      'email.max' => 'メールアドレスが長すぎます',
      'email.unique' => '登録済みのメールアドレスです',
      'password.required' => 'パスワードは入力必須です',
      'password.string' => '文字列で入力してください',
      'password.min' => '8文字以上でパスワードを入力してください',
      'password.confirmed' => '確認用パスワードが一致しません',
      ];
    }
}
