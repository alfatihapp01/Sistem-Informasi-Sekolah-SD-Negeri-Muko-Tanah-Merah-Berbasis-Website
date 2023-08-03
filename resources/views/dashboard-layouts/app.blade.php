@php
    $profil = \App\Models\ProfilInstansi::first();
@endphp

@include('dashboard-layouts.header')

<div class="wrapper">

    {{-- navbar --}}
    @include('dashboard-layouts.navbar')

    <!-- Sidebar -->
    @include('dashboard-layouts.sidebar')

    @yield('container')

    <!-- Footer -->
    @include('dashboard-layouts.copyright')

</div>

@include('dashboard-layouts.footer')
