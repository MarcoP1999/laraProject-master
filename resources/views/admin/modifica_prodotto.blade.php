@extends('layouts.struttura')

@section('title', 'Modifica prodotto')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Area Admin</a></li>
    <li><a href="{{ route('modificaProdotto', $dati->product_id) }}">Modifica prodotto</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Modifica i dati dell'evento</h3>

            <div>
                <form enctype="multipart/form-data" action="{{route('modProdotto')}}" method="post">
                    @csrf

                    <input value="{{$dati->product_id}}" type="hidden" id="product_id" name="product_id" required>
                    <br><br>
                    <label for="nome_e_codice"><h6>Nome Prodotto e Codice</h6></label>
                    <input value="{{$dati->nome_e_codice}}" type="text" id="nome_e_codice" name="nome_e_codice" required>
                    @error('nome_e_codice')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="descrizione"><h6>Descrizione</h6></label>
                    <textarea style="width:990px;height:120px;" type="text" id="descrizione" name="descrizione">{{$dati->descrizione}} </textarea>
                    @error('descrizione')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="modi_installazione"><h6>Modalità di Installazione</h6></label>
                    <textarea style="width:990px;height:120px;" type="text" id="modi_installazione" name="modi_installazione">{{$dati->modi_installazione}} </textarea>
                    @error('modi_installazione')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="note_buon_uso"><h6>Note di Buon Uso</h6></label>
                    <textarea style="width:990px;height:120px;" type="text" id="norme_buon_uso" name="norme_buon_uso">{{$dati->note_buon_uso}} </textarea>
                    @error('note_buon_uso')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                    <br><br>
                    <label for="image_catalogo"><h6>Immagine Visualizzata nel Catalogo</h6></label>
                    <input value="{{$dati->image_catalogo}}" type="file" id="image_catalogo" name="image_catalogo">
                    @if ($errors->first('image_catalogo'))
                        <ul class="errors">
                            @foreach ($errors->get('image_catalogo') as $message)
                                <li>{{ $message }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <br><br>


                    <input class="form_btn" type="submit" value="Modifica">
                </form>
            </div>
        </div>
    </div>

@endsection
