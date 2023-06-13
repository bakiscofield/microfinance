<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\StoreUserRequest;
class StoreEmployeRequest extends StoreUserRequest
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
            'status' => ['required'],
            'numero_service' => ['required'],

            'nom' => ['required','min:3'],
            'prenom' => ['required','min:3'],
            'email' => ['email'],
            // 'password' => ['required','confirmed','min:8','string','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*(),.?":{}|<>]).+$/'],
            // 'password_confirmation' => ['required'],
            'contact' => ['required'],
            'date_naissance' => ['required','date'],
            'profession' => ['required'],

            'pays' => ['required'],
            'ville' => ['required'],
            //'coordonnees' => ['']
        ];
    }
}
