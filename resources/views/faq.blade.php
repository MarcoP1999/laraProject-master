@extends('layouts.struttura')

@section('title', 'FAQ')

@section('breadcrumb')
<li><a href="{{ route('faq')}}">FAQ</a></li>
@endsection

@section('content')
<!-- CONTENUTO FAQ -->
    <div id="container2">
        <br>
        <div id="info">
      <h3 id="faq">Domande frequenti (FAQ)</h3><br>
            @foreach($faq as $domanda)
      <ul>
        <li id="domanda">
          <div class="testo_domanda">
            <h4>{{ $domanda->domanda }}</h4>
            <br><h5>{{ $domanda->risposta }}</h5>
          </div>
        </li>
      </ul>
            @endforeach
      </div>
    </div>
  @endsection
