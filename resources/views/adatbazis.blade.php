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
               @foreach ($varosok as $varos)
                    @php
                        // Típus
                        if ($varos->megyeszekhely) {
                            $tipus = 'Megye székhely';
                        } elseif ($varos->megyeijogu) {
                            $tipus = 'Megyei jogú város';
                        } else {
                            $tipus = 'Város';
                        }

                        // Népesség (első adat, ha létezik)
                        $nepesseg = $varos->lelekszams->first()->osszesen ?? '—';
                    @endphp

                    <tr>
                        <td>{{ $varos->nev }}</td>
                        <td>{{ $varos->megye->nev ?? '—' }}</td>
                        <td>{{ $tipus }}</td>
                        <td>{{ $nepesseg }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4">Összesen megjelenítve: {{$varos->count()}} adat</td>
                </tr>
            </tfoot>
        </table>
    </div>
@endsection