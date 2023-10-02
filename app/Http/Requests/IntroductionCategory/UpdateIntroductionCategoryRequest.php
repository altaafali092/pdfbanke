<?php

namespace App\Http\Requests\IntroductionCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateIntroductionCategoryRequest extends FormRequest
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
            'title'=> ['required'],
            'title_ne'=> ['required'],
            'slug' => ['required','alpha_dash',Rule::unique('introduction_categories','slug')->ignore($this->IntroductionCategory)],
        ];
    }
}
