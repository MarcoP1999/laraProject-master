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
                       <label for="n_tel"><h6>Numero di Telefono</h6></label>
                       <input type="n_tel" id="n_tel" name="n_tel" class="search-input" value="{{$dati_staff->n_tel}}" required>
                       <br><br>
                       @error('n_tel')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       <br>
                       @enderror
                       <label for="piva"><h6>Partita Iva</h6></label>
                       <input type="piva" id="piva" name="p_iva" class="search-input" value="{{$dati_staff->piva}}" required>
                       <br><br>
                       @error('piva')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       <br>
                       @enderror
                       <label for="password"><h6>Nuova password</h6></label>
                       <input type="password" minlength="8" id="password" name="password" class="search-input" value="">
                       <br>
                       @error('password')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       <br>
                       @enderror
                       <br>
                       <label for="password"><h6>Conferma nuova password</h6></label>
                       <input type="password" minlength="8" id="password_confirm" name="password_confirm" class="search-input" value="">
                       <br><br>
                       @error('password_confirm')
                       <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                       @enderror
                       <label for="email"><h6>E-Mail</h6></label>
                       <input type="email" id="email" name="email" class="search-input" value="{{$dati_staff->email}}" required>

                   </fieldset>
                   <input type="submit" class="form_btn" value="Modifica">
               </form>
           </div>
    </div>
@endsection
