  
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
<div class="container">
    <h1>Line Chart Example</h1>
    <canvas id="lineChart"></canvas>
</div>

<script>
    // Get the balance history data from the controller
    var balanceHistory = {!! json_encode($balances) !!};

    // Create a new line chart with Chart.js
    var ctx = document.getElementById('lineChart').getContext('2d');
    var lineChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: balanceHistory.dates,
            datasets: [{
                label: 'Balance',
                data: balanceHistory.balances,
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
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

