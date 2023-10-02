<?php

namespace App\Http\Requests\EmployeeDetail;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeDetailRequest extends FormRequest
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
            'position'=>['required'],
            'name'=> ['required'],
            'name_ne'=> ['required'],
            'post' => ['required'],
            'post_ne' => ['required'],
            'level'=>['nullable'],
            'level_ne'=>['nullable'],
            'contact'=>['nullable','integer'],
            'email'=>['nullable'],
            'image'=> ['nullable','mimes:jpg,jpeg,png'],
        ];
    }
}
