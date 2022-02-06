@extends('layouts.struttura')

@section('title', 'Associa Staff a Prodotto')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
@endsection

@section('content')

    <div id="container2">
        <div id="contenuto_catalogo">
            <div class="header_org">
                @if($staff->total() != 1)
                    <h3>Lista staff ({{$staff->total()}} risultati)</h3>
                @else
                    <h3>Lista staff (1 risultato)</h3>
                @endif
            </div>
<br><br>
            <ul>
                @foreach ($staff as $staffazienda)
                    <li id="elemento_lista">
                        <div class="testo_prodotto">
                            <h5>{{ $staffazienda->username}}</h5>
                            <br>Nome: {{$staffazienda->name}}
                            <br>Cognome: {{$staffazienda->surname}}
                        </div>
                        <div class="options">
                            <h5>
                                <a href="{{route ('nuovoProdotto', [$staffazienda->id])}}">Associa</a>
                            </h5>
                        </div>
                    </li>
                @endforeach
            </ul>
            @include ('pagination.paginator',['paginator' => $staff])
        </div>
        <div class="catalog">
            <aside id="sidebar">
                <br>
                <div style="margin-left: 20px">
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
                <hr>
            </aside>
        </div>
    </div>
@endsection
