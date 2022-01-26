@extends('layouts.struttura')

@section('title', 'Prodotto')

@section('breadcrumb')
    <li><a href="{{ route('showCatalog') }}">Catalogo</a></li>
    <li><a href="{{ route('productDetails', [$prodotto->product_id]) }}">Prodotto</a></li>
@endsection

@section('content')

    <!-- INFO -->
    <div id="container">
        <div class="titolo_scheda">
            <br><h1 style="padding-left: 0px"><b>{{ $prodotto->nome_e_codice }}</b></h1>
        </div>
        <div class="info_acquista">
            <div class="info_prodotto">
                <img src="{{ asset('images/' . $prodotto->image_catalogo) }}" alt="" class="immagine_prodotto">
                <h5 style="width: 300px">
                    <b>Descrizione prodotto:</b> {{ $prodotto->descrizione }}
                </h5>
                <br>
            </div>
        </div>
        <br>
        <div class="presentazione">
            <div class="descrizione_prodotto">
                <h3>Note di buon uso</h3>
                <h6>{{ $prodotto->note_buon_uso }}</h6>
                <ul>
                    <li><h4>Informazioni per l'installazione:</h4></li>
                    <h6>{{ $prodotto->modi_installazione}}</h6>
                </ul>
            </div>
        </div>
        @auth
            <div class="malfunzionamenti e soluzioni">
                <div class="malfunzionamenti">
                    <h3>Malfunzionamenti</h3>
                </div>
                <div class="soluzioni">
                    <h3>Soluzioni</h3>
                </div>
            </div>
        @endauth
    </div>
@endsection
