@extends('layouts.app')

@section('container')
    <?php if(Request::is('/')) : ?>
    @livewire('home')

    <?php elseif(Request::is('profil-sekolah')) : ?>
    @livewire('profil-instansi')

    <?php elseif(Request::is('data-sekolah/statistik-sekolah')) : ?>
    @livewire('statistik')

    <?php elseif(Request::is('data-sekolah/tenaga-pendidik')) : ?>
    @livewire('data-guru')

    <?php elseif(Request::is('data-sekolah/cek-peserta-didik')) : ?>
    @livewire('cek-data-siswa')

    <?php elseif(Request::is('media/berita')) : ?>
    @livewire('berita')

    <?php elseif(Request::is('media/pengumuman-sekolah')) : ?>
    @livewire('informasi')

    <?php elseif(Request::is('media/video-dokumentasi')) : ?>
    @livewire('video')

    <?php elseif(Request::is('media/galeri-sekolah')) : ?>
    @livewire('galeri')

    <?php elseif(Request::is('informasi-ekstrakurikuler')) : ?>
    @livewire('informasi-extrakurikuler')

    <?php elseif(Request::is('administrator')) : ?>
    @livewire('login')

    <?php elseif(Request::is('registrasi')) : ?>
    @livewire('registrasi')

    <?php endif ?>
@endsection
