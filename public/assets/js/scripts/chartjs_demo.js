$(document).ready(function() {
	var myChart = new Chart(document.getElementById('myChart'), {
		type: 'bar',
		data: {
			labels: ["January", "February", "March", "April", 'May', 'June', 'August', 'September'],
			datasets: [{
				label: "Tasks",
				data: [45, 25, 40, 20, 60, 20, 35, 25],
				backgroundColor: "#0d6efd",
				borderColor: 'transparent',
				borderWidth: 2.5,
				barPercentage: 0.4,
			}, {
				label: "Meetings",
				startAngle: 2,
				data: [20, 40, 20, 50, 25, 40, 25, 10],
				backgroundColor: "#dc3545",
				borderColor: 'transparent',
				borderWidth: 2.5,
				barPercentage: 0.4,
			}]
		},
		options: {
			scales: {
				yAxes: [{
					gridLines: {},
					ticks: {
						stepSize: 15,
					},
				}],
				xAxes: [{
					gridLines: {
						display: false,
					}
				}]
			}
		}
	})
});