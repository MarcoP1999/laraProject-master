@extends('layouts.struttura')

@section('title', 'Modifica dati tecnico')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
    <li><a href="{{ route('showTecn') }}">Gestione tecnico accreditato</a></li>
    <li><a href="{{ route('modifyDataTecn', [$dati_tecnico->id]) }}">Modifica dati</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Modifica dati di un tecnico accreditato</h3>
            <form class="form_style" action="{{route('modifyDataTecn', [$dati_tecnico->id])}}" method="post">
                @csrf
                <fieldset>
                    <label for="n_tel"><h6>Numero di Telefono</h6></label>
                    <input type="n_tel" id="n_tel" name="n_tel" class="search-input" value="{{$dati_tecnico->n_tel}}"required>
                    <br><br>
                    <label for="piva"><h6>Partita Iva</h6></label>
                    <input type="piva" id="piva" name="p_iva" class="search-input" value="{{$dati_tecnico->piva}}" >
                    <br><br>
                    <label for="password"><h6>Nuova password</h6></label>
                    <input type="password" minlength="8" id="password" name="password" class="search-input" value=""required>
                    <br>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    <br>
                    @enderror
                    <br>
                    <label for="password"><h6>Conferma nuova password</h6></label>
                    <input type="password" minlength="8" id="password_confirm" name="password_confirm" class="search-input" value="">
                    <br><br>
                    @error('password_confirm')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="email"><h6>E-Mail</h6></label>
                    <input type="email" id="email" name="email" class="search-input" value="{{$dati_tecnico->email}}" required>
                </fieldset>
                <input type="submit" class="form_btn" value="Modifica">
            </form>
        </div>
    </div>
@endsection
