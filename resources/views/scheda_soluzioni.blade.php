@extends('layouts.struttura')

@section('title', 'Soluzioni')

@section('breadcrumb')
    <li><a href="{{ route('showCatalog') }}">Catalogo</a></li>
@endsection

@section('content')
    <!-- INFO -->
    <div id="container2">
        <br>
        <div id="info">
        @auth
    <div class="malfunzionamenti_e_soluzioni" style="height: 403px; overflow: scroll">
        <h3>Soluzioni</h3>
        @foreach($soluzioni as $soluzione)
            <br><h5 style="padding-left: 10px"><b>{{ $soluzione->descrizione_soluzione }}</b></h5>
        @endforeach
    </div>
        </div>
    </div>
@endauth
@endsection
