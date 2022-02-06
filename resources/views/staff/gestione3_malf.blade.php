@extends('layouts.struttura')

@section('title', 'Gestione Malfunzionamenti Staff')

@section('breadcrumb')
    <li><a href="{{ route('staff_area') }}">Area Staff</a></li>
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
                        <a href="{{route ('addMalf3',[$id_prodotto])}}"><button type="button" name="button" class="lgn_btn">Aggiungi Malfunzionamento</button></a>
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
                                <a style="color: #225bda" href="{{route ('modifyMalf3', [$malfunzionamento->malfunction_id]) }}">Modifica</a><br>
                                <a style="color: #17b483" href="{{route ('gestSol3',[$malfunzionamento->malfunction_id])}}">Soluzioni</a><br>
                                <a href="{{route ('deleteMalf3', [$malfunzionamento->malfunction_id])}}" onclick="return confirm('Sei sicuro di voler eliminare l\'elemento selezionato?')">Elimina</a>
                            </h5>
                        </div>
                        <div class="faqAdmin">
                            <br><h5><b>{{ $malfunzionamento->descrizione_malfunzionamento }}</b></h5>
                        </div>
                        @endforeach
                    </li>
            </ul>
        </div>


    </div>
@endsection
