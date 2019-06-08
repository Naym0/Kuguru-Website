/* eslint-disable no-undef */
class BePagesDashboard {
	/*
	 * Chart.js Charts, for more examples you can check out http://www.chartjs.org/docs
	 *
	 */
	static initDashboardChartJS() {
		// Set Global Chart.js configuration
		Chart.defaults.global.defaultFontColor = '#555555';
		Chart.defaults.scale.gridLines.color = 'transparent';
		Chart.defaults.scale.gridLines.zeroLineColor = 'transparent';
		Chart.defaults.scale.display = false;
		Chart.defaults.scale.ticks.beginAtZero = true;
		Chart.defaults.global.elements.line.borderWidth = 2;
		Chart.defaults.global.elements.point.radius = 5;
		Chart.defaults.global.elements.point.hoverRadius = 7;
		Chart.defaults.global.tooltips.cornerRadius = 3;
		Chart.defaults.global.legend.display = false;

		// Chart Containers
		const chartDashboardLinesCon = jQuery('.js-chartjs-dashboard-lines');

		// ?Orders this week data
		const ordersData = chartDashboardLinesCon.data('records');
		const daysOfWeek = ['SUN', 'MON', 'TUE', 'WED', 'THUR', 'FRI', 'SAT'];
		const completeData = daysOfWeek.map(day => {
			return day in ordersData ? ordersData[day] : 0;
		});

		// Chart Variables
		let chartDashboardLines;

		// Lines Charts Data
		const chartDashboardLinesData = {
			labels: daysOfWeek,
			datasets: [
				{
					label: 'This Week',
					fill: true,
					backgroundColor: 'rgba(66,165,245,.45)',
					borderColor: 'rgba(66,165,245,1)',
					pointBackgroundColor: 'rgba(66,165,245,1)',
					pointBorderColor: '#fff',
					pointHoverBackgroundColor: '#fff',
					pointHoverBorderColor: 'rgba(66,165,245,1)',
					data: completeData
				}
			]
		};

		const chartDashboardLinesOptions = {
			scales: {
				yAxes: [
					{
						ticks: {
							suggestedMax: 20
						}
					}
				]
			},
			tooltips: {
				callbacks: {
					label: (tooltipItems, data) => {
						return ` ${tooltipItems.yLabel} Orders`;
					}
				}
			}
		};

		// Init Charts
		if (chartDashboardLinesCon.length) {
			chartDashboardLines = new Chart(chartDashboardLinesCon, {
				type: 'line',
				data: chartDashboardLinesData,
				options: chartDashboardLinesOptions
			});
		}
	}

	/*
	 * Init functionality
	 *
	 */
	static init() {
		this.initDashboardChartJS();
	}
}

// Initialize when page loads
jQuery(() => {
	BePagesDashboard.init();
});
