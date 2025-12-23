<?php

namespace App\Http\Requests\Reservation;

use Illuminate\Foundation\Http\FormRequest;

class StoreReservationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'space_id' => ['required','exists:spaces,id'],
            'event_name' => ['required','string'],
            'start_time' => ['required','date'],
            'end_time' => ['required','date','after:start_time'],
        ];
    }
}
