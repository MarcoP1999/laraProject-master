@extends('layouts.struttura')

@section('title', 'Aggiungi tecnico associato')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
    <li><a href="{{ route('showTecn') }}">Gestione tecnici</a></li>
    <li><a href="{{ route('addTecn') }}">Aggiungi tecnici</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Aggiungi componente staff</h3>
            <form class="form_style" method="POST" action="{{ route('addNewTecn') }}">
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
                    <label for="piva"><h6>Partita IVA</h6></label>
                    <input type="number" id="piva" name="piva" class="search-input" value="{{ old('piva') }}" required>
                    <label for="n_tel"><h6>Numero di Telefono</h6></label>
                    <input type="number" id="n_tel" name="n_tel" class="search-input" value="{{ old('n_tel') }}" required>
                </fieldset>
                <input type="submit" class="form_btn" value="Crea">
            </form>
        </div>
    </div>
@endsection
