<?php

namespace App\Http\Requests\Presence;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'user_id' => ['required', 'integer', "min:1"],
            'month' => ['required', 'integer', "min:1", "max:12"],
            'year' => ['required', 'integer', "min:2000"],
            'time_to_work' => ['required', 'integer'],
            'time_completed' => ['integer'],
            'time_worked' => ['integer'],
            'time_on_sick_leave' => ['integer'],
            'time_on_vacation' => ['integer']
        ];
    }
}
