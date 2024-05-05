<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div>
    <canvas id="myChart"></canvas>
</div>

<script>
const ctx = document.getElementById('myChart');

new Chart(ctx, {
type: 'bar',
data: {
  labels: <?php echo json_encode($xAxis)?>,
  datasets: [{
    label: 'Average Percentages of at risk Symptoms',
    data: <?php echo json_encode($yAxis)?>,
    borderWidth: 1
  }]
},
options: {
  scales: {
    y: {
      beginAtZero: true
    }
  }
}
});
</script>