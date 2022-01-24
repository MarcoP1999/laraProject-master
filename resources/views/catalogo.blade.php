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
                    <h4 style="margin: 10px auto auto 350px;">1 PRODOTTO</h4>
                @else
                    <h4 style="margin: 10px auto auto 350px;">{{ $prodotti->total() }} PRODOTTI</h4>
                @endif
                <ul>
                    <div style="display: none">{{ $i = 0 }}</div>
                    @foreach($prodotti as $prodotto)
                        <li id="elemento_lista">
                            <div class="riquadro_prodotto">
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
                    <form class="" action="{{ route('processForm') }}" method="post">
                        @csrf
                        <fieldset>
                            <legend>Descrizione dell'evento</legend>
                            <input @isset($filtri) value="{{ $filtri['descrizione'] }}" @endisset type="text" class="search-input" style="width: 200px" maxlength="50" name="descrizione" placeholder="Descrizione">
                        </fieldset>
                        <fieldset>
                            <button class="form_btn" type="submit">Applica</button>
                        </fieldset>

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                        <script>
                            $(function () {
                                $('#azzera').
                                    on('click', function() {
                                        $('input[name="descrizione"]').val('');
                                })
                            })
                        </script>
                    </form>
                </div>
            </aside>
        </div>
        <!-- CHIUDE DIV CATALOG (FILTRI)-->
    </div>
    <!-- CHIUDE SEZIONE FILTRI E CATALOGO (container2)-->
@endsection
