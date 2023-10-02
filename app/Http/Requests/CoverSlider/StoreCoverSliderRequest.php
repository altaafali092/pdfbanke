<?php

namespace App\Http\Requests\CoverSlider;

use Illuminate\Foundation\Http\FormRequest;

class StoreCoverSliderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' =>['required'],
            'image'=>['required'],
        ];
    }
}
