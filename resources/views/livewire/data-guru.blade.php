<div>

    <title>{{ strtoupper($profil->nama_instansi) }} - {{ $title }}</title>

    <main id="main">

        <div wire:ignore.self class="container p-0" data-aos="fade-up" data-aos-duration="1000">

            <section wire:ignore.self class="breadcrumbs p-3 text-light" data-aos="fade-up" data-aos-duration="1000">
                <div class="d-flex justify-content-between align-items-center">
                    <h5><img src="/assets/img/user_graduate.png" class="img-fluid" style="width: 20px;">
                        {{ $title }}</h5>
                    <ol>
                        <li>
                            <a href="/" class="text-light"><i class="bi bi-house-fill"></i> Beranda</a>
                        </li>
                        {!! $subtitle !!}
                    </ol>
                </div>
            </section>

            <div class="row">
                <div class="col-md-12">
                    <div wire:ignore.self class="card mb-2" data-aos="fade-up" data-aos-duration="1000">
                        <div class="card-body">

                            @if ($guru->count() > 0)
                                <section id="testimonials" class="testimonials">
                                    <div class="container" data-aos="zoom-in">

                                        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                                            <div class="swiper-wrapper">

                                                @foreach ($guru as $data)
                                                    <div class="swiper-slide">
                                                        <div class="testimonial-item">
                                                            <div class="member">
                                                                <div class="member-img">
                                                                    @if ($data->image)
                                                                        <img src="{{ asset('storage/' . $data->image) }}"
                                                                            class="img-fluid" alt=""
                                                                            style="width: 300px;height: 350px;">
                                                                    @else
                                                                        <img src="/assets/img/user_graduate.png"
                                                                            class="img-fluid" alt=""
                                                                            style="width: 300px;height: 350px;">
                                                                    @endif
                                                                </div>
                                                                <div class="member-info mt-4">
                                                                    <h3>{{ strtoupper($data->nama) }}</h3>
                                                                    <span>{{ strtoupper($data->jabatan->nama_jabatan) }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                            </div>
                                            {{-- <div class="swiper-pagination"></div> --}}
                                        </div>


                                    </div>
                                </section>
                            @else
                                <p class="text-center text-secondary mt-3">Data masih kosong !</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>
