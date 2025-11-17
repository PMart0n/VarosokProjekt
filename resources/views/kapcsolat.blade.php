@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Kapcsolat</h1>
    </header>

    <p>Kérdése van? Küldjön üzenetet az oldal üzemeltetőinek az alábbi űrlap segítségével.</p>

    <hr class="major" />

    <form method="post" action="#">
        @csrf
        
        <div class="row gtr-uniform">
            <div class="col-6 col-12-xsmall">
                <input type="text" name="nev" id="nev" value="" placeholder="Az Ön neve" />
            </div>
            
            <div class="col-6 col-12-xsmall">
                <input type="email" name="email" id="email" value="" placeholder="Email címe" />
            </div>
            
            <div class="col-12">
                <textarea name="szoveg" id="szoveg" placeholder="Írja ide az üzenetét..." rows="6"></textarea>
            </div>
            
            <div class="col-12">
                <ul class="actions">
                    <li><input type="submit" value="Üzenet Küldése" class="primary" /></li>
                    <li><input type="reset" value="Törlés" /></li>
                </ul>
            </div>
        </div>
    </form>
@endsection