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
                    <label for="password"><h6>Conferma nuova password</h6></label>
                    <input type="password" minlength="8" id="password_confirm" name="password_confirm" class="search-input" value="{{ old('password') }}">
                    <br><br>
                    @error('password_confirm')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="name"><h6>Nome componente staff</h6></label>
                    <input type="text" id="name" name="name" class="search-input" value="{{ old('name') }}" required>
                    @error('name')
                    <br>
                    <span class="invalid-feedback" role="alert">
                        <b>{{ $message }}</b>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="surname"><h6>Cognome componente staff</h6></label>
                    <input type="text" id="surname" name="surname" class="search-input" value="{{ old('surname') }}" required>
                    @error('surname')
                    <br>
                    <span class="invalid-feedback" role="alert">
                        <b>{{ $message }}</b>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="email"><h6>E-mail</h6></label>
                    <input type="email" id="email" name="email" class="search-input" value="{{ old('email') }}" required>
                    <label for="piva"><h6>Partita IVA</h6></label>
                    <input type="number" id="piva" name="piva" class="search-input" value="{{ old('piva') }}" required>
                    @error('piva')
                    <br>
                    <span class="invalid-feedback" role="alert">
                        <b>{{ $message }}</b>
                                    </span>
                    @enderror
                    <label for="n_tel"><h6>Numero di Telefono</h6></label>
                    <input type="number" id="n_tel" name="n_tel" class="search-input" value="{{ old('n_tel') }}" required>
                    @error('n_tel')
                    <br>
                    <span class="invalid-feedback" role="alert">
                        <b>{{ $message }}</b>
                                    </span>
                    @enderror
                </fieldset>
                <input type="submit" class="form_btn" value="Crea">
            </form>
        </div>
    </div>
@endsection
