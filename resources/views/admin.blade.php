@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Adminisztrációs Felület</h1>
    </header>

    <p>Üdvözöljük az adminisztrátori vezérlőpulton.</p>

    <section>
        <div class="features">
            
            <article>
                <span class="icon fa-edit"></span>
                <div class="content">
                    <h3>Adatok Kezelése (CRUD)</h3>
                    <p>Városok, megyék és lélekszám adatok felvitele, módosítása és törlése az adatbázisból.</p>
                    <ul class="actions">
                        <li><a href="{{ route('crud') }}" class="button primary">Megnyitás</a></li>
                    </ul>
                </div>
            </article>

        </div>
    </section>
@endsection