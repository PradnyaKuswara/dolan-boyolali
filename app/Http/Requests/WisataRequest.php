<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class WisataRequest extends FormRequest
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
            'nama_wisata' => ['required', 'string', 'max:255'],
            'lokasi_wisata' => ['required', 'string'],
            'latitude' => ['required', 'string'],
            'longitude' => ['required', 'string'],
            'deskripsi_wisata' => ['required', 'string'],
            'kategori_wisata' => ['required', 'string'],
            'foto_wisata' => [Rule::when($this->conditionalImageUpdate(), '', ['required']), Rule::file()->image()->max(1024 * 1), 'mimes:jpg,jpeg,png'],
        ];
    }

    private function conditionalImageUpdate(): bool
    {
        return $this->isMethod('patch') or $this->isMethod('put');
    }
}
