<?php
declare(strict_types=1);
namespace App\Http\Requests\Days;

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
            'day' => ['integer', "min:1", "max:31"],
            'month' => ['integer', "min:1", "max:12"],
            'year' => ['integer'],
            'day_week' => ['integer', "max:7", "min:1"],
            'legislative_holiday' => ['boolean'],
        ];
    }
}
