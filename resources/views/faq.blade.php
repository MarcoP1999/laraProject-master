@extends('layouts.struttura')

@section('title', 'FAQ')

@section('breadcrumb')
<li><a href="{{ route('faq')}}">FAQ</a></li>
@endsection
@section('scripts')
    <script src="{{asset('JS/faq.js')}}"></script>
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
          <div class="testo_domanda" style="display:flex;justify-content: space-around;flex-direction: column">
          <div> <h4>{{ $domanda->domanda }}</h4></div>
              <div> <i class="fa fa-angle-up" style="display:none"></i> <i class="fa fa-angle-down"></i></div>
            <br><h5 class="testo_risposta" style="display:none">{{ $domanda->risposta }}</h5>
          </div>
        </li>
      </ul>
            @endforeach
      </div>
    </div>
  @endsection
