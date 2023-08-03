@php
    $profil = \App\Models\ProfilInstansi::first();
@endphp

@include('layouts.header')

@include('layouts.topbar')

@include('layouts.navbar')


@yield('container')

@include('layouts.footer')
