@extends('user.master')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-2 w-75">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                    <Strong>Berhasil!</Strong> {{ session('success') }}
                </div>
            @elseif (session()->has('failed'))
                <div class="alert alert-danger" role="alert">
                    <strong>Gagal!</strong> {{ session('failed') }}
                </div>
            @endif
            
            <div class="card custom-card p-4">
                <h1>Form Booking</h1>
                <form  action="{{ route('store.book') }}" method="POST">
                    @csrf
                    <div class="form-group has-validation mb-4 ">
                        <label>Nama</label>
                        <input type="text" class="form-control {{ $errors->has('nama_booking') ? 'is-invalid' : '' }}" name="nama_booking" placeholder="Enter your name" value={{ $errors->has('nama_booking') ? old('nama_booking') : Auth::user()->name }} autofocus>
                        <div class="invalid-feedback">{{ $errors->first('nama_booking') }}</div>
                    </div>
                    <div class="form-group has-validation mb-4">
                        <label>Nomor Hp</label>
                        <input type="text" class="form-control {{ $errors->has('nomor_hp_booking') ? 'is-invalid' : '' }}" name="nomor_hp_booking" placeholder="Enter your number" value="{{ old('nomor_hp_booking') }}">
                        <div class="invalid-feedback">{{ $errors->first('nomor_hp_booking') }}</div>
                    </div>
                    <div class="form-group has-validation mb-4">
                        <label>Alamat Email</label>
                        <input type="email" class="form-control {{ $errors->has('email_booking') ? 'is-invalid' : '' }}" name="email_booking" placeholder="Enter your email" value={{ $errors->has('email_booking') ? old('email_booking') : Auth::user()->email }}>
                    </div>
                    <div class="form-group mb-4">
                        <label>Pilih Jasa</label>
                        @foreach ($jasa as $j)
                            <div class="form-check">
                                <input class="form-check-input" name="jasa[]" type="checkbox" value="{{ $j->id }}" id="{{ ($j->nama_jasa === "Paint/Repaint") ? 'check-paint' : '' }}">
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $j->nama_jasa }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group mb-4" style="display:none" id="pilihan-warna">
                        <label for="warna">Pilih Warna</label>
                        <input type="warna" class="form-control" name="warna_booking" placeholder="Tulis Warna">
                    </div>
                    <div class="form-group mb-4" style="display:none" id="kategori-paint">
                        <label for="kategori">Kategori</label>
                        <input type="warna" class="form-control" id="kategori_booking" placeholder="Misal Full body, atau Velg saja">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        // Memuat fungsi jQuery setelah dokumen selesai dimuat
        $(document).ready(function() {
            // Menggunakan fungsi change() untuk mendeteksi perubahan status checkbox
            $('#check-paint').change(function() {
                // Menggunakan fungsi prop() untuk memeriksa apakah checkbox dicentang
                if ($(this).prop('checked')) {
                    // Jika checkbox dicentang, tampilkan div dengan id "pilihan-warna"
                    $('#pilihan-warna').show();
                    $('#kategori-paint').show();
                } else {
                    // Jika checkbox tidak dicentang, sembunyikan div dengan id "pilihan-warna"
                    $('#pilihan-warna').hide();
                    $('#kategori-paint').hide();
                }
            });
        });
    </script>
@endsection
