<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClasseCreateRequest extends FormRequest
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
            'credit' => 'required|integer',
            'hour_lesson' => 'required|integer',
            'year' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'credit.required' => 'Crédito é necessário',
            'credit.integer' => 'Crédito tem que ser inteiro',
            'hour_lesson.required' => 'Hora é necessário',
            'hour_lesson.integer' => 'Hora tem que ser inteiro',
            'year.required' => 'Ano é necessário',
            'year.integer' => 'Ano tem que ser inteiro',
        ];
    }
}
