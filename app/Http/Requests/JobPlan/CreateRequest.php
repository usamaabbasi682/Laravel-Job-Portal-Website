<?php

namespace App\Http\Requests\JobPlan;

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
            'view_limit' => ['required'],
            'label' => ['required','string','max:100'],
            'currency_symbol' => ['required'],
            'price' => ['required','numeric'],
            'post_limit' => ['required','numeric'],
            'featured_post_limit'=> ['required','integer'],
            'highlighted_post_limit' => ['required','integer'],
            "cv_preview_limit" => ["required_if:view_limit,==,limited"],
            'description' => ['required'],
        ];
    }
}
