<?php

namespace App\Http\Controllers;

use App\Imports\GuruImport;
use App\Imports\PegawaiImport;
use App\Imports\PendudukImport;
use App\Imports\SiswaImport;
use App\Models\Siswa;
use Illuminate\Http\Request;

class ImportController extends Controller
{
    public function importPegawai(Request $request)
    {
        $validateData = $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');

        $import = new PegawaiImport;

        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        session()->flash('import_success');

        return redirect("/dashboard/master/pegawai");
    }

    public function importPenduduk(Request $request)
    {
        $validateData = $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');

        $import = new PendudukImport;

        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        session()->flash('import_success');

        return redirect("/dashboard/penduduk");
    }

    public function importSiswa(Request $request)
    {
        $validateData = $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');

        $import = new SiswaImport;

        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        session()->flash('message', 'success/Import data siswa berhasil');

        return redirect("/dashboard/master/siswa");
    }

    public function importGuru(Request $request)
    {
        $validateData = $request->validate([
            'file' => 'required|mimes:xlsx'
        ]);

        $file = $request->file('file');

        $import = new GuruImport;

        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        session()->flash('message', 'success/Import data guru berhasil');

        return redirect("/dashboard/master/guru");
    }
}
