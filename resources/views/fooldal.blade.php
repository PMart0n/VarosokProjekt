@extends('layouts.app')

@section('content')
    <span class="image main">
        <img src="{{ asset('images/varos_kep.jpg') }}" alt="Városkép" />
    </span>

    <header class="main">
        <h1>Városok</h1>
    </header>

    <p>Hazánkban a városok száma 1990-től dinamikusan emelkedett, 2019-re megközelítette a 350-et. A várossá nyilvánítás szabályai 2015-ben jelentősen szigorodtak, így a közeljövőben kevés település kaphat városi rangot.</p>
    
    <p>Az adatbázis a jelenlegi városok és Budapest kerületeinek néhány adatát tárolja. A városok lélekszámát a várossá nyilvánítás évét követő évtől évente tartalmazza.</p>

    <ul class="actions">
        <li><a href="{{ route('adatbazis') }}" class="button big">Adatok megtekintése</a></li>
    </ul>
@endsection