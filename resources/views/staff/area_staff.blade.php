@extends('layouts.struttura')

@section('title', 'Area staff')

@section('breadcrumb')
    <li><a href="{{ route('staff_area') }}">Area staff</a></li>
@endsection


@section('content')
    <div id="container2">
        <div id="contenuto_catalogo">
            <div class="header_staff">
                @if($prodotti->total() != 1)
                    <h3>Lista prodotti ({{$prodotti->total()}} risultati)</h3>
                @else
                    <h3>Lista prodotti (1 risultato)</h3>
                @endif
            </div>
            <br><br>
            <ul>
                @foreach($prodotti as $prodotto)
                    <li id="elemento_lista">
                        <div class="riquadro_concerto">
                            <div class=""> <img src="{{ asset('images/' . $prodotto->image_catalogo) }}" alt="" class="immagine_prodotto"> </div>
                            <div class="testo_concerto">
                                <h4>{{$prodotto->nome_e_codice}}</h4>
                            </div>
                            <div class="options">
                                <h6>
                                    <a style="color: #225bda" href="{{route('gestione3', [$prodotto->product_id])}}">Gestione</a>
                                </h6>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            @include('pagination.paginator', ['paginator' => $prodotti])
        </div>
        <div class="catalog">
            <aside id="sidebar">
                <div style="margin-left: 20px">
                    <br>
                </div>
            </aside>
        </div>
    </div>

@endsection
