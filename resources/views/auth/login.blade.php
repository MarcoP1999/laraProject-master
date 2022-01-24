@extends('layouts.struttura')

@section('title', 'Login')

@section('content')
<div id="container2">
    <div class="form_dati">
    <div class="sfondo_login">
        <div class="div-form-login">
            <div class="card">
                <div class="card-header"><h4>{{ __('Login') }}</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn_loginn">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>

       <div class="container">
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <!-- Left Side Of Navbar -->
               <ul class="navbar-nav mr-auto">
               </ul>
               <!-- Right Side Of Navbar -->
               <ul class="navbar-nav ml-auto">
                        <h6>Se vuoi accreditarti come tecnico di un centro assistenza o
                            come membro dello staff tecnico scrivi una mail all'admin del sito</h6>
               </ul>
           </div>
       </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
