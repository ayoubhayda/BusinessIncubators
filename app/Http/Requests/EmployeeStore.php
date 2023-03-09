<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStore extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'phone' => 'required', 
            'email' => 'required', 
            'biography' => 'string',
            'birth_date' => 'required',
            'cin' => ['required', 'string'],
            'image' => 'required|mimes:jpg,png,jped|max:548',
            'speciality' => ['required', 'string'],
            'position_id' => 'required'
        ];
    }
}
