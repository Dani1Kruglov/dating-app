<?php

namespace App\Http\Requests\Message;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'user_1_id'=> 'required|integer',
            'user_2_id'=> 'required|integer',
            'private_channel' =>'required|integer',
            'hash_private_channel' =>'required|string',
            'body' => 'required|string'
        ];
    }
}
