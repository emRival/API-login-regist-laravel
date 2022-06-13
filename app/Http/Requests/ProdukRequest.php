<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdukRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kategori_id' => 'required',
            'nama' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'required',
            'gambar' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'kategori_id.required' => 'Kategori tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'harga.required' => 'Harga tidak boleh kosong',
            'harga.numeric' => 'Harga harus angka',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
            'gambar.required' => 'Gambar tidak boleh kosong',
        ];
    }
}