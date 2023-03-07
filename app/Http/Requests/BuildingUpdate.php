<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    
    public function rules(): array
    {
        return [
            'name'=>['required','string'],
            'phone'=>'required',
            'city_id'=>'required',
            'user_id'=>'required',
            'logo'=>'mimes:jpg,png,jped|max:548',
            'address'=>['required','string', 'max:600'],
        ];
    }
}
