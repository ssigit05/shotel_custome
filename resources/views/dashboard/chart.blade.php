<div class="card card-info">
    <div class="card-header">
        Grafik Pemesanan Per-Bulan
    </div>  
    <div class="card-body">
        <canvas id="myChart"></canvas>
    </div>
</div>
@push('css')
    <link rel="stylesheet" href="{{ url('adminlte/plugins/chart.js/Chart.min.css')}}">
@endpush

@push('js')
    <script src="{{ url('adminlte/plugins/chart.js/Chart.min.js')}}"></script>
    <script>
    var label_chart = <?= json_encode($data_chart['label']) ?>;
    var data_chart = <?= json_encode($data_chart['data']) ?>;
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: label_chart ,
        datasets: [{
            label: 'Permintaan',
            data: data_chart,
            borderWidth: 1,
            backgroundColor: 'rgba(245, 229, 27, 0.3)',
            borderColor: 'rgba(245, 229, 27, 1)'
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
    </script>
@endpush