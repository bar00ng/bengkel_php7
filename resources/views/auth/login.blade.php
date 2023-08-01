@extends('auth.master')

@section('content')
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Login</h1>
</div>

<form class="user" method="POST" action="{{ route('login.proses') }}">
    @csrf
    <div class="form-group has-validation">
        <input type="email" name="email" class="form-control form-control-user {{ $errors->has('email') ? 'is-invalid' : '' }}"
            id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Masukkan Alamat Email..." value="{{ old('email') }}">
        <div class="invalid-feedback">
            {{ $errors->first('email') }}
        </div>
    </div>
    <div class="form-group has-validation">
        <input type="password" name="password" class="form-control form-control-user {{ $errors->has('password') ? 'is-invalid' : '' }}"
            id="exampleInputPassword" placeholder="Password">
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">
        Login
    </button>
</form>
<hr>
@endsection