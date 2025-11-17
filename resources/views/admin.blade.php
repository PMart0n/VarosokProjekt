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
                    <h3>Városok Kezelése (CRUD)</h3>
                    <p>Új városok felvétele, meglévő városok alapadatainak (név, típus, megye) módosítása és törlése.</p>
                    <ul class="actions">
                        <li><a href="{{ route('crud') }}" class="button primary">Megnyitás</a></li>
                    </ul>
                </div>
            </article>

        </div>
    </section>
@endsection