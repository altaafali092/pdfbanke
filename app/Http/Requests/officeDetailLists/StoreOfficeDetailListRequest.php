<?php

namespace App\Http\Requests\officeDetailLists;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOfficeDetailListRequest extends FormRequest
{
   
    public function authorize(): bool
    {
        return true;
    }

  
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'title_ne' => ['required'],
            'slug' => ['required','alpha_dash',Rule::unique('office_detail_lists','slug')],
            'office_detail_id' => ['required'],
            'description' => ['required'],
            'description_ne' => ['required'],
            'status'=> ['nullable'],
            'position'=> ['nullable','integer'],
        ];
    }
}
