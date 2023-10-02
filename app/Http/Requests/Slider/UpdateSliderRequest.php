<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSliderRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'title' => ['required'],
            'title_ne' => ['required'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png']
        ];
    }
}
