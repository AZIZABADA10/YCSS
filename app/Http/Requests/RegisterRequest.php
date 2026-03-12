<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
      public function rules(): array
    {
        return [
            'nom_complet' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ville' => 'nullable|string|max:255',
            'telephone' => 'nullable|string|max:20'
        ];
    }
        

    public function messages(): array
    {
        return [
            'nom_complet.required' => 'Le nom est obligatoire.',
            'nom_complet.string' => 'Le nom doit être une chaîne de caractères.',
            'nom_complet.max' => 'Le nom ne doit pas dépasser :max caractères.',
            
            'email.required' => 'L\'adresse e-mail est obligatoire.',
            'email.string' => 'L\'adresse e-mail doit être une chaîne de caractères.',
            'email.email' => 'Veuillez entrer une adresse e-mail valide.',
            'email.max' => 'L\'adresse e-mail ne doit pas dépasser :max caractères.',
            'email.unique' => 'Cette adresse e-mail est déjà utilisée.', 

            'password.required' => 'Le mot de passe est obligatoire.',
            'password.string' => 'Le mot de passe doit être une chaîne de caractères.',
            'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',

            'role_id.required' => 'Le rôle est obligatoire.',

            'photo.image' => 'Le fichier doit être une image.',
            'photo.mimes' => 'Le format de l\'image doit être JPEG, PNG, JPG, GIF ou SVG.',
            'photo.max' => 'L\'image ne doit pas dépasser 2 Mo.',

            'ville.string' => 'La ville doit être une chaîne de caractères.',
            'ville.max' => 'La ville ne doit pas dépasser :max caractères.',
            
            'telephone.string' => 'Le numéro de téléphone doit être une chaîne de caractères.',
            'telephone.max' => 'Le numéro de téléphone ne doit pas dépasser :max caractères.',
        ];
    }
}
