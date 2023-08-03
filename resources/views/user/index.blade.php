@extends('user.master')

@section('content')
    <!-- Paint/ Repaint section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <div id="carousel-1" class="carousel slide carousel-dark">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/img/Motor1.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/Motor2.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/Motor3.jpeg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-1"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-1"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">Paint/Repaint</h1>
                    <div class="fs-5 mb-5">
                        <span class="text-decoration-line-through">Rp.700.000,00</span>
                        <span>Rp.500.000,00</span>
                    </div>
                    <p class="lead">Apakah anda ingin memberikan tampilan baru pada motor anda? Apakah anda bosan dengan
                        warna motor/pelek yang monoton? Jangan khawatir! bengkel kami juga menyediakan jasa cat motor cuma
                        dengan Rp 500 ribu untuk full body dan untuk velg saja mulai dengan Rp 200 ribu.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Servis Section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/img/Servis1.jpg" alt="..." /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">Servis</h1>
                    <div class="fs-5 mb-5">
                        <span>Rp. 150.000,00</span>
                    </div>
                    <p class="lead">Kami juga menyediakan jasa servis motor mulai dari ganti oli, throttle body, dan lain-lain.
                        Mulai dengan harga Rp 150 ribu untuk full servis motor matic kesayangan anda.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Tune Up section -->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <div id="carousel-3" class="carousel slide carousel-dark">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/img/CVT1.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/CVT2.jpeg" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/CVT3.jpg" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel-3"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel-3"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder">Tune Up/Modif CVT</h1>
                    <div class="fs-5 mb-5">
                    </div>
                    <p class="lead">Apakah anda ingin membuat tarikan motor matic anda lebih ringan? Tenang saja, bengkel kami
                        menyediakan jasa upgrade cvt membuat motor lebih enteng dan lebih kencang. 
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Review -->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <h2 class="fw-bolder mb-4">Review Flamenggo Garage</h2>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                {{-- Card Review 1 --}}
                @foreach ($Data as $D)
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <img class="card-img-top" src="/img/Jere.jpeg" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder">{{$D->user->name}}</h5>
                                <div class="d-flex justify-content-center small text-warning mb-2">
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                    <div class="bi-star-fill"></div>
                                </div>
                                <!-- Product price-->
                                {{ $D->deskripsi_testimoni }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
