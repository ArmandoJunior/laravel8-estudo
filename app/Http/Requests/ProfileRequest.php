<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
        $userId = auth()->id();
        $rules = [
            'user.name' => 'required',
            'user.email' => "required|email|unique:users,email,{$userId}",
        ];

        if ($this->request->get('profile')['social_networks']['facebook']) {
            $rules['profile.social_networks.facebook'] = 'url';
        }

        if ($this->request->get('profile')['social_networks']['instagram']) {
            $rules['profile.social_networks.instagram'] = 'url';
        }

        if ($this->request->get('profile')['social_networks']['twitter']) {
            $rules['profile.social_networks.twitter'] = 'url';
        }

        if ($this->request->get('user')['password']) {
            $rules['user.password'] = 'required|string|min:8|confirmed';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => 'Campo não pode ser vazio.',
            'min' => 'Mínimo de 8 caracteres.',
            'confirmed' => 'Confirmação da senha não confere.',
            'unique' => 'Email já cadastrado.',
            'url' => 'Digite uma URL válida da sua rede social.'
        ];
    }
}
