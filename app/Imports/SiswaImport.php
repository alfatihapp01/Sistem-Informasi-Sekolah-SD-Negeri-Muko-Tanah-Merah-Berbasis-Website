<?php

namespace App\Imports;

use App\Models\Siswa;
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

class SiswaImport implements
    ToModel,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure
{
    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Siswa([
            'id_kelas' => $row['id_kelas'],
            'induk' => $row['induk'],
            'nisn' => $row['nisn'],
            'nik' => $row['nik'],
            'nama' => $row['nama'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'agama' => $row['agama'],
            'pendidikan_sebelumnya' => $row['pendidikan_sebelumnya'],
            'alamat' => $row['alamat'],
            'nama_ayah' => $row['nama_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'pekerjaan_ayah' => $row['pekerjaan_ayah'],
            'pekerjaan_ibu' => $row['pekerjaan_ibu'],
            'jalan' => $row['jalan'],
            'kelurahan' => $row['kelurahan'],
            'kecamatan' => $row['kecamatan'],
            'kabupaten' => $row['kabupaten'],
            'provinsi' => $row['provinsi'],
            'jenis_kelamin' => $row['jenis_kelamin'],
        ]);
    }

    public function rules(): array
    {

        return [
            '*.id_kelas' => ['required', 'max:255'],
            '*.induk' => ['required', 'unique:siswa,induk'],
            '*.nisn' => ['required', 'digits:10', 'unique:siswa,nisn'],
            '*.nik' => ['required', 'digits:16', 'unique:siswa,nik'],
            '*.nama' => ['required', 'max:255'],

            '*.tempat_lahir' => ['required', 'max:255'],
            '*.tanggal_lahir' => ['required', 'max:255'],
            '*.agama' => ['in:Islam,Protestan,Katolik,Hindu,Buddha,Khonghucu,Lain-Lain'],
            '*.pendidikan_sebelumnya' => ['required', 'max:255'],
            '*.alamat' => ['required', 'max:255'],
            '*.nama_ayah' => ['required', 'max:255'],
            '*.nama_ibu' => ['required', 'max:255'],
            '*.pekerjaan_ayah' => ['required', 'max:255'],
            '*.pekerjaan_ibu' => ['required', 'max:255'],
            '*.kelurahan' => ['required', 'max:255'],
            '*.kecamatan' => ['required', 'max:255'],
            '*.kabupaten' => ['required', 'max:255'],
            '*.provinsi' => ['required', 'max:255'],
            '*.jenis_kelamin' => ['in:Laki-Laki,Perempuan'],
        ];
    }
}
