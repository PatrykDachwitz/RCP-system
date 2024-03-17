<?php
declare(strict_types=1);
namespace App\Http\Requests\History;

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
            'day_id' => ['required', 'integer', "min:1"],
            'user_id' => ['required', 'integer', "min:1"],
            'work_minutes' => ['integer'],
            'start_work' => ['date_format:Y-m-d H:i:s'],
            'end_work' => ['date_format:Y-m-d H:i:s'],
        ];
    }
}
