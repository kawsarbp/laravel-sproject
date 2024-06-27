<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

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
        // return $this->user() instanceof User;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|min:4|max:20',
            'last_name' => 'required|string|min:4|max:12',
            'email' => 'required|email',
            'password' => 'required|min:4|same:confirm_password'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'This Email Field is Required!'
        ];
    }
}
