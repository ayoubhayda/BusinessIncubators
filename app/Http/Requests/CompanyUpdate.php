<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyUpdate extends FormRequest
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
            'stage'=> ['required', 'string'],
            'type'=> ['required', 'string'],
            'logo' => 'mimes:jpg,png,jped|max:548',    
            'meta_description'=> ['required', 'string'],    
            'description'=> ['required', 'string'], 
            'founded_at'=> 'required',  
            'slogan'=>  ['nullable'],  
            'address'=> ['required', 'string'], 
            'email'=> 'required',   
            'phone'=> 'required',   
            'website'=>  ['nullable'], 
            'facebook'=>  ['nullable'],    
            'instagram'=>  ['nullable'],   
            'linkedin'=>  ['nullable'],    
            'youtube'=>  ['nullable'], 
            'twitter'=>  ['nullable'],
            'video' => ['nullable'],  
            'visibility' => ['required'], 
            'domain_id'=>'required'
        ];
    }
}
