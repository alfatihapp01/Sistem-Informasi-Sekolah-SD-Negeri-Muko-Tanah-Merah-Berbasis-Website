<?php

namespace App\Http\Controllers;

use App\Exports\GuruExport;
use App\Exports\SiswaExport;
use App\Models\Kelurahan;
use App\Models\Pegawai;
use App\Models\Penduduk;
use App\Models\ProfilInstansi;
use App\Models\Tahun;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function exportPegawai()
    {
        $profil = ProfilInstansi::first();

        $data = [
            'title' => 'Data Pegawai ' . $profil->nama_instansi,
            'profil' => $profil,
            'pegawai' => Pegawai::orderBy('id_jabatan')->orderBy('nama')->get()
        ];

        $pdf = PDF::loadView('exports.pegawai', $data);

        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('data-pegawai-' . strtolower($profil->nama_instansi) . '.pdf');
    }

    public function exportPenduduk(Request $request)
    {
        $request->validate([
            'nama_kelurahan' => 'required',
            'tahun_pendataan' => 'required',
            'nama_kepala_instansi' => 'required',
            'nip' => 'required|max:18',
        ]);

        $profil = ProfilInstansi::first();

        $tahun = Tahun::where('id_tahun', $request->tahun_pendataan)->first();
        $kelurahan = Kelurahan::where('id_kelurahan', $request->nama_kelurahan)->first();

        $data = [
            'title' => 'DATA PENDUDUK ' . $kelurahan->nama_kelurahan . ' TAHUN ' . $tahun->tahun,
            'profil' => $profil,
            'penduduk' => Penduduk::where('id_tahun', $request->tahun_pendataan)
                ->where('id_kelurahan', $request->nama_kelurahan)
                ->orderBy('alamat')
                ->orderBy('nama')
                ->orderBy('id_pekerjaan')->get(),
            'tahun' => $tahun,
            'kelurahan' => $kelurahan,
            'nama' => strtoupper($request->nama_kepala_instansi),
            'nip' => $request->nip,
        ];

        $pdf = PDF::loadView('exports.penduduk', $data);

        $pdf->setPaper('a4', 'landscape');

        return $pdf->stream('data-penduduk-' . strtolower($kelurahan->nama_kelurahan)
            . '-tahun-' . $tahun->tahun . '.pdf');
    }

    public function export_siswa()
    {
        return Excel::download(new SiswaExport, 'data-siswa.xlsx');
    }

    public function export_guru()
    {
        return Excel::download(new GuruExport, 'data-guru.xlsx');
    }
}
