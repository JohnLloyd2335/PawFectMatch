<?php

namespace App\Http\Requests\Adopters;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdoptionRequest extends FormRequest
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
            'reason_for_adoption' => ['required','string','max:255']
        ];
    }
}
