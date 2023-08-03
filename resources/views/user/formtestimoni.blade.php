@extends ('user.index')

@section ('content')

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
                <form  action="{{ route('store.testimoni',['kd_booking'=>$data->kd_booking]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group has-validation mb-4 ">
                        <label>Rating</label>
                        <input type="number" class="form-control {{ $errors->has('rating_testimoni') ? 'is-invalid' : '' }}" name="rating_testimoni" placeholder="Enter your name" value="{{  old('rating_testimoni')  }}" autofocus>
                        <div class="invalid-feedback">{{ $errors->first('rating_testimoni') }}</div>
                    </div>
                    <div class="form-group has-validation mb-4">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi_testimoni" class="form-control {{ $errors->has('deskripsi_testimoni') ? 'is-invalid' : '' }}" id="" cols="" rows="">"{{  old('deskripsi_testimoni')  }}"</textarea>
                        <div class="invalid-feedback">{{ $errors->first('nomor_hp_booking') }}</div>

                    </div>
                    <div class="form-group has-validation mb-4">
                        <label>Foto</label>
                        <input type="file" class="form-control {{ $errors->has('file_testimoni') ? 'is-invalid' : '' }}" name="file_testimoni" placeholder="Enter your email" value={{ $errors->has('file_testimoni') ? old('file_testimoni') : Auth::user()->email }}>
                        <div class="invalid-feedback">{{ $errors->first('file_testimoni') }}</div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection