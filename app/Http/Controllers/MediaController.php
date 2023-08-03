<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Informasi;
use App\Models\ProfilInstansi;
use App\Models\Video;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function show_berita($berita)
    {
        $get_berita = Berita::where('slug', $berita)->first();

        return view('media.full-page-berita',[
            'title' => 'Berita',
            'subtitle' => '<li>Media</li> <li><a class="text-light" href="/media/berita">Berita</a></li><li>'.strtolower($get_berita->judul).'</li>',
            'profil' => ProfilInstansi::first(),
            'berita' => $get_berita,
        ]);
    }

    public function show_informasi($informasi)
    {
        $get_informasi = Informasi::where('slug', $informasi)->first();

        return view('media.full-page-informasi',[
            'title' => 'Informasi Sekolah',
            'subtitle' => '<li>Media</li> <li><a class="text-light" href="/media/informasi-sekolah">Informasi Sekolah</a></li><li>'.strtolower($get_informasi->judul).'</li>',
            'profil' => ProfilInstansi::first(),
            'informasi' => $get_informasi,
        ]);
    }

    public function show_video($video)
    {
        $get_video = Video::where('slug', $video)->first();

        return view('media.full-page-video',[
            'title' => 'video Dokumentasi',
            'subtitle' => '<li>Media</li> <li><a class="text-light" href="/media/video-dokumentasi">Video Dokumentasi</a></li><li>'.strtolower($get_video->judul).'</li>',
            'profil' => ProfilInstansi::first(),
            'video' => $get_video,
        ]);
    }
}
