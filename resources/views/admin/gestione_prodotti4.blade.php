@extends('layouts.struttura')

@section('title', 'Gestione Prodotti Admin')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="catalog" style="height: 500px">
            <aside id="sidebar">
                <div style="margin-left: 20px">
                    <br>
                    <h3>Gestione</h3>
                    <div class="menu_admin">
                        <div class="menu">
                            <ul>
                                <li><a href="{{ route ('showTecn') }}"><h6>Gestione tecnici</h6></a></li>
                                <li><a href="{{ route ('showStaff') }}"><h6>Gestione staff azienda</h6></a></li>
                                <li><a href="{{ route ('showFaqAdmin') }}"><h6>Modifica FAQ</h6></a></li>
                                <li><a class="prova" href="{{ route ('gestione_prod4') }}"><h6>Malfunzionamenti e soluzioni</h6></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <div id="contenuto_catalogo">
            <div class="header_org">
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
                                    <a style="color: #225bda" href="{{route('gestione4', [$prodotto->product_id])}}">Gestione</a>
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
