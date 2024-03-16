<?php

namespace App\Http\Requests\Presence;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'user_id' => ['integer', "min:1"],
            'month' => ['integer', "min:1", "max:12"],
            'year' => ['integer', "min:2000"],
            'time_to_work' => ['integer'],
            'time_completed' => ['integer'],
            'time_worked' => ['integer'],
            'time_on_sick_leave' => ['integer'],
            'time_on_vacation' => ['integer']
        ];
    }
}
