<div>

    <title>{{ ucwords($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container-fluid" data-aos="fade-up" data-aos-duration="1000">

            {{-- <section wire:ignore.self class="breadcrumbs" data-aos="zoom-in" ddata-aos-duration="1000">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><i class="bi bi-person"></i> {{ $title }}</h5>
                    <ol>
                        <li>
                            <a href="/"><i class="bi bi-house-fill"></i> Beranda</a>
                        </li>
                        {!! $subtitle !!}
                    </ol>
                </div>
            </section> --}}

            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h3 class="text-light text-center mt-5"><i class="bi bi-box-arrow-in-right text-light"></i> Silahkan Login
                    </h3>

                    <div class="card px-4 py-3 mt-3 mb-5">
                        <div class="row g-0 justify-content-center">

                            <div class="col-md-12">
                                <div class="d-flex  justify-content-center">
                                    @if ($profil->logo)
                                        <img src="{{ asset('storage/' . $profil->logo) }}" class="img-fluid"
                                            style="width: 100px;">
                                    @else
                                        <img src="/assets/img/logo.png" class="img-fluid">
                                    @endif
                                </div>
                                <div class="card-body">
                                    @if (session()->has('message'))
                                        <script>
                                            Swal.fire({
                                                position: 'top-end',
                                                icon: 'error',
                                                title: 'Login gagal',
                                                showConfirmButton: false,
                                                timer: 1000
                                            })
                                        </script>
                                    @endif
                                    <form wire:submit.prevent="auth" class="mt-2">
                                        @csrf
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <input type="text" wire:model="username"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    placeholder="username" value="{{ old('username') }}" name="username"
                                                    id="username" autofocus>
                                                <label for="username">Username</label>
                                                @error('username')
                                                    <div class="invalid-feedback d-flex justify-content-star">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-floating">
                                                <input wire:ignore.self type="password" wire:model="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="password"
                                                    value="">
                                                <label for="password">Password</label>
                                                @error('password')
                                                    <div class="invalid-feedback d-flex justify-content-star">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="icheck-primary d-flex align-items-center" style="margin-top:-10px;">
                                            <input type="checkbox" id="lihatPassword">
                                            <label for="lihatPassword"
                                                style="font-weight: normal;margin-top:0px;margin-left: 5px;">
                                                <small class="text-dark">Lihat Password</small>
                                            </label>
                                        </div>


                                        <button type="submit"
                                            class="w-100 btn bg-danger border-0  mt-5 btn-get-started py-3"
                                            name="login">
                                            <span wire:loading.remove wire:target="auth">
                                                <i class="bi bi-box-arrow-in-right"></i> LOGIN
                                            </span>
                                            <span wire:loading wire:target="auth"
                                                class="spinner-border spinner-border-sm text-light" role="status"
                                                aria-hidden="true" style="width: ; height: ;"></span>
                                        </button>

                                        <div class="icheck-primary d-flex align-items-center" style="margin-top:10px;">
                                            <input type="checkbox" id="remember_me" wire:model="remember_me">
                                            <label for="remember_me"
                                                style="font-weight: normal;margin-top:0px;margin-left: 5px;">
                                                <small class="text-dark">Ingat Saya !</small>
                                            </label>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <script>
        $(document).on('click', '#lihatPassword', function() {

            const password = document.querySelector('#password');

            if (password.type == 'password') {
                password.type = 'text'
            } else {
                password.type = 'password';
            }

        })
    </script>

</div>
