@extends('layouts.struttura')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>$(function () {
var apri = $(".fa-angle-down");
var chiudi = $(".fa-angle-up");
var x = $(".testo_risposta");

apri.on('click', function (e) {
y=$(".fa-angle-down").index(this);
//fa comparire la risposta e la freccia in alto e fa scomparire quella in basso
x.eq(y).css('display', 'block');
chiudi.eq(y).css('display', 'block');
apri.eq(y).css('display', 'none');
});
chiudi.on('click', function (e) {
y=$(".fa-angle-up").index(this);
//fa scomparire la risposta e la freccia in alto e fa comparire quella in basso
x.eq(y).css('display', 'none');
apri.eq(y).css('display', 'block');
chiudi.eq(y).css('display', 'none');
});
    });</script>

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
