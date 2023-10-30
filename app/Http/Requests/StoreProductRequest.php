<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            // 'kapasitas_id' => ['required', 'unique:Dryresins', 'max:100'],
            // 'work_center_id' => ['required', 'max:100'],
            // 'total_hours' => ['required', 'numeric', 'min:1'],
			// 'proses_id' => ['requared'],
            // 'category_ids' => ['required', 'array', 'min:2']
        ];
    }
}
