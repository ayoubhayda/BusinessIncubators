<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class UserUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->where(function ($query) {
                $query->whereNull('deleted_at');
                })->ignore($this->user)],
            'password' => ['required', 'string', 'min:8','same:password_confirm'],
            'password_confirm'=> ['required', 'string', 'min:8','same:password'],
        ];
    }
}
