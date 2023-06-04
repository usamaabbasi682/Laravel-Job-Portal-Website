<?php

namespace App\Http\Requests\Candidate;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'country' => ['required'],
            'location' => ['required','max:255'],
            'profession' => ['required'],
            'experience' => ['required'],
            'job_role' => ['required'],
            'education' => ['required'],
            'gender' => ['required'],
            'website' => ['required','url'],
            'dob' => ['required'],
            'marital_status' => ['required'],
        ];
    }
}
