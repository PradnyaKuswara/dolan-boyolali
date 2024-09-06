<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GaleriRequest extends FormRequest
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
            'event_id' => ['required', 'integer', 'exists:events,id'],
            'wisata_id' => ['required', 'integer', 'exists:wisatas,id'],
            'nama_event' => ['nullable', 'string', 'max:255'],
            'nama_wisata' => ['nullable', 'string', 'max:255'],
            'nama_galeri' => ['required', 'string', 'max:255'],
            'lokasi_galeri' => ['required', 'string'],
            'foto_galeri' => [Rule::when($this->conditionalImageUpdate(), '', ['required']), Rule::file()->image()->max(1024 * 1), 'mimes:jpg,jpeg,png'],
            'deskripsi_galeri' => ['required', 'string'],
        ];
    }

    private function conditionalImageUpdate(): bool
    {
        return $this->isMethod('patch') or $this->isMethod('put');
    }
}
