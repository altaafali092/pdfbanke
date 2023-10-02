<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class StoreSliderRequest extends FormRequest
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
            'image' => ['required', 'mimes:jpg,jpeg,png']
        ];
    }
}