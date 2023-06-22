<?php

namespace App\Http\Requests\Job;

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
            'title' => ['required','string','max:150'],
            'company' => ['required'],
            'category' => ['required'],
            'vacancies' => ['required'],
            'deadline' => ['required','date'],
            'salary_details' => ['required'],
            'min_salary_range' => ['required_if:salary_details,salary_range'],
            'max_salary_range' => ['required_if:salary_details,salary_range'],
            'custom_salary' => ['required_if:salary_details,custom_salary'],
            'salary_type' => ['required'],
            'country' => ['required'],
            'location' => ['required'],
            'receive_applications' => ['required'],
            'email' => ['required_if:receive_applications,Email-Address'],
            'apply_url' => ['required_if:receive_applications,Custom-URL'],
            'jobfeature' => ['nullable'],
            'experience' => ['required'],
            'job_role' => ['required'],
            'education' => ['required'],
            'tags' => ['nullable'],
            'benefit' => ['nullable'],
            'job_type' => ['required'],
            'description' => ['nullable'],

        ];
    }
}
