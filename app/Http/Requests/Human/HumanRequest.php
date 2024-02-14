<?php

namespace App\Http\Requests\Human;

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
            'name' => ['required', 'string', 'max:100'],
            'surname' => ['string', 'max:100', 'nullable'],
            'lastname' => ['string', 'max:100', 'nullable'],
            'date_birth' => ['date', 'nullable'],
            'date_dead'  => ['date', 'nullable'],
            'location_birth' => ['string', 'max:550', 'nullable'],
            'nationality' => ['string', 'max:100', 'nullable'],
            'image' => ['image', 'mimes:jpg,png,jpeg', 'max:1024', 'nullable'],
            'father_id' => ['int', 'nullable'],
            'mather_id' => ['int', 'nullable'],
            'rod_id' => ['int', 'nullable'],
        ];
    }
}
