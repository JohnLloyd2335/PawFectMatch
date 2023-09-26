<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePetMedRecordRequest extends FormRequest
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
            'species' => ['required'],
            'breed' => ['required'],
            'pet' => ['required'],
            'checkup_date' => ['required','date','before_or_equal:'.now()->format('Y-m-d')],
            'diagnosis' => ['required','string','max:255'],
            'treatment' => ['required','string','max:255'],
        ];
    }
}
