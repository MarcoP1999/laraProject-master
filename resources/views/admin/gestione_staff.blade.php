@extends('layouts.struttura')

@section('title', 'Gestione staff aziendale')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
    <li><a href="{{ route('showStaff') }}">Gestione staff azienda</a></li>
@endsection

@section('content')

    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
            alert(msg);
        }
    </script>

    <div id="container2">
    <div id="contenuto_catalogo">
        <div class="header_org">
            @if($staff->total() != 1)
            <h3>Lista staff ({{$staff->total()}} risultati)</h3>
            @else
            <h3>Lista staff (1 risultato)</h3>
            @endif
            <div class="bottone_admin">
                <div class="bottone_prodotto">
                    <a href="{{route ('addStaff')}}"><button type="button" name="button" class="lgn_btn">Aggiungi componente staff</button></a>
                </div>
            </div>
        </div>

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
                        <a style="color: #225bda" href="{{route ('modifyStaff',[$staffazienda->id]) }}">Modifica</a>
                        <a href="{{route ('deleteStaff',[$staffazienda->id]) }}" onclick="return confirm('Sei sicuro di voler eliminare il componente dello staff selezionato?')">Elimina</a>
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
                        </ul>
                    </div>
                </div>
            </div>
            <hr>
        </aside>
    </div>
    </div>
@endsection
