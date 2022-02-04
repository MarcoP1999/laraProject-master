@extends('layouts.struttura')

@section('title', 'Gestione tecnici')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
    <li><a href="{{ route('showTecn') }}">Gestione tecnici</a></li>
@endsection

@section('content')
    <div id="container2">
        <!-- elenco tecnici -->
        <div id="contenuto_catalogo">
            <div class="header_org">
                @if($tecnici->total() != 1)
                    <h3>Lista tecnici ({{$tecnici->total()}} risultati)</h3>
                @else
                    <h3>Lista tecnici (1 risultato)</h3>
                @endif
            <div class="bottone_admin">
                <div class="bottone_prodotto">
                    <a href="{{route ('addTecn')}}"><button type="button" name="button" class="lgn_btn">Aggiungi tecnico accreditato</button></a>
                </div>
            </div>
            </div>
            <br><br><br>
            <ul>
               @foreach ($tecnici as $tecnico)
                <li id="elemento_lista">
                    <div class="testo_prodotto">
                        <h5>{{ $tecnico->username}}</h5>
                        <br>Nome: {{$tecnico->name}}
                        <br>Cognome: {{$tecnico->surname}}
                    </div>
                    <div class="options">
                        <h5>
                            <a style="color: #225bda" href="{{route ('modifyTecn',[$tecnico->id]) }}">Modifica</a>
                            <a href="{{route ('deleteTecn',[$tecnico->id]) }}" onclick="return confirm('Sei sicuro di voler eliminare il tecnico selezionato?')">Elimina</a>
                        </h5>
                    </div>
                </li>
                @endforeach
            </ul>
            @include ('pagination.paginator',['paginator' => $tecnici])
        </div>
        <!-- chiude elenco utenti -->
        <!-- FILTRI -->
        <div class="catalog">
            <aside id="sidebar">
                <div>
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
                    <hr>
                </div>
            </aside>
        </div>
        <!-- CHIUDE DIV CATALOG (FILTRI)-->
    </div>
@endsection
