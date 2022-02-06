@extends('layouts.struttura')

@section('title', 'Nuovo prodotto')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Area organizzatori</a></li>
    <li><a href="{{ route('nuovoProdotto', [$id]) }}">Nuovo prodotto</a></li>
@endsection

@section('content')
    <div id="container2">
       <div class="form_dati">
        <h3>Crea nuovo evento</h3>

        <div>
            <form enctype="multipart/form-data" action="{{route('creaProdotto')}}" method="post">
                @csrf
                <label for="nome_e_codice"><h6>Nome e Codice prodotto</h6></label>
                <input type="text" id="nome_e_codice" name="nome_e_codice" value="{{old('nome_e_codice')}}" required>
                @error('nome_e_codice')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <br><br>
                <label for="descrizione"><h6>Descrizione</h6></label>
                <textarea style="width:990px;height:120px;" type="text" id="descrizione" name="descrizione">{{old('descrizione')}}</textarea>
                @error('descrizione')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <br><br>
                <label for="modi_installazione"><h6>Modalità di installazione</h6></label>
                <textarea style="width:990px;height:120px;" type="text" id="modi_installazione" name="modi_installazione">{{old('modi_installazione')}}</textarea>
                @error('indicazioni')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <br><br>
                <label for="note_buon_uso"><h6>Note Buon Uso</h6></label>
                <textarea style="width:990px;height:120px;" type="text" id="note_buon_uso" name="note_buon_uso">{{old('note_buon_uso')}}</textarea>
                @error('Note_buon_uso')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <br><br>
                <label for="image_catalogo"><h6>Immagine Catalogo</h6></label>
                <input type="file" id="image_catalogo" name="image_catalogo">
                @if ($errors->first('image_catalogo'))
                    <ul class="errors">
                        @foreach ($errors->get('image_catalogo') as $message)
                            <li>{{ $message }}</li>
                        @endforeach
                    </ul>
                @endif
                <br><br>
                <input type="hidden" name="id_utente" value="{{$id}}" required>
                <input class="form_btn" type="submit" value="Crea">
            </form>

        </div>
      </div>
    </div>

@endsection
