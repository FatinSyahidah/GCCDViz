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
    <!-- <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div> -->
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
                <h2>Dashboard</h2>
                <!-- </div> -->
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="./N-javadoc.php">Netbeans-javadoc</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid mt-3">
                <!--bar chart & pie chart -->
                <div class="row" style="margin-top: -35px;">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Overall Clone Type</h4>
                                <div id="pieChartContainer" style="width: 500px; height: 300;">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Process Time Performance</h4>
                                <div id="pieChartContainer2" style="width: 500px; height: 300;">
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
                                <h4 class="card-title">Runtime Performance based on Clone Types (miliseconds)</h4>
                                <div id="barChartContainer" style="width: 500px; height: 300;">
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Runtime Performance of Netbeans-javadoc</h4>
                                <div id="barChartContainer2" style="width: 500px; height: 300;">
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
    <?php include './script.php' ?>

    <!-- pie chart -->
    <script>
       const ctx = document.getElementById('pieChart');
       const pieChartContainer = document.getElementById('pieChartContainer');

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Type-1', 'Type-2', 'Type-3', 'Type-4'],
                datasets: [{
                label: 'Amount of Source File',
                data: [12, 19, 3, 5],
                backgroundColor: [
                        '#FF6384',
                        'rgba(153, 102, 255, 0.8)',
                        '#36A2EB',
                        '#20C997'
                    ],
                    borderColor: [
                        '#FF6384',
                        'rgba(153, 102, 255, 0.8)',
                        '#36A2EB',
                        '#20C997'
                    ],
                borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Enable responsiveness
                maintainAspectRatio: false // Disable aspect ratio
            }
        });

        // Set width and height of container div
        pieChartContainer.style.width = '100%';
        pieChartContainer.style.height = '335px';
    </script>
    <!-- end pie chart -->

    <!-- pie chart 2 -->
    <script>
       const ctx2 = document.getElementById('pieChart2');
       const pieChartContainer2 = document.getElementById('pieChartContainer2');

        new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Pre-processing', 'Transformation', 'Parameterization', 'Categorization', 'Match Detection'],
                datasets: [{
                label: 'Miliseconds',
                data: [12, 19, 3, 5, 20],
                backgroundColor: [
                        '#FF6384',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(54, 162, 228, 0.9)',
                        '#20C997',
                        'rgba(255, 205, 41, 0.6)'
                    ],
                    borderColor: [
                        '#FF6384',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(54, 162, 228, 0.9)',
                        '#20C997',
                        'rgba(255,205,41, 0.6)'
                    ],
                borderWidth: 1
                }]
            },
            options: {
                responsive: true, // Enable responsiveness
                maintainAspectRatio: false // Disable aspect ratio
            }
        });

        // Set width and height of container div
        pieChartContainer2.style.width = '100%';
        pieChartContainer2.style.height = '335px';
    </script>
    <!-- end pie chart 2 -->

    <!-- bar chart -->
    <script>
        const ctx3 = document.getElementById('barChart');
        const barChartContainer = document.getElementById('barChartContainer');

        new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: ['Type-1', 'Type-2', 'Type-3', 'Type-4'],
                datasets: [{
                    label: 'Runtime Performance',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(153, 102, 255, 0.8)',
                        'rgba(153, 102, 255, 0.8)'
                    ],
                    borderColor: [
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)',
                        'rgb(153, 102, 255)'
                    ],
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
                    }
                },
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
                        beginAtZero: true
                    },
                    x: {
                        ticks: {
                            autoSkip: false, // Disable auto skipping of labels
                            maxRotation: 50, // Rotate labels to 180 degrees
                            minRotation: 50 // Rotate labels to 180 degrees
                        }
                    }
                }
            }
        });
        // Set width and height of container div
        barChartContainer.style.width = '100%';
        barChartContainer.style.height = '350px';
    </script>
    <!-- end bar chart -->

    <!-- multiple line chart -->
    <script>
        const ctx4 = document.getElementById('barChart2').getContext('2d');
        const barChartContainer2 = document.getElementById('barChartContainer2');

        const data4 = {
            labels: ['Pre-processing', 'Transformation', 'Parameterization', 'Categorization', 'Match Detection'],
            datasets: [{
                label: 'Runtime Performance',
                backgroundColor: 'rgba(255, 99, 132, 0.5)', // Red
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: [10, 15, 20, 25, 30]
            }
        ]
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
                    stacked: false // Disable stacking on the y-axis
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
        barChartContainer2.style.height = '350px';
    </script>
    <!-- end multiple line chart -->

</body>

</html>
