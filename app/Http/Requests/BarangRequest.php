<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarangRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'keterangan' => 'required',
            'image' => 'required|mimes:jpg,JPG,Jpg,jpeg,Jpeg,JPEG,png,Png,PNG|max:2048',
            'tanggal_masuk' => 'required'
        ];
    }
}
