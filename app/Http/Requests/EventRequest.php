<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
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
            'title' => 'required|min:9|max:255',
            'description' => 'required|min:30|max:255',
            'body' => 'required|min:50',
            'start_event' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Este campo não pode ser vazio',
            'min' => 'Tamanho mínimo necessário de :min caracteres',
            'max' => 'Tamanho máximo permitido de :max caracteres'
        ];
    }
}
