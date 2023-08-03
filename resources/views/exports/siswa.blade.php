<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/cetak.css" rel="stylesheet">

    <title>Data Siswa</title>

    <style>
        body {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 12.5pt;
        }

        @page {
            margin-top: 20px;
            margin-bottom: 10px;
            /* margin-left: 20px; */
            /* margin-right: 20px; */
        }
    </style>


</head>

<body>


    @if ($siswa->count())
        <table width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>id_kelas</th>
                    <th>induk</th>
                    <th>nisn</th>
                    <th>nik</th>
                    <th>nama</th>
                    <th>tempat_lahir</th>
                    <th>tanggal_lahir</th>
                    <th>jenis_kelamin</th>
                    <th>agama</th>
                    <th>pendidikan_sebelumnya</th>
                    <th>alamat</th>
                    <th>nama_ayah</th>
                    <th>nama_ibu</th>
                    <th>pekerjaan_ayah</th>
                    <th>pekerjaan_ibu</th>
                    <th>jalan</th>
                    <th>kelurahan</th>
                    <th>kecamatan</th>
                    <th>kabupaten</th>
                    <th>provinsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($siswa as $data)
                    <tr>
                        <td>{{ $data->id_kelas }}</td>
                        <td>{{ $data->induk }}</td>
                        <td>{{ $data->nisn }}</td>
                        <td>{{ $data->nik }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->tempat_lahir }}</td>
                        <td>{{ $data->tanggal_lahir }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->agama }}</td>
                        <td>{{ $data->pendidikan_sebelumnya }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->nama_ayah }}</td>
                        <td>{{ $data->nama_ibu }}</td>
                        <td>{{ $data->pekerjaan_ayah }}</td>
                        <td>{{ $data->pekerjaan_ibu }}</td>
                        <td>{{ $data->jalan }}</td>
                        <td>{{ $data->kelurahan }}</td>
                        <td>{{ $data->kecamatan }}</td>
                        <td>{{ $data->kabupaten }}</td>
                        <td>{{ $data->provinsi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div style="height: 60vh;" class="d-flex justify-content-center align-items-center">
            <p class="text-center text-secondary">Belum ada data !
            </p>
        </div>
    @endif


</body>

</html>
