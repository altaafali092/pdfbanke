<?php

namespace App\Http\Requests\FarmerList;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreFarmerListRequest extends FormRequest
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
            'slug' => ['nullable', 'alpha_dash', Rule::unique('farmer_lists', 'slug')],
            'status' => ['nullable'],
            'publisher' => ['nullable'],
            'publisher_ne' => ['nullable'],
            'farmer_category_id' => ['required'],
            'publish_date' => ['required'],
            'files' => ['nullable','array'],
            'files*' => ['mimes:png,jpg,jpeg,doc,pdf']
        ];
    }
}
