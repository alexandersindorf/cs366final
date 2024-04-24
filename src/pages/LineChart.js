import { Line } from 'react-chartjs-2';
import 'chart.js/auto';

function LineChart({ data }) {
    const options = {
        responsive: true,
        plugins: {
            legend: {
                display: true,
                position: 'top',
            },
            tooltip: {
                enabled: true,
            },
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    callback: function(value) {
                        return value + "%"; 
                    }
                }
            }
        }
    };

    const chartData = {
        labels: data.map((_, index) => `Label ${index + 1}`),
        datasets: [
            {
                label: 'User Demographic %',
                data: data,
                borderColor: 'rgb(75, 192, 192)',
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
            }
        ]
    };

    return <Line options={options} data={chartData} />;
}

export default LineChart;