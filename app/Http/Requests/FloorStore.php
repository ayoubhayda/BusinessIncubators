<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FloorStore extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $floor_id = $this->route('floor')->id ?? null;
        $building_id = $this->route('building')->id ?? null;
    
        return [
            'name' => ['required', 'string', 'max:255'],
            'order' => [
                'required', 'integer',
                Rule::unique('floors', 'order')
                    ->where(function ($query) use ($building_id, $floor_id) {
                        $query->where('building_id', $building_id);
                        if ($floor_id) {
                            $query->where('id', '<>', $floor_id);
                        }
                    }),
            ],
        ];
    }
    
}
