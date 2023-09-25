<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StorePetRequest extends FormRequest
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
            'species' => ['required','string'],
            'breed' => ['required','string'],
            'name' => ['required','string','max:255'],
            'dob' => ['required','date','before_or_equal:' . now()->format('Y-m-d')],
            'gender' => ['required','string','in:Male,Female,male,female'],
            'height' => ['required','numeric'],
            'weight' => ['required','numeric'],
            'image' => ['required','image','max:1024','mimes:jpg,png,jpeg']
        ];
    }

    public function messages(){
        return [
            'dob.before_or_equal' => 'The date of birth field must be a date before or equal to :date.'
        ];
    }
}
