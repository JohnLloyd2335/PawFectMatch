<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePetRequest extends FormRequest
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
            
            'name' => ['required','string','max:255'],
            'dob' => ['required','date','before_or_equal:' . now()->format('Y-m-d')],
            'gender' => ['required','string','in:Male,Female,male,female'],
            'height' => ['required','numeric'],
            'weight' => ['required','numeric'],
            
        ];
    }

    public function messages(){
        return [
            'dob.before_or_equal' => 'The date of birth field must be a date before or equal to :date.'
        ];
    }
}
