<?php

namespace App\Http\Requests\Appointment;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class AppointmentRequest extends FormRequest
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
            'start_hour' => ['required', 'date_format:H:i'],
            'end_hour' => ['required', 'date_format:H:i'],
            'lunch_start_time' => ['nullable', 'date_format:H:i'],
            'lunch_end_time' => ['nullable', 'date_format:H:i'],
            'saturday_end_hour' => ['nullable', 'date_format:H:i'],
            'consultation_duration' => ['required', 'integer'],
            'interval_duration' => ['required', 'integer'],
        ];
    }
}
