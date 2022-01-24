@extends('layouts.struttura')

@section('title', 'Evento')

@section('breadcrumb')
<li><a href="{{ route('showCatalog') }}">Catalogo</a></li>
<li><a href="{{ route('eventDetails', [$evento->event_id]) }}">Evento</a></li>
@endsection

@section('content')

<!-- INFO -->
<div id="container">
    <div class="titolo_scheda">
        <br><h1 style="padding-left: 0px"><b>{{ $evento->artista }}</b></h1>
    </div>
    <div class="info_acquista">
        <div class="info_prodotto">
            <img src="{{ asset('images/' . $evento->image_catalogo) }}" alt="" class="immagine_prodotto">
            <h5 style="width: 300px">
                <b>Descrizione prodotto:</b> {{ $evento->descrizione }}
            </h5>
            <br>
        </div>
    </div>
    <br>
    <div class="presentazione">
                <div class="descrizione_prodotto">
            <h3>Note di buon uso</h3>
            <h6>{{ $evento->descrizione }}</h6>
            <ul>
                <li><h4>Informazioni per l'installazione:</h4></li>
                <h6>{{ $evento->programma }}</h6>
            </ul>
        </div>
    </div>
</div>
@endsection
