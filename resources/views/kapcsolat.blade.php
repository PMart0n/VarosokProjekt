@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Kapcsolat</h1>
    </header>

    <p>Kérdése van? Küldjön üzenetet az oldal üzemeltetőinek az alábbi űrlap segítségével.</p>

    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 15px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #c3e6cb;">
            <strong>Siker!</strong> {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 15px; margin-bottom: 20px; border-radius: 5px; border: 1px solid #f5c6cb;">
            <ul style="margin-bottom: 0;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <hr class="major" />

    <form method="post" action="{{ route('kapcsolat.store') }}">
        @csrf
        
        <div class="row gtr-uniform">
            <div class="col-6 col-12-xsmall">
                <input type="text" name="nev" id="nev" value="{{ old('nev') }}" placeholder="Az Ön neve" />
            </div>
            
            <div class="col-6 col-12-xsmall">
                <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="Email címe" />
            </div>
            
            <div class="col-12">
                <textarea name="szoveg" id="szoveg" placeholder="Írja ide az üzenetét..." rows="6">{{ old('szoveg') }}</textarea>
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