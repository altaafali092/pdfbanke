<?php

namespace App\Http\Requests\newsList;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreNewsListRequest extends FormRequest
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
            'title' => ['required'],
            'title_ne' => ['required'],
            'slug' => ['required','alpha_dash',Rule::unique('legal_lists','slug')],
            'status' => ['nullable'],
            'publisher' => ['nullable'],
            'publisher_ne' => ['nullable'],
            'publish_date' => ['nullable'],
            'news_category_id' => ['required'],
            'files' => ['required','array'],
            'files.*' => ['mimes:png,jpg,jpeg,doc,pdf']
        ];
    }
}
