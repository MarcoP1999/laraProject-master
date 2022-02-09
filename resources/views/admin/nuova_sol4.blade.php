@extends('layouts.struttura')

@section('title', 'Aggiungi Soluzione Admin')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
    <li><a href="{{ route('gestione_prod4') }}">Malfunzionamenti</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Aggiungi Soluzione</h3>
            <form method="POST" action="{{ route('addNewSol4') }}">
                @csrf
                <fieldset>
                    <label for="descrizione_soluzione"><h6>Descrizione</h6></label>
                    <textarea name="descrizione_soluzione" style="width:1126px;height:20px;" value="" required></textarea>
                    <input type="hidden" name="id_malfunzionamento" value="{{$id_malfunzionamento}}" required>
                    @error('descrizione_soluzione')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </fieldset>
                <input type="submit" class="form_btn" value="Aggiungi">
            </form>
        </div>
    </div>
@endsection
