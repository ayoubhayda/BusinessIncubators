<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FloorUpdate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {

        return [
            'name' => ['required', 'string'],
            'order' => [
                'required',
                'integer',
                Rule::unique('floors')->where(function ($query){
                    return $query->where('building_id', $this->route('building')->id);
                })->ignore($this->route('floor')->id)
            ],
        ];
    }
    
     /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'order.unique' => "Le numéro d'étage déjà existant",
        ];
    }
    

}
