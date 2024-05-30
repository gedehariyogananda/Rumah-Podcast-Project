<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class asucreaterequest extends FormRequest
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
            'Namapodcast'=>'unique:rumahpodcast|required',
            'Tanggal'=>':|required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
    public function messages()
    {
        return [
            'Namapodcast.unique' =>'Nama Tidak Boleh Sama',
            'Namapodcast.required'=>'Namapodcast Tidak Boleh Kosong Harus Di Isi Semua',
            'Tanggal.required'=>'Tanggal Tidak Boleh Kosong Harus Di Isi Semua',
        ];
    }
}
