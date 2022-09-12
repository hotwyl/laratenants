<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

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
            'tenant_id' => 'required|numeric',
            'name' => 'required|string|min:3|max:100',
            'email' => 'required|email:rfc,dns|unique:users,email',
            'password' => 'required|string|confirmed',
            'tipo' => "nullable",
            'status' => "nullable",
        ];
    }

     public function failedValidation(Validator $validator)
     {
         throw new HttpResponseException(response()->json([
             'messagem'   => 'Erro de Validação do formulário',
             'erros'      => $validator->errors()
         ]));
     }

     public function messages()
     {
         return [

         ];
     }
}
