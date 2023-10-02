<?php

namespace App\Http\Requests\GalleryVideo;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreGalleryVideoRequest extends FormRequest
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
            'title'=>['required'],
            'title_ne'=>['required'],
            'slug'=>['required','alpha_dash', Rule::unique('gallery_videos','slug')],
            'url'=>['required'],
        ];
    }
}
