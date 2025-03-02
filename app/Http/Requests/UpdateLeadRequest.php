<?php
tes
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::user()->role === 'sales';
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'company' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap harus diisi',
            'name.max' => 'Nama lengkap maksimal 255 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 255 karakter',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.max' => 'Nomor telepon maksimal 20 karakter',
            'company.required' => 'Nama perusahaan harus diisi',
            'company.max' => 'Nama perusahaan maksimal 255 karakter',
        ];
    }
}
