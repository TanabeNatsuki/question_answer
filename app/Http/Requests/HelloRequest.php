<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
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
          'mail' => 'email|required',
          'username' => 'required',
          'pass' => 'required|min:7|confirmed',
          'pass_confirmation' => 'required',
        ];
    }

   public function messages()
   {
     return [
       'mail.email' => 'Eメールアドレスが必要です',
       'mail.required' => 'メールアドレスは必ず入力してください',
       'username.required' => 'ユーザーネームは必ず入力してください',
       'pass.min' => 'パスワードは7文字以上で入力してください',
       'pass.confirmed' => 'パスワードは同じものを確認用に入力してください',
       'pass.required' => 'パスワードは必ず入力してください',
       'pass_confirmation.required' => '確認用パスワードを入力してください',
     ];
   }

}
