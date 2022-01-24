@extends('layouts.struttura')

@section('title', 'Modifica dati staff')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
    <li><a href="{{ route('showStaff') }}">Gestione staff aziendale</a></li>
    <li><a href="{{ route('modifyDataStaff', [$dati_staff->id]) }}">Modifica dati</a></li>
@endsection

@section('content')
    <div id="container2">
           <div class="form_dati">
             <h3>Modifica dati componente staff</h3>
               <form class="form_style" action="{{route('modifyDataStaff', [$dati_staff->id])}}" method="post">
                   @csrf
                   <fieldset>
                       <label for="username"><h6>Username</h6></label>
                       <input type="text" id="username" name="username" class="search-input" value="{{$dati_staff->name}}" required>
                       <br><br>
                       <label for="email"><h6>E-Mail</h6></label>
                       <input type="email" id="email" name="email" class="search-input" value="{{$dati_staff->email}}" required>
                   </fieldset>
                   <input type="submit" class="form_btn" value="Modifica">
               </form>
           </div>
    </div>
@endsection
