@extends('layouts.struttura')

@section('title', 'Gestione prodotti Staff')

@section('breadcrumb')
    <li><a href="{{ route('staff_area') }}">Area staff</a></li>
@endsection
@section('content')
    <div id="container2" style=" height: 500px">
        <div class="page" style="height: 500px; overflow: scroll">
            <div class="header_org">
                <h3>Lista FAQ</h3>
                <div class="bottone_admin">
                    <div class="bottone_prodotto">
                        <a href="{{route ('addMalf3')}}"><button type="button" name="button" class="lgn_btn">Aggiungi Malfunzionamento</button></a>
                    </div>
                </div>
            </div>
            <ul>
                <br><br><br>
                @for($i=0;$i<count($malfunzionamenti);$i++)
                    <h3>Malfunzionamento</h3>
                    <li id="elemento_lista">
                        <div class="optionsUp">
                            <h5>
                                <a style="color: #225bda" href="{{route ('modifyMalf3', [$malfunzionamenti[$i]->malfunction_id]) }}">Modifica</a><br>
                                <a style="color: #17b483" href="{{route ('addFaq')}}">Aggiungi soluzione</a><br>
                                <a href="{{route ('deleteMalf3', [$malfunzionamenti[$i]->malfunction_id])}}" onclick="return confirm('Sei sicuro di voler eliminare l\'elemento selezionato?')">Elimina</a>
                            </h5>
                        </div>
                        <div class="faqAdmin">
                            <br><h5 style="padding-left: 0px"><b>{{ $malfunzionamenti[$i]->descrizione_malfunzionamento }}</b></h5>
                            @php $soluzione=$soluzioni[$i+1]@endphp
                            @foreach($soluzione as $desc_soluzione)
                                <h3>Soluzione</h3>
                    <li id="elemento_lista" style="padding-right: 100px">
                        <div class="optionsUp">
                            <h5>
                                <a style="color: #225bda" href="{{route ('modifyFaq', [$desc_soluzione->solution_id]) }}">Modifica</a><br>
                                <a href="{{route ('deleteFaq', [$desc_soluzione->solution_id])}}" onclick="return confirm('Sei sicuro di voler eliminare l\'elemento selezionato?')">Elimina</a>
                            </h5>
                        </div>
                        <br><h5 style="padding-left: 0px"><b>{{ $desc_soluzione->descrizione_soluzione}}</b></h5>
                        @endforeach
                        @endfor
                    </li>
        </div>
        </li>
        </ul>
    </div>
@endsection
