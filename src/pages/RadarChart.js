import { Radar } from 'react-chartjs-2';
import 'chart.js/auto';

function RadarChart({ data }) {
  // You can define your chart options and data here or receive them as props
  const chartData = {
    labels: ['Food', 'Body', 'Mind', 'Social', 'Sleep'],
    datasets: [{
      label: 'My First Dataset',
      data: data, // Data passed as props
      fill: true,
      backgroundColor: 'rgba(255, 99, 132, 0.2)',
      borderColor: 'rgb(255, 99, 132)',
      pointBackgroundColor: 'rgb(255, 99, 132)',
      pointBorderColor: '#fff',
      pointHoverBackgroundColor: '#fff',
      pointHoverBorderColor: 'rgb(255, 99, 132)'
    }],
  };
  const chartOptions = {
    scales: {
      r: {
        angleLines: {
          display: false
        },
        suggestedMin: 0,
        suggestedMax: 100,
        ticks: {
          // Adjust font size here
          font: {
            size: 14 // example font size
          }
        },
        pointLabels: {
          // Adjust point label font size here
          font: {
            size: 16 // example point label font size
          }
        }
      }
    },
    plugins: {
      legend: {
        labels: {
          // Adjust legend label font size here
          font: {
            size: 12 // example legend label font size
          }
        }
      }
    },
    // ... any other options ...
  };

  return <Radar data={chartData} options={chartOptions} />;
}

export default RadarChart;
