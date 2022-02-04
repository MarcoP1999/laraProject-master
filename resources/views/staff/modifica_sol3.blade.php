@extends('layouts.struttura')

@section('title', 'Modifica soluzione Staff')

@section('breadcrumb')
    <li><a href="{{ route('staff_area') }}">Area staff</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Modifica FAQ</h3>
            <form action="{{route('modifyDataFaq', [$dati_faq->solution_id])}}" method="post">
                @csrf
                <fieldset>
                    <label for="domanda"><h6>Descrizione</h6></label>
                    <textarea name="domanda" style="width:1126px;height:20px;" required>{{$dati_faq->descrizione_soluzione}}</textarea>
                </fieldset>
                <input type="submit" class="form_btn" value="Modifica">
            </form>
        </div>
    </div>
@endsection

