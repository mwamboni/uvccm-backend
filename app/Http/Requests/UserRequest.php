<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'branch' => 'required|integer',
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email,'. $this->user_id .',id',
            'password' => 'required_if:user_id,null|string',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'branch.required' => 'Branch is required',
            'name.required' => 'Full name is required',
            'email.required' => 'Email is required',
            'password.required_if' => 'Password is required',
        ];
    }
}
