@extends('layouts.struttura')

@section('title', 'Nuovo prodotto')

@section('scripts')
    <script src="{{ asset('js/newProduct.js') }}" ></script>
    <script>
        $(function () {
            //action attivata
            var action = "{{ route('creaProdotto') }}";
            //id form da validare
            var formId = 'form_new';
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
    <li><a href="{{ route('assStaff') }}">Associa</a></li>
    <li><a href="{{ route('nuovoProdotto', [$id]) }}">Nuovo prodotto</a></li>
@endsection

@section('content')
    <div id="container2">
       <div class="form_dati">
        <h3>Crea nuovo evento</h3>

        <div>
            <form enctype="multipart/form-data" id="form_new" action="{{route('creaProdotto')}}" method="post">
                @csrf
                <label for="nome_e_codice"><h6>Nome prodotto</h6></label>
                <input type="text" id="nome_e_codice" name="nome_e_codice" value="{{old('nome_e_codice')}}" >
                <ul class="invalid-feedback" id="err-nome_e_codice" role="alert"></ul>
                <br>
                <label for="descrizione"><h6>Descrizione</h6></label>
                <textarea style="width:990px;height:120px;" type="text" id="descrizione" name="descrizione">{{old('descrizione')}}</textarea>
                <ul class="invalid-feedback" id="err-descrizione" role="alert"></ul>
                <br>
                <label for="modi_installazione"><h6>Modalità di installazione</h6></label>
                <textarea style="width:990px;height:120px;" type="text" id="modi_installazione" name="modi_installazione">{{old('modi_installazione')}}</textarea>
                <ul class="invalid-feedback" id="err-modi_installazione" role="alert"></ul>
                <br>
                <label for="note_buon_uso"><h6>Note Buon Uso</h6></label>
                <textarea style="width:990px;height:120px;" type="text" id="note_buon_uso" name="note_buon_uso">{{old('note_buon_uso')}}</textarea>
                <ul class="invalid-feedback" id="err-note_buon_uso" role="alert"></ul>
                <br>
                <label for="image_catalogo"><h6>Immagine Catalogo</h6></label>
                <input type="file" id="image_catalogo" name="image_catalogo">
                <ul class="invalid-feedback" id="err-image_catalogo" role="alert"></ul>
                <br>
                <input type="hidden" name="id_utente" value="{{$id}}" required>
                <input class="form_btn" type="submit" value="Crea">
            </form>

        </div>
      </div>
    </div>

@endsection
