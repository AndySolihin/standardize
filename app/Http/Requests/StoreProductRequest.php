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
            // 'kd_manhour' => ['required', 'string', 'max:14', 'unique:dryresins,kd_manhour'],
            'nama_product' => [ 'string', 'max:255'],
            'kategori' => [ 'string', 'max:255'],
            'nomor_so' => ['required', 'string', 'max:255'],
            'ukuran_kapasitas' => ['required'],
            // 'coil_lv' => ['required','string', 'max:100'],
            'coil_hv' => ['required','string', 'max:100'],
            'potong_leadwire' => ['required','string', 'max:100'],
            'potong_isolasi' => ['required','string', 'max:100'],
            'hv_moulding' => ['required','string', 'max:100'],
            'hv_casting' => ['required','string', 'max:100'],
            'hv_demoulding' => ['required','string', 'max:100'],
            'lv_bobbin' => ['required','string', 'max:100'],
            'lv_moulding' => ['required','string', 'max:100'],
            'touch_up' => ['required','string', 'max:100'],
            'type_susun_core' => ['required','string', 'max:100'],
            'wiring' => ['required','string', 'max:100'],
            'instal_housing' => ['required','string', 'max:100'],
            'bongkar_housing' => ['required','string', 'max:100'],
            'pembuatan_cu_link' => ['required','string', 'max:100'],
            'others' => ['required','string', 'max:100'],
            'accessories' => ['required','string', 'max:100'],
            'potong_isolasi_fiber' => ['required','string', 'max:100'],
            // 'routine_test' => ['required','string', 'max:100'],
            'total_hour' => ['required','string', 'max:100'],
        ];
    }

}
