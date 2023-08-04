$.ajax({
    url: 'admin/statistical',
    method: 'GET',
    success: function(response) {
        var months = response.map(function(item) {
            return item.month + '/' + item.year;
        });

        var ordersData = response.map(function(item) {
            return {
                x: item.month + '/' + item.year,
                y: item.total_orders
            };
        });

        var totalData = response.map(function(item) {
            return {
                x: item.month + '/' + item.year,
                y: item.total_amount
            };
        });

        var options = {
            series: [{
                name: 'Orders',
                data: ordersData
            }, {
                name: 'Total',
                data: totalData
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            title: {
                text: 'Monthly statistics',
                align: 'left'
            },
            xaxis: {
                categories: months,
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val, { seriesIndex, dataPointIndex }) {
                        if (seriesIndex === 0) {
                            return val.toString();
                        } else {
                            return "$" + val;
                        }
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#columnChart"), options);
        chart.render();
    },
});

// Chart 7 days

$.ajax({
    url: 'admin/order7Days',
    method: 'GET',
    success: function(response) {
        var days = response.map(function(item) {
            return item.day + '/' + item.month + '/' + item.year;
        });

        var ordersData = response.map(function(item) {
            return {
                x: item.day + '/' + item.month + '/' + item.year,
                y: item.total_orders
            };
        });

        var totalData = response.map(function(item) {
            return {
                x: item.day + '/' + item.month + '/' + item.year,
                y: item.total_amount
            };
        });

        var options = {
            series: [{
                name: 'Orders',
                data: ordersData
            }, {
                name: 'Total',
                data: totalData
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: days,
            },
            tooltip: {
                y: {
                    formatter: function (val, {seriesIndex, dataPointIndex}) {
                        if (seriesIndex === 0) {
                            return val.toString();
                        } else {
                            return "$" + val;
                        }
                    }
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#line"), options);
        chart.render();
    },
});

