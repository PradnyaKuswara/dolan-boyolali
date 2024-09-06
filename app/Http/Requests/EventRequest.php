<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EventRequest extends FormRequest
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
            'nama_event' => ['required', 'string', 'max:255'],
            'tanggal_event' => ['required', 'date'],
            'lokasi_event' => ['required', 'string'],
            'deskripsi_event' => ['required', 'string'],
            'foto_event' => [Rule::when($this->conditionalImageUpdate(), '', ['required']), Rule::file()->image()->max(25000 * 1), 'mimes:jpg,jpeg,png'],
        ];
    }

    private function conditionalImageUpdate(): bool
    {
        return $this->isMethod('patch') or $this->isMethod('put');
    }
}
