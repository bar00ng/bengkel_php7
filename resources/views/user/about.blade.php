@extends('user.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h5>Kontak</h5>
            <div class="d-flex gap-2 align-items-center">
                <i class="fas fa-fw fa-envelope"></i>
                <span>Email: flamenggogarage.56@gmail.com</span>
            </div>

            <div class="d-flex gap-2 align-items-center">
                <i class="fas fa-fw fa-phone-alt"></i>
                <span>Telepon: +6285882654852</span>
            </div>
            <div class="d-flex gap-2 align-items-center">
                <i class="fas fa-fw fa-home"></i>
                <span>Alamat: Jalan Flamboyan no. 56, Kota Depok, Pancoran Mas</span>
            </div>
        </div>
        <div class="col-md-6">
            <h5>Media Sosial</h5>
            <div class="d-flex gap-2 align-items-center"><i class="fab fa-instagram"></i>
            <a href="#">@flamenggo.garage56</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div id='map' style='width: 100%; height: 600px;'></div>

    </div>
</div>
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