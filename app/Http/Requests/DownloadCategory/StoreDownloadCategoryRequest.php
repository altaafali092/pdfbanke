<?php

namespace App\Http\Requests\DownloadCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class StoreDownloadCategoryRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return True;
    }


    public function rules(): array
    {
        return [
            'title' => ['required'],
            'title_ne' => ['required'],
            'slug' => ['required','alpha_dash',Rule::unique('download_categories','slug')]
        ];
    }
}
