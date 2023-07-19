<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MyPageUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'string',
            'content'=>'string',
            'country'=>'string',
            'city'=>'string',
            'image' => 'image',
            'imageDelete' => 'integer',
            'gender'=>'string',
            'family_status'=>'string',
            'tags' => 'array'
        ];
    }
}
