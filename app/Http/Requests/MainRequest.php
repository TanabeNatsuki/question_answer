<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MainRequest extends FormRequest
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
          'name' => 'required|string',
        ];
    }

    public function messages()
    {
      return [
        'name.required' => 'ユーザーネームは入力必須です',
        'name.string' => '文字列でユーザーネームを登録してください',
      ];
    }

}
