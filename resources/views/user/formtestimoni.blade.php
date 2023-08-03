@extends ('user.master')

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
                <h1>Form Testimoni</h1>
                <form action="{{ route('store.testimoni', ['kd_booking' => $dataBooking->kd_booking]) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex gap-2 has-validation mb-4 align-items-center">
                        <label>Rating</label>
                        <div class="rating">
                            <input type="radio" id="star5" name="rating_testimoni" value="5">
                            <label for="star5" title="5 stars">&#9733;</label>
                            <input type="radio" id="star4" name="rating_testimoni" value="4">
                            <label for="star4" title="4 stars">&#9733;</label>
                            <input type="radio" id="star3" name="rating_testimoni" value="3">
                            <label for="star3" title="3 stars">&#9733;</label>
                            <input type="radio" id="star2" name="rating_testimoni" value="2">
                            <label for="star2" title="2 stars">&#9733;</label>
                            <input type="radio" id="star1" name="rating_testimoni" value="1">
                            <label for="star1" title="1 star">&#9733;</label>
                        </div>
                        <div class="invalid-feedback">{{ $errors->first('rating_testimoni') }}</div>
                    </div>
                    <div class="form-group has-validation mb-4">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi_testimoni" class="form-control {{ $errors->has('deskripsi_testimoni') ? 'is-invalid' : '' }}"
                            id="" cols="" rows="">{{ old('deskripsi_testimoni') }}</textarea>
                        <div class="invalid-feedback">{{ $errors->first('nomor_hp_booking') }}</div>

                    </div>
                    <div class="form-group has-validation mb-4">
                        <label>Foto</label>
                        <input type="file" class="form-control {{ $errors->has('file_testimoni') ? 'is-invalid' : '' }}"
                            name="file_testimoni" placeholder="Enter your email"
                            value={{ $errors->has('file_testimoni') ? old('file_testimoni') : Auth::user()->email }}>
                        <div class="invalid-feedback">{{ $errors->first('file_testimoni') }}</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        .rating {
            display: inline-block;
        }

        .rating input {
            display: none;
        }

        .rating label {
            color: #ddd;
            font-size: 28px;
            padding: 5px;
            float: right;
        }

        .rating input:checked~label,
        .rating input:hover~label {
            color: #f39c12;
        }
    </style>
@endsection
