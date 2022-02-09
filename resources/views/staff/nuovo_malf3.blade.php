@extends('layouts.struttura')

@section('title', 'Aggiungi Malfunzionamento Staff')

@section('breadcrumb')
    <li><a href="{{ route('staff_area') }}">Area staff</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Aggiungi Malfunzionamento</h3>
            <form method="POST" action="{{ route('addNewMalf3') }}">
                @csrf
                <fieldset>
                    <label for="descrizione_malfunzionamento"><h6>Descrizione</h6></label>
                    <textarea name="descrizione_malfunzionamento" style="width:1126px;height:20px;" value="" required></textarea>
                    <input type="hidden" name="id_prodotto" value="{{$id_prodotto}}" required>
                </fieldset>
                <input type="submit" class="form_btn" value="Aggiungi">
            </form>
        </div>
    </div>
@endsection
