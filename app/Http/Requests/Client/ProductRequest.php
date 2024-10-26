<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'product_id'        => 'required',
            'amount'            => 'required|numeric',
            'quantity'          => 'required',
            'status'            => 'required',
            'photos.*'          => 'nullable|sometimes|image'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required'   => 'The product field is required.'
        ];
    }
}
