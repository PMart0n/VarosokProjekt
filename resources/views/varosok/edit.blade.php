@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Város szerkesztése: {{ $varos->nev }}</h1>
    </header>

    <p><a href="{{ route('varosok.index') }}" class="button small">Vissza a listához</a></p>

    @if($errors->any())
        <div style="color: red; margin-bottom: 20px; border: 1px solid red; padding: 10px;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="post" action="{{ route('varosok.update', $varos->id) }}">
        @csrf
        @method('PUT') <div class="row gtr-uniform">
            
            <div class="col-6 col-12-xsmall">
                <label for="nev">Város neve</label>
                <input type="text" name="nev" id="nev" value="{{ old('nev', $varos->nev) }}" required />
            </div>

            <div class="col-6 col-12-xsmall">
                <label for="megyeid">Megye</label>
                <select name="megyeid" id="megyeid" required>
                    <option value="">- Válasszon megyét -</option>
                    @foreach($megyek as $megye)
                        <option value="{{ $megye->id }}" {{ $varos->megyeid == $megye->id ? 'selected' : '' }}>
                            {{ $megye->nev }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-6 col-12-small">
                <input type="checkbox" id="megyeszekhely" name="megyeszekhely" {{ $varos->megyeszekhely ? 'checked' : '' }}>
                <label for="megyeszekhely">Megyeszékhely</label>
            </div>
            <div class="col-6 col-12-small">
                <input type="checkbox" id="megyeijogu" name="megyeijogu" {{ $varos->megyeijogu ? 'checked' : '' }}>
                <label for="megyeijogu">Megyei jogú város</label>
            </div>

            <div class="col-12">
                <ul class="actions">
                    <li><input type="submit" value="Módosítások Mentése" class="primary" /></li>
                    <li><a href="{{ route('varosok.index') }}" class="button">Mégse</a></li>
                </ul>
            </div>
        </div>
    </form>
@endsection