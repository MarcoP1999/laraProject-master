@extends('layouts.struttura')

@section('title', 'Gestione Soluzioni Staff')

@section('breadcrumb')
    <li><a href="{{ route('staff_area') }}">Area Staff</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="catalog" style="height: 500px">
            <aside id="sidebar">
            </aside>
        </div>
        <div class="page" style="height: 500px; overflow: scroll">
            <div class="header_org">
                <h3>Soluzioni</h3>
                <div class="bottone_admin">
                    <div class="bottone_prodotto">
                        <a href="{{route ('addSol3',[$id_malfunzionamento])}}"><button type="button" name="button" class="lgn_btn">Aggiungi Soluzione</button></a>
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
                                <a style="color: #225bda" href="{{route ('modifySol3', [$soluzione->solution_id]) }}">Modifica</a><br>
                                <a href="{{route ('deleteSol3', [$soluzione->solution_id])}}" onclick="return confirm('Sei sicuro di voler eliminare l\'elemento selezionato?')">Elimina</a>
                            </h5>
                        </div>
                        <div class="faqAdmin">
                            <br><h5><b>{{ $soluzione->descrizione_soluzione }}</b></h5>
                        </div>
                        @endforeach
                    </li>
            </ul>
        </div>

    </div>
@endsection
