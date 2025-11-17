@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Elküldött Üzenetek</h1>
    </header>

    <p>Ezen az oldalon tekintheti meg a korábban elküldött üzeneteket.</p>

    <div class="table-wrapper">
        <table class="alt">
            <thead>
                <tr>
                    <th>Üzenet tartalma</th>
                    <th>Küldés ideje</th>
                </tr>
            </thead>
            <tbody>
                @forelse($uzenetek as $uzenet)
                    <tr>
                        <td>{{ $uzenet->szoveg }}</td>
                        
                        <td>{{ $uzenet->created_at->format('Y. m. d. H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" style="text-align:center;">
                            <i>Még nem küldött üzenetet.</i>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <ul class="actions">
        <li><a href="{{ route('kapcsolat') }}" class="button">Új üzenet írása</a></li>
    </ul>
@endsection