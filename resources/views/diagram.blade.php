@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Statisztika</h1>
    </header>

    <p>Ezen az oldalon a rendszerben tárolt adatok grafikus ábrázolása látható.</p>

    <div class="box">
        <canvas id="myChart" style="width:100%; max-height:500px;"></canvas>
        <p style="text-align:center; margin-top: 20px;"><i>(A diagram kirajzolása)</i></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Ide jön majd a Javascript kód, ami az adatbázisból kapott adatok alapján megrajzolja a grafikont.
        const ctx = document.getElementById('myChart');
    </script>
@endsection