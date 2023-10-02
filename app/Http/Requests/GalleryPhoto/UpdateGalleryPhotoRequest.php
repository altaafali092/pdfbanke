<?php

namespace App\Http\Requests\GalleryPhoto;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateGalleryPhotoRequest extends FormRequest
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
            'slug' => ['required', 'alpha_dash', Rule::unique('gallery_photos', 'slug')->ignore($this->GalleryPhoto)],
            'files' => ['nullable','array'],
            'files*' => ['mimes:png,jpg,jpeg,doc,pdf']
        ];
    }
}
