<?php

namespace App\Http\Requests\Space;

use Illuminate\Foundation\Http\FormRequest;

class StoreSpaceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required','string'],
            'description' => ['nullable','string'],
            'capacity' => ['required','integer','min:1'],
            'image' => 'nullable|image|max:2048',
        ];
    }
}
