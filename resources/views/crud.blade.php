@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Városok Kezelése (CRUD)</h1>
    </header>

    <p>Itt lehet új városokat felvenni, illetve a meglévő városok alapadatainak (név, típus, megye) módosítása és törlése.</p>

    <ul class="actions">
        <li><a href="{{ route('varosok.create') }}" class="button primary small">Új város hozzáadása</a></li>
    </ul>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Város Neve</th>
                    <th>Megye</th>
                    <th>Típus</th>
                    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                @foreach($varosok as $varos)
                    <tr>
                        <td>{{ $varos->id }}</td>
                        <td>{{ $varos->nev }}</td>
                        <td>{{ $varos->megye->nev ?? 'Nincs' }}</td>
                        <td>{{ $varos->megyeijogu ? 'Megyei jogú' : ($varos->megyeszekhely ? 'Megyeszékhely' : 'Város') }}</td>
                        <td>
                            <a href="{{ route('varosok.edit', $varos->id) }}" class="button small">Szerkesztés</a>
                            
                            <form action="{{ route('varosok.destroy', $varos->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="button small primary" style="background-color: #f56a6a; box-shadow:none;" onclick="return confirm('Biztosan törölni szeretné?')">Törlés</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        {{ $varosok->links() }}
    </div>
@endsection