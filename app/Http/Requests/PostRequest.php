<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            /**
             * 21,844 é o tamanho seguro de caracteres UTF-8 que cabem em uma coluna TEXT (65,535 bytes),
             * considerando que existem caracteres que ocupam mais de 1 byte.
             */
            'title' => ['required', 'string', 'max:255'],
            'keywords' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'text' => ['required', 'string', 'max:21844'],
            'image' => ['image'],
            'postcategorie_id' => ['required', 'integer'],
        ];
    }
}
