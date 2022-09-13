<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class EventsRequest extends FormRequest
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
            'nome' => 'required|string|unique:events,nome',
            'descricao' => 'nullable|string',
            'schedule' => 'required|date',
            'status' => 'nullable',
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
