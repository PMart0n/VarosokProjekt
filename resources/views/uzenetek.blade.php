@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Elküldött Üzenetek</h1>
    </header>

    <p>Ezen az oldalon tekintheti meg a korábban elküldött üzeneteit.</p>

    <div class="table-wrapper">
        <table class="alt">
            <thead>
                <tr>
                    <th>Üzenet tartalma</th>
                    <th>Küldés ideje</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="2" style="text-align:center;">
                        <i>(Az Ön által küldött üzenetek listája itt fog megjelenni)</i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection