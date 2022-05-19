@extends('admin.layouts.login')

@push('css')
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid mt-0">
    <div class="logo-home">
        <a href="{{ url('/') }}">
            <img class="home" src="{{asset('storage/img/BoolBnb.png')}}" alt="Logo BoolBnb">
        </a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="container-card">
                    <img class="logo" src="{{asset('storage/img/BoolBnb.png')}}" alt="Logo BoolBnb">
                    <div class="my_card d-flex">
                        <div class="img-left">
                            <img src="{{asset('storage/img/Torre-Eiffel.png')}}" alt="Torre Eiffel">
                        </div>
                        <div class="form-right">
                            <div class="overlay"></div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="name" class="col-md-4 col-form-label text-md-right my_text">{{ __('Name') }}</label>

                                            <div class="col-md-6">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="surname" class="col-md-4 col-form-label text-md-right my_text">{{ __('Surname') }}</label>

                                            <div class="col-md-6">
                                                <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" autocomplete="surname" autofocus>

                                                @error('surname')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Birth_date') }}</label>
                
                                            <div class="col-md-6">
                                                <input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" autocomplete="name" autofocus>
                
                                                @error('birth_date')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right my_text">{{ __('E-Mail Address') }}*</label>

                                            <div class="col-md-6">
                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right my_text">{{ __('Password') }}*</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right my_text">{{ __('Confirm Password') }}*</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn my_btn btn-primary">
                                                    {{ __('Register') }}
                                                </button>
                                                <a class="btn my_btn ml-3 btn-primary" href="{{ route('login') }}">
                                                    Sign In
                                                </a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
