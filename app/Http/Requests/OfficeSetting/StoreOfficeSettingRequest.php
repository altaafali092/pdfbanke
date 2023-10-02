<?php

namespace App\Http\Requests\OfficeSetting;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfficeSettingRequest extends FormRequest
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
            'office_name'=> ['required'],
            'office_name_ne'=> ['required'],
            'office_add'=>['required'],
            'office_add_ne'=>['required'],
            'phone'=>['required'],
            'email'=>['required'],
            'cover' => ['required', 'mimes:jpg,jpeg,png,gif'],
            'logo1' => ['required', 'mimes:jpg,jpeg,png,gif'],
            'logo2' => ['required', 'mimes:jpg,jpeg,png,gif'],
            'adphoto' => ['nullable', 'mimes:jpg,jpeg,png,gif'],
            'office_cheif_id'=>['required'],
            'information_officer_id'=>['required'],
            'mapurl'=>['nullable'],
            'fburl'=>['nullable'],
            'twitterurl'=>['nullable'],
        ];
    }
}
