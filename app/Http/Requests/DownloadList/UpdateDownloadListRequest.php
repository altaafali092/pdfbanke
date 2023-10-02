<?php

namespace App\Http\Requests\DownloadList;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateDownloadListRequest extends FormRequest
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
                'slug' => ['required','alpha_dash',Rule::unique('download_lists', 'slug')->ignore($this->downloadList)],
                'status' => ['nullable'],
                'publisher' => ['nullable'],
                'publisher_ne' => ['nullable'],
                'download_category_id' => ['required'],
                'publisher_date' => ['nullable'],
                'files' => ['nullable','array'],
                'files*' => ['mimes:png,jpg,jpeg,doc,pdf']
            ];

    }
}
