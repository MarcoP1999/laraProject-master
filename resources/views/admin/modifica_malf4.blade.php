@extends('layouts.struttura')

@section('title', 'Modifica Malfunzionamento Admin')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
    <li><a href="{{ route('gestione_prod4') }}">Malfunzionamenti</a></li>
    <li><a href="{{ route('modifyMalf4', [$dati_malf->malfunction_id]) }}">Modifica Malfunzionamento</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Modifica Malfunzionamento</h3>
            <form action="{{route('modifyDataMalf4', [$dati_malf->malfunction_id])}}" method="post">
                @csrf
                <fieldset>
                    <label for="descrizione_malfunzionamento"><h6>Descrizione</h6></label>
                    <textarea name="descrizione_malfunzionamento" style="width:1126px;height:20px;" required>{{$dati_malf->descrizione_malfunzionamento}}</textarea>
                    @error('descrizione_malfunzionamento')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </fieldset>
                <input type="submit" class="form_btn" value="Modifica">
            </form>
        </div>
    </div>
@endsection

