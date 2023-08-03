@extends('user.master')

@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 my-2 w-75">
        <div class="row mb-5">
            <div class="col-md-6 col-sm-12">
                <div id='map' class="w-100 h-100"></div>
            </div>

            <div class="col-md-6 col-sm-12">
                <h5>Kontak</h5>
                <div class="d-flex gap-2 align-items-center mb-2">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>flamenggogarage.56@gmail.com</span>
                </div>
                <div class="d-flex gap-2 align-items-center mb-2">
                    <i class="fab fa-fw fa-instagram"></i>
                    <a href="https://www.instagram.com/flamenggo.garage56/">@flamenggo.garage56</a>
                </div>
                <div class="d-flex gap-2 align-items-center mb-2">
                    <i class="fas fa-fw fa-phone-alt"></i>
                    <span>+62 858-8265-4852</span>
                </div>
                <div class="d-flex gap-2 align-items-center mb-2">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Jalan Flamboyan No. 56, Kota Depok, Pancoran Mas</span>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('styles')
    <link href='/mapbox/mapbox-gl.css' rel='stylesheet' />
@endsection

@section('script')
    <script src='/mapbox/mapbox-gl.js'></script>
    <script>
        // Your Mapbox access token
        mapboxgl.accessToken = 'pk.eyJ1Ijoic3l1a3VyemFreSIsImEiOiJjbDVoanF2a2QwYTU3M2NtZDRjc3BiaGdyIn0.bDzvwmyRWBKYqF1M9Hxkkw';

        // Create the map
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: [106.82978148010642 , -6.39944263640983], // Replace with desired center coordinates (e.g., [-122.4194, 37.7749])
            zoom: 17, // Adjust the zoom level as needed
        });
    </script>
@endsection