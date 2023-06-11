<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nom' => ['required','min:3'],
            'prenom' => ['required','min:3'],
            'email' => ['email'],
            'password' => ['required','confirmed','min:8','string','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).+$/'],
            'password_confirmation' => ['required'],
            'contact' => ['required'],
        ];
    }
/*
    @return array<string, string>
    */
   public function messages(): array
   {
       return [
           'nom.required' => 'le nom doit être requis.',
           'prenom.required' => 'le prenom doit être requis',
       ];
   }
}

