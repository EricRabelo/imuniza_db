<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class AuthRequest extends FormRequest
{

    /** Overriding reposta de validação falha
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return
            [
                'email' => 'required|email',
                'password' => 'required',
            ];
    }

    /**
     * @return string[]
     */
    public function messages(): array
    {
        return
            [
                'email.required' => 'E-mail é obrigatório',
                'email.email' => 'Formato inválido',
                'password.required' => 'Senha é obrigatória'
            ];
    }
}
