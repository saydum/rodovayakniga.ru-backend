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
            'data_birth' => 'date|date_format:d-m-Y|nullable',
            'location_birth' => 'string|max:550|nullable',
            'height' => 'int|min:60|max:500|nullable',
            'eye_color' => 'string|max:55|nullable',
            'hair_color' => 'string|max:55|nullable',
            'nationality' => 'string|max:255|nullable',
            'generation' => 'int|min:1|max:16|nullable',
            'rod_id' => 'int|nullable',
            'father_id' => 'int|nullable',
            'mother_id' => 'int|nullable',
        ];
    }
}
