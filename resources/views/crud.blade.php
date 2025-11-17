@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Városok Kezelése (CRUD)</h1>
    </header>

    <p>Itt lehet új városokat felvenni, illetve az "Adatbázis" menüpontban megjelenő adatokat módosítani.</p>

    <ul class="actions">
        <li><a href="#" class="button primary small">Új város hozzáadása</a></li>
    </ul>

    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Város Neve</th>
                    <th>Megye</th>
                    <th>Típus</th>       <th>Népesség</th>    <th>Műveletek</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Debrecen</td>
                    <td>Hajdú-Bihar</td>
                    <td>Megyeszékhely</td>
                    <td>200 000</td>
                    <td>
                        <a href="#" class="button small">Szerkesztés</a>
                        <a href="#" class="button small" style="color: #f56a6a;">Törlés</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Szeged</td>
                    <td>Csongrád-Csanád</td>
                    <td>Megyeszékhely</td>
                    <td>160 000</td>
                    <td>
                        <a href="#" class="button small">Szerkesztés</a>
                        <a href="#" class="button small" style="color: #f56a6a;">Törlés</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection