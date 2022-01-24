@extends('layouts.struttura')

@section('title', 'Aggiungi componente staff')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
    <li><a href="{{ route('showStaff') }}">Gestione staff azienda</a></li>
    <li><a href="{{ route('addStaff') }}">Aggiungi staff azienda</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Aggiungi componente staff</h3>
            <form class="form_style" method="POST" action="{{ route('addNewStaff') }}">
                @csrf
                <fieldset>
                    <label for="username"><h6>Username</h6></label>
                    <input type="text" id="username" name="username" class="search-input" value="{{ old('username') }}" required>
                    @error('username')
                    <br>
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="password"><h6>Password</h6></label>
                    <input type="password" id="password" name="password" class="search-input" value="{{ old('password') }}" required>
                    @error('password')
                    <br>
                    <span class="invalid-feedback" role="alert">
                        <b>{{ $message }}</b>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="nome"><h6>Nome componente staff</h6></label>
                    <input type="text" id="nome" name="nome" class="search-input" value="{{ old('nome') }}" required>
                    @error('nome')
                    <br>
                    <span class="invalid-feedback" role="alert">
                        <b>{{ $message }}</b>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="cognome"><h6>Cognome componente staff</h6></label>
                    <input type="text" id="cognome" name="cognome" class="search-input" value="{{ old('surname') }}" required>
                    @error('surname')
                    <br>
                    <span class="invalid-feedback" role="alert">
                        <b>{{ $message }}</b>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="email"><h6>E-mail</h6></label>
                    <input type="email" id="email" name="email" class="search-input" value="{{ old('email') }}" required>
                </fieldset>
                <input type="submit" class="form_btn" value="Crea">
            </form>
        </div>
    </div>
@endsection
