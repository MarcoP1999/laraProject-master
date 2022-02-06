@extends('layouts.struttura')

@section('title', 'Gestione Malfunzionamenti Admin')

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
        <div class="page" style="height: 500px; overflow: scroll">
            <div class="header_org">
                <h3>Lista Malfunzionamenti</h3>
                <div class="bottone_admin">
                    <div class="bottone_prodotto">
                        <a href="{{route ('addMalf4',[$id_prodotto])}}"><button type="button" name="button" class="lgn_btn">Aggiungi Malfunzionamento</button></a>
                    </div>
                </div>
            </div>
            <ul>
                <br><br><br>
                @foreach($malfunzionamenti as $malfunzionamento)

                    <li id="elemento_lista">
                        <h3>Malfunzionamento</h3>
                        <div class="optionsUp">
                            <h5>
                                <a style="color: #225bda" href="{{route ('modifyMalf4', [$malfunzionamento->malfunction_id]) }}">Modifica</a><br>
                                <a style="color: #17b483" href="{{route ('gestSol4',[$malfunzionamento->malfunction_id])}}">Soluzioni</a><br>
                                <a href="{{route ('deleteMalf4', [$malfunzionamento->malfunction_id])}}" onclick="return confirm('Sei sicuro di voler eliminare l\'elemento selezionato?')">Elimina</a>
                            </h5>
                        </div>
                        <div class="faqAdmin">
                                <br><h5><b>{{ $malfunzionamento->descrizione_malfunzionamento }}</b></h5>
                            </div>
                                @endforeach
                        </li>
                        </div>
                    </li>
            </ul>
        </div>
@endsection
