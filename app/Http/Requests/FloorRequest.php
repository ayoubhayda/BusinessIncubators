<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FloorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required','string'] ,
            'order'=> ['required','integer'] ,
            'building_id'=> 'required'
        ];
    }
}
