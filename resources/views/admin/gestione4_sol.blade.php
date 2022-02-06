@extends('layouts.struttura')

@section('title', 'Gestione Soluzioni Admin')

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
                <h3>Soluzioni</h3>
                <div class="bottone_admin">
                    <div class="bottone_prodotto">
                        <a href="{{route ('addSol4',[$id_malfunzionamento])}}"><button type="button" name="button" class="lgn_btn">Aggiungi Soluzione</button></a>
                    </div>
                </div>
            </div>
            <ul>
                <br><br><br>
                @foreach($soluzioni as $soluzione)

                    <li id="elemento_lista">
                        <h3>Soluzione</h3>
                        <div class="optionsUp">
                            <h5>
                                <a style="color: #225bda" href="{{route ('modifySol4', [$soluzione->solution_id]) }}">Modifica</a><br>
                                <a href="{{route ('deleteSol4', [$soluzione->solution_id])}}" onclick="return confirm('Sei sicuro di voler eliminare l\'elemento selezionato?')">Elimina</a>
                            </h5>
                        </div>
                        <div class="faqAdmin">
                            <br><h5><b>{{ $soluzione->descrizione_soluzione }}</b></h5>
                        </div>
                        @endforeach
                    </li>
        </div>
        </li>
        </ul>
    </div>
@endsection
