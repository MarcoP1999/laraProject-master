@extends('layouts.struttura')

@section('title', 'Modifica Prodotto')

@section('scripts')
    <script src="{{ asset('js/newProduct.js') }}" ></script>
    <script>
        $(function () {
            //action attivata
            var action = "{{ route('modProdotto') }}";
            //id form da validare
            var formId = 'form_mod';
            $(":input").on('blur', function (event) {
                //id elemento su cui ho perso il focus
                var elementId = $(this).attr('id');
                validaElem(elementId, action, formId);
            });
            $("#form_new").on('submit', function (event) {
                //blocco l'azione di submit e chiamo la funzione di validazione
                event.preventDefault();
                validaForm(action, formId);
            });
        });
    </script>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Area Admin</a></li>
    <li><a href="{{ route('modificaProdotto', $dati->product_id) }}">Modifica prodotto</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Modifica i dati dell'evento</h3>

            <div>
                <form enctype="multipart/form-data" id="form_mod" action="{{route('modProdotto')}}" method="post">
                    @csrf

                    <input value="{{$dati->product_id}}" type="hidden" id="product_id" name="product_id" required>
                    <br><br>
                    <label for="nome_e_codice"><h6>Nome Prodotto e Codice</h6></label>
                    <input value="{{$dati->nome_e_codice}}" type="text" id="nome_e_codice" name="nome_e_codice" required>
                    <ul class="invalid-feedback" id="err-nome_e_codice" role="alert"></ul>
                    <br><br>
                    <label for="descrizione"><h6>Descrizione</h6></label>
                    <textarea style="width:990px;height:120px;" type="text" id="descrizione" name="descrizione">{{$dati->descrizione}} </textarea>
                    <ul class="invalid-feedback" id="err-descrizione" role="alert"></ul>
                    <br><br>
                    <label for="modi_installazione"><h6>Modalità di Installazione</h6></label>
                    <textarea style="width:990px;height:120px;" type="text" id="modi_installazione" name="modi_installazione">{{$dati->modi_installazione}} </textarea>
                    <ul class="invalid-feedback" id="err-modi_installazione" role="alert"></ul>
                    <br><br>
                    <label for="note_buon_uso"><h6>Note di Buon Uso</h6></label>
                    <textarea style="width:990px;height:120px;" type="text" id="note_buon_uso" name="note_buon_uso">{{$dati->note_buon_uso}} </textarea>
                    <ul class="invalid-feedback" id="err-note_buon_uso" role="alert"></ul>
                    <br><br>
                    <label for="image_catalogo"><h6>Immagine Visualizzata nel Catalogo</h6></label>
                    <input value="{{$dati->image_catalogo}}" type="file" id="image_catalogo" name="image_catalogo">
                    <ul class="invalid-feedback" id="err-image_catalog" role="alert"></ul>
                    <br><br>


                    <input class="form_btn" type="submit" value="Modifica">
                </form>
            </div>
        </div>
    </div>

@endsection
