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
        $building_id = $this->route('building')->id;

        return [
            'name' => ['required', 'string'],
            'order' => [
                'required', 'integer'
            ],
        ];    
    }
}
