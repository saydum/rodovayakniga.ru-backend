<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HumanRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:55',
            'f_name' => 'string|max:55|nullable',
            'o_name' => 'string|max:55|nullable',
            'gender' => 'string|max:7|nullable',
            'image' => 'image|mimes:jpg,png,jpeg|max:1024|nullable',
            'data_birth' => 'date|date_format:Y-m-d|nullable',
            'location_birth' => 'string|max:550|nullable',
            'nationality' => 'string|max:255|nullable',
            'generation' => 'int|max:16|nullable',
            'father_id' => 'int|nullable',
            'mather_id' => 'int|nullable',
            'text' => 'string|nullable',
        ];
    }
}
