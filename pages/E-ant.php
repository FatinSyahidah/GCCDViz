<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    
    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />
  
    <title>GCCD Visualization</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <!-- Pignose Calender -->
    <link href="../plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    
    <!-- Chartist -->
    <link rel="stylesheet" href="../plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!-- /header -->
        <?php include '../includes/pheader.php'; ?>

        <!-- /sidebar -->
        <?php include '../includes/psidebar.php'; ?>

    <div class="page-wrapper">
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="row page-titles mx-0">
                <!-- <div class="col-sm-6"> -->
                <!-- <h2>Dashboard</h2> -->
                <!-- </div> -->
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="./E-ant.php">Eclipse-ant</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid mt-3">
                <!--bar chart & pie chart -->
                <div class="row" style="margin-top: -35px;">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size: 16px;">Overall Clone Type</h4>
                                <div id="pieChartContainer">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size: 16px;">Process Time Performance</h4>
                                <div id="pieChartContainer2">
                                    <canvas id="pieChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end bar chart & pie chart -->

                <!-- stack bar chart & multiple chart -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size: 16px;">Runtime Performance based on Clone Types (miliseconds)</h4>
                                <div id="barChartContainer">
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size: 16px;">Runtime Performance of Eclipse-ant</h4>
                                <div id="barChartContainer2">
                                    <canvas id="barChart2"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end bar chart & pie chart -->
            </div>
            <!-- #/ container -->

        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <?php include '../includes/footer.php' ?>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!-- script src -->
    <?php include './script.php'; ?>

    <!-- pie chart -->
    <script>
        const ctx = document.getElementById('pieChart');
        const pieChartContainer = document.getElementById('pieChartContainer');
        Chart.register(ChartDataLabels);

        // Parse CSV data from local storage
        const parsedData = localStorage.getItem('uploadedCSV');
        const lines = parsedData.split('\n').slice(1); // Remove header

        const chartData = {};

        // Iterate over each line to aggregate data for Eclipse-ant applications
        lines.forEach(line => {
            const [appName, , , cType, cCount] = line.split(',');

            // Check if the application is a Eclipse-ant application and avoid duplicates
            if (appName.includes('Eclipse-ant')) {
                if (!chartData[cType]) {
                    chartData[cType] = 0;
                }
                // Aggregate CCount for each Ctype
                chartData[cType] += parseInt(cCount);
            }
        });

        const chartLabels = Object.keys(chartData);
        const chartDataValues = Object.values(chartData);

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: chartLabels,
                datasets: [{
                    label: 'Amount of Source File',
                    data: chartDataValues,
                    backgroundColor: [
                        'rgba(255,0,170,0.7)',
                        'rgba(170,0,255, 0.8)',
                        'rgba( 0, 170, 255 , 0.8)',
                        'rgba(32,201,151,1)'
                    ],
                    borderColor: [
                        'rgba(255,0,170,0.7)',
                        'rgba(170,0,255, 0.8)',
                        'rgba( 0, 170, 255 , 0.8)',
                        'rgba(32,201,151,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Enable responsiveness
                maintainAspectRatio: false, // Disable aspect ratio
                plugins: {
                    datalabels: {
                        color: 'rgba(48,48,48)', // Color of the data label
                        anchor: 'center', // Position of the data label (end for top of the bar)
                        align: 'center', // Alignment of the data label (end for right-aligned)
                        formatter: function (value, context) {
                            // Display the actual data value
                            return value;
                        }
                    }
                }
            }
        });

        // Set width and height of container div
        pieChartContainer.style.width = '100%';
        pieChartContainer.style.height = '305px';

    </script>
    <!-- end pie chart -->

    <!-- pie chart 2 -->
    <script>
       const ctx2 = document.getElementById('pieChart2');
        const pieChartContainer2 = document.getElementById('pieChartContainer2');

        // Get parsed data from local storage for the second chart
        const parsedData2 = localStorage.getItem('uploadedCSV');
        const lines2 = parsedData2.split('\n').slice(1); // Remove header

        // Initialize chart data object for the second chart
        const chartData2 = {
            'Pre-processing': 0,
            'Transformation': 0,
            'Parameterization': 0,
            'Categorization': 0,
            'Match Detection': 0
        };

        // Iterate over each line to aggregate data for the second chart
        lines2.forEach(line => {
            const [appName, , , , , preprcss, trans, prmtrzn, ctg, matchD] = line.split(',');

            // Check if the application is a Eclipse-ant application
            if (appName.includes('Eclipse-ant')) {
                // Aggregate data for Preprcss, Trans, Prmtrzn, Ctg, and MatchD
                chartData2['Pre-processing'] = parseInt(preprcss);
                chartData2['Transformation'] = parseInt(trans);
                chartData2['Parameterization'] = parseInt(prmtrzn);
                chartData2['Categorization'] = parseInt(ctg);
                chartData2['Match Detection'] = parseInt(matchD);
            }
        });

        // Get chart labels and values for the second chart
        const chartLabels2 = Object.keys(chartData2);
        const chartDataValues2 = Object.values(chartData2);

        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: chartLabels2,
                datasets: [{
                    label: 'Milliseconds',
                    data: chartDataValues2,
                    backgroundColor: [
                        'rgba(255,0,170,0.7)',
                        'rgba(170,0,255, 0.8)',
                        'rgba( 0, 170, 255 , 0.8)',
                        'rgba(32,201,151,1)',
                        'rgba(255, 205, 41, 1)'
                    ],
                    borderColor: [
                        'rgba(255,0,170,0.7)',
                        'rgba(170,0,255, 0.8)',
                        'rgba( 0, 170, 255 , 0.8)',
                        'rgba(32,201,151,1)',
                        'rgba(255,205,41,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Enable responsiveness
                maintainAspectRatio: false, // Disable aspect ratio
                plugins: {
                    datalabels: {
                        color: 'rgba(48,48,48)', // Color of the data label
                        anchor: 'center', // Position of the data label (end for top of the bar)
                        align: 'center', // Alignment of the data label (end for right-aligned)
                        formatter: function (value, context) {
                            // Display the actual data value
                            return value;
                        }
                    }
                }
            }
        });

        // Set width and height of container div for the second chart
        pieChartContainer2.style.width = '100%';
        pieChartContainer2.style.height = '305px';
    </script>
    <!-- end pie chart 2 -->

    <!-- bar chart -->
    <script>
        const ctx3 = document.getElementById('barChart');
        const barChartContainer = document.getElementById('barChartContainer');

        // Parse CSV data from local storage
        const parsedDataEAnt = localStorage.getItem('uploadedCSV');
        const linesEAnt = parsedDataEAnt.split('\n').slice(1); // Remove header

        let labels = [];
        let type1_2Data = [];
        let type3_4Data = [];

        // Iterate over each line to accumulate EAnt data
        linesEAnt.forEach(line => {
            // Split line and trim spaces
            const parts = line.split(',').map(part => part.trim());

            // Check if line has enough columns and the correct app name
            if (parts.length >= 11 && parts[0] === 'Eclipse-ant') {
                const type1_2 = parts[10];
                const type3_4 = parts[11];

                // Aggregate data only for J2sdk application
                if (!labels.includes('Eclipse-ant')) {
                    labels.push('Eclipse-ant');
                }
                type1_2Data.push(type1_2 ? parseInt(type1_2) : 0);
                type3_4Data.push(type3_4 ? parseInt(type3_4) : 0);
            }
        });

        // Render the chart using Chart.js
        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                        label: 'Type-1 & Type-2',
                        data: type1_2Data,
                        backgroundColor: 'rgba(0, 170, 255, 0.8)',
                        borderColor: 'rgba(0, 170, 255, 0.8)',
                        borderWidth: 1
                    },
                    {
                        label: 'Type-3 & Type-4',
                        data: type3_4Data,
                        backgroundColor: 'rgba(255,0,170,0.7)',
                        borderColor: 'rgba(255,0,170,0.7)',
                        borderWidth: 1
                    }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.dataset.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                if (context.parsed.y !== null) {
                                    label += context.parsed.y + ' ms';
                                }
                                return label;
                            }
                        }
                    },
                    datalabels: {
                        color: 'rgba(48,48,48)', // Color of the data label
                        anchor: 'center', // Position of the data label (end for top of the bar)
                        align: 'center', // Alignment of the data label (end for right-aligned)
                        formatter: function (value, context) {
                            // Display the actual data value
                            return value;
                        }
                    }
                },
                barPercentage: 0.6, // Adjust the width of the bars
                categoryPercentage: 0.75, // Adjust the spacing between the bars
                responsive: true, // Enable responsiveness
                maintainAspectRatio: false, // Disable aspect ratio
                layout: {
                    padding: {
                        left: 10,
                        right: 10, // Adjust right padding if necessary
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        stacked: true
                    },
                    x: {
                        stacked: true,
                        ticks: {
                            autoSkip: false, // Disable auto skipping of labels
                            maxRotation: 0, // Rotate labels to 180 degrees
                            minRotation: 0 // Rotate labels to 180 degrees
                        }
                    }
                }
            }
        });

        // Set width and height of container div
        barChartContainer.style.width = '100%';
        barChartContainer.style.height = '305px';
    </script>
    <!-- end bar chart -->

    <!-- multiple line chart -->
    <script>
        const ctx4 = document.getElementById('barChart2').getContext('2d');
        const barChartContainer2 = document.getElementById('barChartContainer2');

        // Get parsed data from local storage for the second chart
        const parsedDataEAnt2 = localStorage.getItem('uploadedCSV');
        const linesEAnt2 = parsedData2.split('\n').slice(1); // Remove header

        // Initialize chart data object for the second chart
        const chartDataEAnt = {
            'Pre-processing': 0,
            'Transformation': 0,
            'Parameterization': 0,
            'Categorization': 0,
            'Match Detection': 0
        };

        // Iterate over each line to aggregate data for the second chart
        linesEAnt2.forEach(line => {
            const [appName, , , , , preprcss, trans, prmtrzn, ctg, matchD] = line.split(',');

            // Check if the application is a EAnt application
            if (appName.includes('Eclipse-ant')) {
                // Aggregate data for Preprcss, Trans, Prmtrzn, Ctg, and MatchD
                chartDataEAnt['Pre-processing'] = parseInt(preprcss);
                chartDataEAnt['Transformation'] = parseInt(trans);
                chartDataEAnt['Parameterization'] = parseInt(prmtrzn);
                chartDataEAnt['Categorization'] = parseInt(ctg);
                chartDataEAnt['Match Detection'] = parseInt(matchD);
            }
        });

        // Get chart labels and values for the second chart
        const chartLabelsEAnt = Object.keys(chartDataEAnt);
        const chartDataValuesEAnt = Object.values(chartDataEAnt);

        const data4 = {
            labels: chartLabelsEAnt,
            datasets: [{
                label: 'Runtime Performance',
                backgroundColor: 'rgba(255,231,0,1)', // Green
                borderColor: 'rgba(255,231,0,1)',
                borderWidth: 1,
                data: chartDataValuesEAnt
            }]
        };

        const options4 = {
            responsive: true, // Enable responsiveness
            maintainAspectRatio: false, // Disable aspect ratio
            scales: {
                x: {
                    stacked: false, // Disable stacking on the x-axis
                    ticks: {
                        autoSkip: false, // Disable auto skipping of labels
                        maxRotation: 30, // Rotate labels to 180 degrees
                        minRotation: 30 // Rotate labels to 180 degrees
                    }
                },
                y: {
                    stacked: false, // Disable stacking on the y-axis
                    suggestedMin: 0,
                    min: 0,
                    suggestedMax: 2700
                }
            },
            plugins: {
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            let label = context.dataset.label || '';
                            if (label) {
                                label += ': ';
                            }
                            if (context.parsed.y !== null) {
                                label += context.parsed.y + ' ms';
                            }
                            return label;
                        }
                    }
                },
                datalabels: {
                    color: 'rgba(48,48,48)', // Color of the data label
                    anchor: 'end', // Position of the data label (end for top of the bar)
                    align: 'top', // Alignment of the data label (end for right-aligned)
                    formatter: function (value, context) {
                        // Display the actual data value
                        return value;
                    }
                }
            },
            barPercentage: 0.95, // Adjust the width of the bars
            categoryPercentage: 0.8 // Adjust the spacing between the bars
        };

        const barChart2 = new Chart(ctx4, {
            type: 'bar',
            data: data4,
            options: options4
        });

        // Set width and height of container div
        barChartContainer2.style.width = '100%';
        barChartContainer2.style.height = '305px';
    </script>
    <!-- end multiple line chart -->

</body>

</html>
