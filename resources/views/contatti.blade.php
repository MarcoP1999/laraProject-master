@extends('layouts.struttura')

@section('title', 'Contatti e dove trovarci')

@section('breadcrumb')
<li><a href="{{ route('contatti')}}">Contatti e dove trovarci</a></li>
@endsection

@section('content')
<div id="container">
			<div class="presentazione">
				<br>
				<h3>Chi siamo?</h3>
				<h6>Sono Marco, studente di Ingegneria Informatica e dell'Automazione
					presso l'Università Politecnica delle Marche. Ho intrapreso un progetto che mi ha portato
					alla realizzazione di un sito per il supporto post-vendita per la risoluzione
                    dei malfunzionamenti dei prodotti di un azienda(in questo caso di elettrodomestici).
				</h6>
				<br>
                <h3>Centri assistenza convenzionati per il supporto post-vendita</h3>
                <h5>
                    <b>Sede:</b> via Trieste,25 - Ascoli Piceno<br>
                    <br>
                    <b>Sede:</b> via Villarey,4 - Ancona<br>
                    <br>
                    <b>Sede:</b> via L.Da Vinci,40 - Civitanova Marche
                </h5>
                <br>
            </div>
            <div class="presentazione">
                <br><h3>Informazioni sulla Facoltà( sede dell'Azienda)</h3>
                <h5>
                    <b>Sede:</b> via Brecce Bianche - Monte Dago - 60131 Ancona<br>
                    <br>
                    <b>Tel.:</b> +39 0712204708<br>
                    <br>
                    <b>Telefax:</b> +39 0712204708<br>
                    <br>
                    <b>e-mail:</b> <a href="mailto:presidenza.ingegneria@univpm.it">presidenza.ingegneria@univpm.it</a><br>
                    <br>
                </h5>
			</div>
			<div class="mappa">
				<iframe width="400" height="400"
					src="https://maps.google.com/maps?q=universita%20politecnica%20delle%20amrche%20ingegneria&t=k&z=17&ie=UTF8&iwloc=&output=embed"
					frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			</div>
		</div>
  @endsection
