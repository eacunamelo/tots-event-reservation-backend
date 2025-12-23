<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class UpdateReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event_name' => ['sometimes','required','string'],
            'start_time' => ['sometimes','required','date'],
            'end_time' => ['sometimes','required','date','after:start_time'],
        ];
    }
}
