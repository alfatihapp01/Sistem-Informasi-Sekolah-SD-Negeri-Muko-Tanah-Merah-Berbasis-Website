<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="css/cetak.css" rel="stylesheet">

    <title>Data Guru</title>

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


    @if ($guru->count())
        <table width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>id_jabatan</th>
                    <th>status</th>
                    <th>status_tim_pengajar</th>
                    <th>nip</th>
                    <th>nama</th>
                    <th>tempat_lahir</th>
                    <th>tanggal_lahir</th>
                    <th>jenis_kelamin</th>
                    <th>nomor_telepon</th>
                    <th>email</th>
                    <th>alamat</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($guru as $data)
                    <tr>
                        <td>{{ $data->id_jabatan }}</td>
                        <td>{{ $data->status }}</td>
                        <td>{{ $data->status_tim_pengajar }}</td>
                        <td>{{ $data->nip }}</td>
                        <td>{{ $data->nama }}</td>
                        <td>{{ $data->tempat_lahir }}</td>
                        <td>{{ $data->tanggal_lahir }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{ $data->nomor_telepon }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->alamat }}</td>
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
