@extends('layouts.struttura')

@section('title', 'Admin')

@section('breadcrumb')
    <li><a href="{{ route('admin') }}">Admin</a></li>
@endsection

@section('content')

    <div id="container2">
        <div class="catalog">
            <aside id="sidebar">
                <div style="margin-left: 20px">
                    <br>
                    <h3>Gestione</h3>
                    <div class="menu_admin">
                        <div class="menu">
                            <ul>
                                <li><a class="prova" href="{{ route ('showTecn') }}"><h6>Gestione tecnici</h6></a></li>
                                <li><a class="prova" href="{{ route ('showStaff') }}"><h6>Gestione staff azienda</h6></a></li>
                                <li><a class="prova" href="{{ route ('showFaqAdmin') }}"><h6>Modifica FAQ</h6></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

@endsection
