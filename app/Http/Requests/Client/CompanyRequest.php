<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'              => 'required',
            'gcash_number'      => 'required|digits:11|starts_with:09',
            'contact_number'    => 'required|digits:11|starts_with:09',
            'address'           => 'required',
            'city'              => 'required',
            'zip_code'          => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'name.required'                 => 'The company name field is required.',
            'gcash_number.digits'           => 'The GCash number field has an invalid number format.',
            'gcash_number.starts_with'      => 'The GCash number field has an invalid number format.',
            'contact_number.digits'         => 'The contact number field has an invalid number format.',
            'contact_number.starts_with'    => 'The contact number field has an invalid number format.'
        ];
    }
}
