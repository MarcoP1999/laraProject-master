@extends('layouts.struttura')

@section('title', 'Modifica Soluzione Staff')

@section('breadcrumb')
    <li><a href="{{ route('staff_area') }}">Area staff</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Modifica Soluzione</h3>
            <form action="{{route('modifyDataSol3', [$dati_sol->solution_id])}}" method="post">
                @csrf
                <fieldset>
                    <label for="descrizione_soluzione"><h6>Descrizione</h6></label>
                    <textarea name="descrizione_soluzione" style="width:1126px;height:20px;" required>{{$dati_sol->descrizione_soluzione}}</textarea>
                    @error('descrizione_soluzione')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </fieldset>
                <input type="submit" class="form_btn" value="Modifica">
            </form>
        </div>
    </div>
@endsection

