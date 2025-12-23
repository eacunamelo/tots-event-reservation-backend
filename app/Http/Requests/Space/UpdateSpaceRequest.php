<?php

namespace App\Http\Requests\Space;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSpaceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes','required','string'],
            'description' => ['nullable','string'],
            'capacity' => ['sometimes','required','integer','min:1'],
            'image' => 'sometimes|nullable|image|max:2048',
        ];
    }
}
