@extends('user.master')

@section('content')
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-2 w-75">
            <div class="card custom-card p-4">
                <h1>Form Booking</h1>
                <form  action="/user/form-booking" method="POST">
                    @csrf
                    <div class="form-group pb-4">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Enter your name">
                    </div>
                    <div class="form-group pb-4">
                        <label for="phone">Nomor Hp</label>
                        <input type="text" class="form-control" name="nomor_hp_booking" placeholder="Enter your number">
                    </div>
                    <div class="form-group pb-4">
                        <label for="email">Alamat Email</label>
                        <input type="email" class="form-control" name="email_booking" placeholder="Enter your email">
                    </div>

                    <div class="form-group pb-4">
                        <label for="message">Pilih Jasa</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="check-paint">
                            <label class="form-check-label" for="flexCheckDefault">
                                Paint/Repaint
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked1">
                            <label class="form-check-label" for="flexCheckChecked1">
                                Service
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked2">
                            <label class="form-check-label" for="flexCheckChecked2">
                                Tune Up
                            </label>
                        </div>
                    </div>
                    <div class="form-group pb-4" style="display:none" id="pilihan-warna">
                        <label for="warna">Pilih Warna</label>
                        <input type="warna" class="form-control" id="warna" placeholder="Tulis Warna">
                    </div>
                    <div class="form-group pb-4" style="display:none" id="kategori-paint">
                        <label for="kategori">Kategori</label>
                        <input type="warna" class="form-control" id="warna" placeholder="Misal Full body, atau Velg saja">
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
