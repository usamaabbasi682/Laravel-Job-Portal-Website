<?php

namespace App\Http\Requests\Candidate;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'candidate' => ['required'],
            'country' => ['required','string','max:200'],
            'location' => ['required','string','max:200'],
            'cv' => ['required','mimes:pdf,docx'],
            'profession' => ['required'],
            'experience' => ['required'],
            'job_role' => ['required'],
            'education' => ['required'],
            'gender' => ['required'],
            'website' => ['url'],
            'dob' => ['required'],
            'marital_status' => ['required'],
        ];
    }
}
