<?php

namespace App\Imports;

use App\Models\Guru;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;

class GuruImport implements
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Guru([
            'id_jabatan' => $row['id_jabatan'],
            'status' => $row['status'],
            // 'status_tim_pengajar' => $row['status_tim_pengajar'],
            'nip' => $row['nip'],
            'nama' => $row['nama'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'nomor_telepon' => $row['nomor_telepon'],
            'email' => $row['email'],
            'alamat' => $row['alamat'],
        ]);
    }

    public function rules(): array
    {

        return [
            '*.id_jabatan' => ['required', 'max:255'],
            '*.status' => ['in:PNS,PPPK,Honor'],
            // '*.status_tim_pengajar' => ['in:Kurikulum 2013,ISMUBAIS-TIK'],
            '*.nip' => ['max:255'],
            '*.nama' => ['required', 'max:255'],
            '*.tempat_lahir' => ['required', 'max:255'],
            '*.tanggal_lahir' => ['required', 'max:255'],
            '*.jenis_kelamin' => ['in:Laki-Laki,Perempuan'],
            '*.nomor_telepon' => ['required', 'max:255'],
            '*.email' => ['required', 'email', 'max:255'],
            '*.alamat' => ['required', 'max:255'],
        ];
    }
}
