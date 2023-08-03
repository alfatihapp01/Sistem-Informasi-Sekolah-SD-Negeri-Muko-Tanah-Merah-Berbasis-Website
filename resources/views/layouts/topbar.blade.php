<div style="background-color: rgb(220, 53, 69);">
    <center class="container " style="display: flex; align-items: center; background-color: whitesmoke;">
        <marquee direction="up" scrollamount="2" align="center" behavior="alternate" width="">
            <marquee direction="left">
                <small>
                    <b>Selamat Datang</b> di Website Resmi {{ strtoupper($profil->nama_instansi) }}. Alamat :
                    {{ $profil->alamat }} Kelurahan {{ $profil->kelurahan }} Kecamatan {{ $profil->kecamatan }}
                    Kabupaten
                    {{ $profil->kabupaten }} Provinsi {{ $profil->provinsi }}. Kode Pos <b>{{ $profil->kode_pos }}. SEKOLAH MODEL BERPOLA ASRAMA</b>
                </small>
            </marquee>
        </marquee>
    </center>
</div>
