@extends('layouts.app')

@section('content')
    <header class="main">
        <h1>Statisztika</h1>
    </header>

    <p>Ezen az oldalon a rendszerben tárolt adatok grafikus ábrázolása látható.</p>

    <div class="box">
        <canvas id="myChart" style="width:100%; max-height:500px;"></canvas>
        <p style="text-align:center; margin-top: 20px;"><i>A diagram a megyék össznépességét ábrázolja.</i></p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <script>
        // Backendről kapott adatok
        const labels = @json($megyeStats->pluck('megye'));
        const dataValues = @json($megyeStats->pluck('nepesseg'));
        const ctx = document.getElementById('myChart').getContext('2d');
        const sidebar = document.getElementById('sidebar');

        const chartData = {
                labels: labels,
                datasets: [{
                    label: 'Össznépesség (fő)',
                    data: dataValues,
                    borderWidth: 1
                }]
            };

            const config = {
                type: 'bar',
                data: chartData,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value, index, values) {
                                    return value.toLocaleString();
                                }
                            }
                        }
                    },
                    plugins: {
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let v = context.parsed.y ?? context.parsed;
                                    return v.toLocaleString() + ' fő';
                                }
                            }
                        }
                    }
                }
            };

        addEventListener('DOMContentLoaded', (e) => {
            const myChart = new Chart(ctx, config);
        });
    </script>
@endsection