@extends('layouts.struttura')

@section('title', 'Admin')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
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
                @if($prodotti->total() != 1)
                    <h3>Lista prodotti ({{$prodotti->total()}} risultati)</h3>
                @else
                    <h3>Lista prodotti (1 risultato)</h3>
                @endif
                <div class="bottone_admin">
                    <div class="bottone_prodotto" style="margin-right: 10px">
                        <a href="{{route ('nuovoProdotto')}}"><button type="button" name="button" class="lgn_btn">Crea nuovo Prodotto</button></a>
                    </div>
                </div>
            </div>
            <ul>
                @foreach($prodotti as $prodotto)
                    <li id="elemento_lista">
                        <div class="riquadro_concerto">
                            <div class=""> <img src="{{ asset('images/' . $prodotto->image_catalogo) }}" alt="" class="immagine_prodotto"> </div>
                            <div class="testo_concerto">
                                <h4>{{$prodotto->nome_e_codice}}</h4>
                                <!-- Titolo, Data, Luogo, Prezzo-->
                            </div>
                            <div class="options">
                                <h6>
                                    <a style="color: #225bda" href="{{route('modificaProdotto', [$prodotto->product_id])}}">Modifica</a>
                                    <a href="{{route ('cancellaProdotto',[$prodotto->product_id])}}" onclick="return confirm('Sei sicuro di voler eliminare il prodotto selezionato?')">Elimina</a>
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
                    <h3>Gestione</h3>
                    <div class="menu_admin">
                        <div class="menu">
                            <ul>
                                <li><a class="prova" href="{{ route ('showTecn') }}"><h6>Gestione tecnici</h6></a></li>
                                <li><a class="prova" href="{{ route ('showStaff') }}"><h6>Gestione staff azienda</h6></a></li>
                                <li><a class="prova" href="{{ route ('showFaqAdmin') }}"><h6>Modifica FAQ</h6></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

@endsection
