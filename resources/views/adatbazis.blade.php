@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Adatbázis</h1>
    </header>

    <p>Az alábbi táblázat a rendszerben tárolt városok, megyék és népességi adatok összekapcsolt listáját mutatja.</p>

    <div class="table-wrapper">
        <table class="alt">
            <thead>
                <tr>
                    <th>Város Neve</th>
                    <th>Megye</th>
                    <th>Típus</th>
                    <th>Népesség (fő)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Budapest</td>
                    <td>Pest</td>
                    <td>Főváros</td>
                    <td>1 700 000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Összesen megjelenítve: 1 adat (Minta)</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection