@extends('layouts.struttura')

@section('title', 'Modifica dati tecnico')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
    <li><a href="{{ route('showTecn') }}">Gestione tecnico accreditato</a></li>
    <li><a href="{{ route('modifyDataTecn', [$dati_tecnico->id]) }}">Modifica dati</a></li>
@endsection

@section('content')
    <div id="container2">
        <div class="form_dati">
            <h3>Modifica dati di un tecnico accreditato</h3>
            <form class="form_style" action="{{route('modifyDataTecn', [$dati_tecnico->id])}}" method="post">
                @csrf
                <fieldset>
                    <label for="username"><h6>Username</h6></label>
                    <input type="text" id="username" name="username" class="search-input" value="{{$dati_tecnico->username}}" required>
                    <br><br>
                    <label for="email"><h6>E-Mail</h6></label>
                    <input type="email" id="email" name="email" class="search-input" value="{{$dati_tecnico->email}}" required>
                </fieldset>
                <input type="submit" class="form_btn" value="Modifica">
            </form>
        </div>
    </div>
@endsection
