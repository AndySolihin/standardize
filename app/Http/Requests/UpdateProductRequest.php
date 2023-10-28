<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nomor_so' => [
                'required',
                'max:100',
                Rule::unique('dryresins')->ignore($this->id),
            ],
            'kategori' => ['required', 'max:100'],
            'total_hours' => ['required', 'numeric', 'min:1'],
			// 'proses_id' => ['required'],
            // 'stock' => ['required', 'numeric', 'min:0'],
            // 'category_ids' => ['required', 'array', 'min:2']
        ];
    }
}
