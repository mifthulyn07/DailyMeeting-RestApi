<?php

namespace App\Http\Requests\API\ManagementReport;

use Illuminate\Foundation\Http\FormRequest;

class StoreAbsensiRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|exists:users,id',
            'tanggal' => 'required|date_format:Y/m/d',
            'absen_masuk' => 'required|date_format:H:i:s',
            'keterangan_absen_masuk' => 'required',
            'status_absen_masuk' => 'required|in:Hadir,Absen',
            'keterlambatan_absen_masuk' => 'date_format:H:i:s',
            'absen_pulang' => 'required|date_format:H:i:s',
            'keterangan_absen_pulang' => 'required',
            'status_absen_pulang' => 'required|in:Hadir,Absen',
            'keterlambatan_absen_pulang' => 'date_format:H:i:s',
        ];
    }
    public function messages()
    {
        return [
            'user_id' => [
                'required' => "user tidak boleh kosong!",
                'exists' => 'user yang di pilih tidak valid!'
            ],
            'tanggal' => [
                'required' => 'Tanggal tidak boleh kosong!',
                'date_format' => 'Format tanggal tidak sama dengan format Y/m/d!',
            ],
            'absen_masuk' => [
                'required' => 'absen masuk tidak boleh kosong!',
                'date_format' => 'Format absen masuk tidak sama dengan format H:i:s!',
            ],
            'keterangan_absen_masuk.required' => 'keterangan absen masuk tidak boleh kosong!',
            'status_absen_masuk' => [
                'required' => 'status absen masuk tidak boleh kosong!',
                'in' => 'status absen masuk yang dipilih tidak valid!',
            ],
            'keterlambatan_absen_masuk.date_format' => 'Format keterlambatan absen masuk tidak sama dengan format H:i:s!',
            'absen_pulang' => [
                'required' => 'absen masuk tidak boleh kosong!',
                'date_format' => 'Format absen pulang tidak sama dengan format H:i:s!',
            ],
            'keterangan_absen_pulang.required' => 'keterangan absen pulang tidak boleh kosong!',
            'status_absen_pulang' => [
                'required' => 'status absen pulang tidak boleh kosong!',
                'in' => 'status absen pulang yang dipilih tidak valid!',
            ],
            'keterlambatan_absen_pulang.date_format' => 'Format keterlambatan absen pulang tidak sama dengan format H:i:s!',
        ];
    }
}
