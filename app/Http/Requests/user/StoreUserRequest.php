<?php

namespace App\Http\Requests\user;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ];
    }

    protected function passedValidation()
    {
    
        $allowedFields = array_keys($this->rules());
        $extraFields = array_diff(array_keys($this->all()), $allowedFields);

        if (!empty($extraFields)) {
            abort(400, 'Campos adicionais não são permitidos: ' . implode(', ', $extraFields));
        }
    }
}
