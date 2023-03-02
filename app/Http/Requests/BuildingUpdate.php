<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuildingUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required',
            'phone'=>'required',
            'city_id'=>'required',
            'logo'=>'required|mimes:jpg,png,jped|max:548',
            'address'=>'required',
        ];
    }
}
