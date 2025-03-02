<?php
tes
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::user()->role === 'admin' || Auth::user()->role === 'manager';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'speed' => 'required|numeric|min:0',
            'status' => 'required|in:active,inactive',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama produk wajib diisi',
            'name.string' => 'Nama produk harus berupa string',
            'name.max' => 'Nama produk maksimal 255 karakter',
            'description.required' => 'Deskripsi produk wajib diisi',
            'description.string' => 'Deskripsi produk harus berupa string',
            'price.required' => 'Harga produk wajib diisi',
            'price.numeric' => 'Harga produk harus berupa angka',
            'price.min' => 'Harga produk minimal 0',
            'speed.required' => 'Kecepatan produk wajib diisi',
            'speed.numeric' => 'Kecepatan produk harus berupa angka',
            'speed.min' => 'Kecepatan produk minimal 0',
            'status.required' => 'Status produk wajib diisi',
            'status.in' => 'Status produk harus active atau inactive',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'name' => 'Nama Produk',
            'description' => 'Deskripsi Produk',
            'price' => 'Harga Produk',
            'speed' => 'Kecepatan Produk',
            'status' => 'Status Produk',
        ];
    }
}
