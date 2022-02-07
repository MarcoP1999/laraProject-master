@extends('layouts.struttura')

@section('title', 'Catalogo')

@section('breadcrumb')
    <li><a href="{{ route('showCatalog') }}">Catalogo</a></li>
@endsection

@section('content')

    <div id="container2">

        <!-- CATALOGO -->
                <div id="contenuto_catalogo">
                @if($prodotti->total() == 1)
                    <h4 style="margin: 10px auto auto 350px;">1 PRODOTTO </h4>
                @else
                    <h4 style="margin: 10px auto auto 350px;">{{ $prodotti->total() }} PRODOTTI</h4>
                @endif
                <ul>
                    @foreach($prodotti as $prodotto)
                        <li id="elemento_lista">
                            <div class="riquadro_prodotto">
                                <img src="{{ asset('images/' . $prodotto->image_catalogo) }}" alt="" class="immagine_prodotto" style="height: 100px; width: 100px; ">
                                <div class="testo_prodotto">
                                    <h4>{{ $prodotto->nome_e_codice }}</h4>
                                    <!-- Titolo, Data, Luogo, Prezzo-->
                                </div>
                                <div class="bottone_dettagli">
                                    <a href=" {{ route('productDetails', [$prodotto->product_id]) }}"><button name="button" class="lgn_btn">Dettagli</button></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            <!--Paginazione-->
                @include('pagination.paginator', ['paginator' => $prodotti])
        </div>

        <!-- FILTRI -->
        <div class="catalog">
            <aside id="sidebar">
                <div style="margin-left: 10px">
                    <br>
                    <h3>Ricerca</h3>
                    <form class="" action="{{ route('showFilteredCatalog') }}" method="get">
                        @csrf
                        <fieldset>
                            <legend>Descrizione del prodotto</legend>
                            @isset($request->descrizione)
                            <textarea    type="text" class="search-input" style="width: 200px; height:120px; resize: none" maxlength="1000" name="descrizione" placeholder="Descrizione">{{$request->descrizione}}</textarea>
                            @endisset
                            @empty($request->descrizione)
                            <textarea    type="text" class="search-input" style="width: 200px; height:120px; resize: none" maxlength="1000" name="descrizione" placeholder="Descrizione"></textarea>
                            @endempty
                        </fieldset>
                        <fieldset>
                            <button class="form_btn" type="submit">Applica</button>
                        </fieldset>
                    </form>
                </div>
            </aside>
        </div>
        <!-- CHIUDE DIV CATALOG (FILTRI)-->
    </div>
    <!-- CHIUDE SEZIONE FILTRI E CATALOGO (container2)-->
@endsection
