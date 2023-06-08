<?php

namespace App\Http\Requests\Company;

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
            'employee' => ['required'],
            'company_name' => ['required','string','max:200'],
            'country' => ['required','string','max:200'],
            'location' => ['required','string','max:200'],
            'phone' => ['required'],
            'email' => ['required','email'],
            'organization' => ['required'],
            'industry' => ['required'],
            'website' => ['nullable','url'],
        ];
    }
}
