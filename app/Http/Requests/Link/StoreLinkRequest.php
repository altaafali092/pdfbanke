<?php

namespace App\Http\Requests\Link;

use Illuminate\Foundation\Http\FormRequest;

class StoreLinkRequest extends FormRequest
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
            'links' => ['required','url']
        ];
    }
}
