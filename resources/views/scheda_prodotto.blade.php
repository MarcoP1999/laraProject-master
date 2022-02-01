@extends('layouts.struttura')

@section('title', 'Prodotto')

@section('breadcrumb')
    <li><a href="{{ route('showCatalog') }}">Catalogo</a></li>
    <li><a href="{{ route('productDetails', [$prodotto[0]->product_id]) }}">Prodotto</a></li>
@endsection

@section('content')

    <!-- INFO -->
    <div id="container">
        <div class="titolo_scheda">
            <br><h1 style="padding-left: 0px"><b>{{ $prodotto[0]->nome_e_codice }}</b></h1>
        </div>
        <div class="info_acquista">
            <div class="info_prodotto">
                <img src="{{ asset('images/' . $prodotto[0]->image_catalogo) }}" alt="" class="immagine_prodotto">
                <h5 style="width: 300px">
                    <b>Descrizione prodotto:</b> {{ $prodotto[0]->descrizione }}
                </h5>
                <br>
            </div>
        </div>
        <br>
        <div class="presentazione">
            <div class="descrizione_prodotto">
                <h3>Note di buon uso</h3>
                <h6>{{ $prodotto[0]->note_buon_uso }}</h6>
                <ul>
                    <li><h4>Informazioni per l'installazione:</h4></li>
                    <h6>{{ $prodotto[0]->modi_installazione}}</h6>
                </ul>
            </div>
        </div>
        @auth
            <div class="malfunzionamenti_e_soluzioni">
                <div class="malfunzionamenti">
                    <h3>Malfunzionamenti</h3>
                        @for($i=0;$i<count($malfunzionamenti);$i++)
                            <br><h5 style="padding-left: 0px"><b>{{ $malfunzionamenti[$i]->descrizione_malfunzionamento }}</b></h5>
                               @php $soluzione=$soluzioni[$i+1]@endphp
                                @foreach($soluzione as $desc_soluzione)
                            <br><h5 style="padding-left: 0px"><b>{{ $desc_soluzione->descrizione_soluzione}}</b></h5>
                                @endforeach

                        @endfor
                </div>
            </div>
        @endauth
    </div>
@endsection
