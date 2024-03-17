<?php
declare(strict_types=1);
namespace App\Http\Requests\Days;

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
            'day' => ['required', 'integer', "min:1", "max:31"],
            'month' => ['required', 'integer', "min:1", "max:12"],
            'year' => ['required', 'integer'],
            'day_week' => ['required', 'integer', "max:7", "min:1"],
            'legislative_holiday' => ['required', 'boolean'],
        ];
    }
}
