@extends('layouts.struttura')

@section('title', 'Gestione prodotti Staff')

@section('breadcrumb')
    <li><a href="{{ route('staff_area') }}">Area staff</a></li>
@endsection
@section('content')
    <div id="container2">
        @foreach($info as $malfunzionamento)
        <h1>{{$malfunzionamento}}</h1>
        @endforeach

    </div>

@endsection
