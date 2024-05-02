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
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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
        <?php include 'includes/header.php'; ?>

        <!-- /sidebar -->
        <?php include 'includes/sidebar.php'; ?>

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
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid mt-3">
                <!--bar chart & pie chart -->
                <div class="row" style="margin-top: -35px;">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Lines of Codes (LOC)</h4>
                                <div id="barChartContainer" style="width: 500px; height: 300;">
                                    <canvas id="barChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Amount of Java Source File</h4>
                                <div id="pieChartContainer" style="width: 500px; height: 300;">
                                    <canvas id="pieChart"></canvas>
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
                                <h4 class="card-title">Clone Pair Type in Each Application</h4>
                                <div id="stackedChartContainer" style="width: 500px; height: 300;">
                                    <canvas id="stackedBarChart" width="500" height="350"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Runtime Performance based on Clone Types</h4>
                                <div id="multiChartContainer" style="width: 500px; height: 300;">
                                    <canvas id="multiBarChart" width="500" height="350"></canvas>
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
        <?php include 'includes/footer.php' ?>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

   <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <script src="./js/dashboard/dashboard-1.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script> <!-- Include datalabels plugin -->

    <!-- bar chart -->
    <script>
        const ctx = document.getElementById('barChart');
        const barChartContainer = document.getElementById('barChartContainer');
        
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['J2sdk1.4.0-javax-swing', 'Eclipse-jdtcore', 'Eclipse-ant', 'Netbeans-javadoc'],
                datasets: [{
                    label: 'Lines of Code (LOC)',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255,99,132)',
                        'rgba(255,99,132)',
                        'rgba(255,99,132)',
                        'rgba(255,99,132)'
                    ],
                    borderColor: [
                        'rgb(255,99,132)',
                        'rgb(255,99,132)',
                        'rgb(255,99,132)',
                        'rgb(255,99,132)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    datalabels: {
                        anchor: 'end',
                        align: 'top',
                        formatter: function(value, context) {
                            return value;
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
        barChartContainer.style.height = '335px';
    </script>
    <!-- end bar chart -->

    <!-- pie chart -->
    <script>
       const ctx2 = document.getElementById('pieChart');
       const pieChartContainer = document.getElementById('pieChartContainer');

        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['J2sdk1.4.0-javax-swing', 'Eclipse-jdtcore', 'Eclipse-ant', 'Netbeans-javadoc'],
                datasets: [{
                label: 'Amount of Source File',
                data: [12, 19, 3, 5],
                backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCD56',
                        '#20C997'
                    ],
                    borderColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCD56',
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

    <!-- stacked bar chart -->
    <script>
        const ctx3 = document.getElementById('stackedBarChart').getContext('2d');
        const stackedChartContainer = document.getElementById('stackedChartContainer');

        const data = {
            labels: ['J2sdk1.4.0-javax-swing', 'Eclipse-jdtcore', 'Eclipse-ant', 'Netbeans-javadoc'],
            datasets: [{
                label: 'Type 1',
                data: [10, 20, 30, 40, 50],
                backgroundColor: 'rgba(255, 99, 132, 0.5)', // Red
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            }, 
            {
                label: 'Type 2',
                data: [15, 25, 35, 45, 55],
                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Blue
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            },
            {
                label: 'Type 3',
                data: [20, 30, 40, 50, 60],
                backgroundColor: 'rgba(153, 102, 255, 0.5)', // Purple
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            },
            {
                label: 'Type 4',
                data: [25, 35, 45, 55, 65],
                backgroundColor: 'rgba(75, 192, 192, 0.5)', // Green
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }

        ]
        };

        const options = {
            responsive: true, // Enable responsiveness
            maintainAspectRatio: false, // Disable aspect ratio
            scales: {
                x: {
                    stacked: true, // Enable stacking on the x-axis
                    ticks: {
                        autoSkip: false, // Disable auto skipping of labels
                        maxRotation: 30, // Rotate labels to 180 degrees
                        minRotation: 30 // Rotate labels to 180 degrees
                    }
                },
                y: {
                    stacked: true // Enable stacking on the y-axis
                }
            },
            plugins: {
                datalabels: {
                    anchor: 'end',
                    align: 'top',
                    formatter: function(value, context) {
                        return value;
                    }
                }
            },
        };

        const stackedBarChart = new Chart(ctx3, {
            type: 'bar',
            data: data,
            options: options
        });

        // Set width and height of container div
        stackedChartContainer.style.width = '100%';
        stackedChartContainer.style.height = '335px';
    </script>
    <!-- end stacked bar chart -->

    <!-- multiple line chart -->
    <script>
        const ctx4 = document.getElementById('multiBarChart').getContext('2d');
        const multiChartContainer = document.getElementById('multiChartContainer');
        
        const data2 = {
            labels: ['J2sdk1.4.0-javax-swing', 'Eclipse-jdtcore', 'Eclipse-ant', 'Netbeans-javadoc'],
            datasets: [{
                label: 'Type 1',
                backgroundColor: 'rgba(255, 99, 132, 0.5)', // Red
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1,
                data: [10, 15, 20, 25, 30]
            }, 
            {
                label: 'Type 2',
                backgroundColor: 'rgba(54, 162, 235, 0.5)', // Blue
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1,
                data: [20, 25, 30, 35, 40]
            },
            {
                label: 'Type 3',
                backgroundColor: 'rgba(153, 102, 255, 0.5)', // Purple
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1,
                data: [20, 30, 40, 50, 60],
            },
            {
                label: 'Type 4',
                backgroundColor: 'rgba(75, 192, 192, 0.5)', // Green
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                data: [25, 35, 45, 55, 65],
            },
        ]
        };

        const options2 = {
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
                datalabels: {
                    anchor: 'end',
                    align: 'top',
                    formatter: function(value, context) {
                        return value;
                    }
                }
            },

            barPercentage: 0.95, // Adjust the width of the bars
            categoryPercentage: 0.8 // Adjust the spacing between the bars
        };

        const multiBarChart = new Chart(ctx4, {
            type: 'bar',
            data: data2,
            options: options2
        });

        // Set width and height of container div
        multiChartContainer.style.width = '100%';
        multiChartContainer.style.height = '335px';
    </script>
    <!-- end multiple line chart -->

</body>

</html>
