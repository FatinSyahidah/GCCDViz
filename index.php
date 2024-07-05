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
    <link href="css/gccdViz.css" rel="stylesheet">

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.2.0/chartjs-plugin-datalabels.min.js" integrity="sha512-JPcRR8yFa8mmCsfrw4TNte1ZvF1e3+1SdGMslZvmrzDYxS69J7J49vkFL8u6u8PlPJK+H3voElBtUCzaXj+6ig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->

    <style>
     .d-flex {
        display: flex;
        align-items: center;
    }
    .file-input {
        display: none;
    }
    .btn-secondary {
        cursor: pointer;
    }
</style>

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
                <!-- <h2>Dashboard</h2> -->
                <!-- </div> -->
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="index.php">Home</a></li>
                    </ol>
                </div>
            </div>

            <div class="container-fluid">
                <!-- upload box -->
                <div class="row">
                    <div class="col-lg-12" >
                        <!-- HTML code for the Bootstrap alert component -->
                        <div id="successAlert" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                            Upload successful!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <!-- success delete -->
                        <div id="successAlertDelete" class="alert alert-success alert-dismissible fade show" role="alert" style="display: none;">
                            Delete successful!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <!-- end of delete -->

                        <!-- <div class="card"> -->
                            <form id="uploadForm" enctype="multipart/form-data">
                                <!-- <div class="card-body">  -->
                                    <!-- <div class="drop-zone" style="text-align: center; justify-content: center;"> -->
                                        <!-- <span class="drop-zone__prompt">Drop csv file here or click to upload</span> -->
                                        <!-- <input type="file" name="file" id="fileInput" class=""> -->
                                    <!-- </div> -->
                                    <div class="d-flex justify-content-end align-items-center" style="margin-bottom: 10px; margin-top:5px;">
                                        <!-- Hidden file input -->
                                        <input type="file" name="file" id="fileInput" class="file-input" style="display: none;">
                                        
                                        <!-- Custom button for file input -->
                                        <button type="button" class="btn btn-success shadow-sm rounded" style="color:white;" id="customFileButton">Choose File</button>
                                        
                                        <!-- Upload button -->
                                        <button type="button" id="uploadButton" class="btn btn-primary shadow-sm rounded" style="margin-left: 10px;">Submit</button>

                                        <button id="clearDataBtn" class="btn btn-danger"style="margin-left: 10px;">Clear Data</button>
                                    </div>
                                <!-- </div> -->
                            </form>
                        <!-- </div> -->
                    </div>
                </div>
                <!-- end of upload box -->

                <!-- clear data button -->
                <!-- <div class="row">
                    <div class="col text-right" style="margin-bottom: 30px; margin-right:30px;">
                        <button id="clearDataBtn" class="btn btn-danger">Clear Data</button>
                    </div>
                </div> -->
                <!-- end of clear data button -->

                <!--bar chart & pie chart -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size: 16px;">Lines of Code (LOC)</h4>
                                <div id="polarChartContainer">
                                    <canvas id="polarAreaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size: 16px;">Amount of Java Source File</h4>
                                <div id="pieChartContainer">
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
                                <h4 class="card-title" style="font-size: 16px;">Clone Pair Type in Each Application</h4>
                                <div id="stackedChartContainer">
                                    <canvas id="stackedBarChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="font-size: 16px;">Runtime Performance based on Clone Types</h4>
                                <div id="multiChartContainer">
                                    <canvas id="multiBarChart"></canvas>
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

    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>

    <!-- <script src="./js/dashboard/dashboard-1.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

    <!-- upload csv button -->
    <script>
        document.getElementById('customFileButton').addEventListener('click', function() {
            document.getElementById('fileInput').click();
        });
        
        document.getElementById('fileInput').addEventListener('change', function() {
            var fileName = this.files[0].name;
            document.getElementById('customFileButton').innerText = fileName;
        });
    </script>
    <!-- end upload csv button -->

    <!-- upload csv to local storage function -->
    <script>
        document.getElementById('uploadButton').addEventListener('click', function() {
            const fileInput = document.getElementById('fileInput');
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(event) {
                    const csvData = event.target.result;

                    // Store CSV data in local storage
                    localStorage.setItem('uploadedCSV', csvData);

                    // Show success alert
                    document.getElementById('successAlert').style.display = 'block';

                    // After 3 seconds, reload the page
                    setTimeout(function() {
                        window.location.reload();
                    }, 1500);
                };

                reader.readAsText(file);
            } else {
                alert('Please select a CSV file to upload.');
            }

        });

    </script>
    <!-- end upload csv to local storage function -->

    <!-- JavaScript code to handle the clear button click event -->
    <script>
        // Function to handle the "Clear Data" button click event
        document.getElementById('clearDataBtn').addEventListener('click', function() {
            // Ask the user to confirm before clearing the data
            const confirmed = confirm("Are you sure you want to clear all data?");

            if (confirmed) {
                // Clear all data from local storage
                localStorage.removeItem('uploadedCSV');

                // Clear the chart containers by setting their inner HTML to an empty string
                document.getElementById('multiChartContainer').innerHTML = '';
                document.getElementById('barChartContainer').innerHTML = '';
                document.getElementById('pieChartContainer').innerHTML = '';
                document.getElementById('stackedChartContainer').innerHTML = '';

                // Show the "Delete successful" alert
                document.getElementById('successAlertDelete').style.display = 'block';

                // After 3 seconds, hide the alert
                setTimeout(function() {
                    document.getElementById('successAlertDelete').style.display = 'none';
                }, 1500);
            }
        });
    </script>

    <!-- polar chart -->
    <script>
        // Retrieve data from local storage
        const csvData = localStorage.getItem('uploadedCSV');
        const polarChartContainer = document.getElementById('polarChartContainer');

        // Parse CSV data
        const lines = csvData.split('\n');
        const labels = [];
        const data = [];

        // Iterate over each line (excluding header) to get the first occurrence of each application
        for (let i = 1; i < lines.length; i++) {
            const columns = lines[i].split(',');

            if (columns.length >= 2) { // Check if there are at least 2 columns
                const appName = columns[0].trim(); // Application name
                const loc = parseInt(columns[1]); // LOC value (convert to integer)

                // If the application name doesn't exist in the labels array, add it with its LOC value
                if (!labels.includes(appName)) {
                    labels.push(appName);
                    data.push(loc);
                }
            }
        }

        // Create polar area chart with one segment for each unique application
        const ctx = document.getElementById('polarAreaChart').getContext('2d');
        Chart.register(ChartDataLabels);
        
        new Chart(ctx, {
            type: 'polarArea',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Lines of Code (LOC)',
                    data: data,
                    backgroundColor: [
                        'rgba(255,99,132,0.7)',
                        'rgba(54,162,235,0.7)',
                        'rgba(255,206,86,0.7)',
                        'rgba(75,192,192,0.7)',
                        'rgba(153,102,255,0.7)',
                        'rgba(255,159,64,0.7)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54,162,235,1)',
                        'rgba(255,206,86,1)',
                        'rgba(75,192,192,1)',
                        'rgba(153,102,255,1)',
                        'rgba(255,159,64,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    r: {
                        beginAtZero: true,
                        max: 210000 // Set the maximum value for the radial axis
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top', // Position legend at the bottom
                        labels: {
                            font: {
                                size: 12 // Adjust the font size of the labels
                            },
                            boxWidth: 11, // Adjust the box width
                            padding: 11 // Adjust the padding between legend items
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
                }
            }
        });

        // Set width and height of container div
        polarChartContainer.style.width = '100%';
        polarChartContainer.style.height = '315px';

    </script>
    <!-- end polar chart -->

    <!-- pie chart -->
    <script>
        // Retrieve data from local storage
        const csvDataAmt = localStorage.getItem('uploadedCSV');

        // Parse CSV data
        const lines2 = csvDataAmt.split('\n');
        const apps2 = new Map(); // Map to store unique application names and their AmtJv

        // Iterate over each line (excluding header) to get the first occurrence of each application
        for (let i = 1; i < lines2.length; i++) {
            const columns = lines2[i].split(',');

            if (columns.length >= 2){
                const appName = columns[0].trim(); // Application name
                const amtJv = parseInt(columns[2]); // AmtJv value (convert to integer)
                
                // If the application name doesn't exist in the map, add it with its AmtJv value
                if (!apps2.has(appName)) {
                    apps2.set(appName, amtJv);
                }
            }
        }

        // Convert Map to Arrays for labels and data
        const labels2 = Array.from(apps2.keys());
        const data2 = Array.from(apps2.values());

        // Create pie chart with one slice for each unique application
        const ctx2 = document.getElementById('pieChart');
        new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: labels2,
                datasets: [{
                    label: 'Amount of Source File',
                    data: data2,
                    backgroundColor: [
                        'rgba( 0, 170, 255 , 0.8)',
                        'rgba(116,238,21,0.8)',
                        'rgba(170,0,255,0.8)',
                        'rgba(255,0,170,0.8)'
                    ],
                    borderColor: [
                        'rgba( 0, 170, 255 , 1)',
                        'rgba(116,238,21,1)',
                        'rgba(170,0,255,1)',
                        'rgba(255,0,170,1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
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
        const pieChartContainer = document.getElementById('pieChartContainer');
        pieChartContainer.style.width = '100%';
        pieChartContainer.style.height = '305px';
        
    </script>
    <!-- end pie chart -->

    <!-- stacked bar chart -->
    <script>
        // Retrieve data from local storage
        const csvDataClone = localStorage.getItem('uploadedCSV');

        // Parse CSV data
        const lines3 = csvDataClone.split('\n').slice(1); // Remove header
        //console.log('Parsed lines:', lines3);
        
        const appsData = {};

        // Iterate over each line to aggregate clone data for each application
        lines3.forEach(line => {
        // Skip processing if the line doesn't contain enough elements
        if (!line || line.trim() === '') return;

        const [appName, , , cloneType, cloneCount] = line.split(',');
        //console.log('Line data:', appName, cloneType, cloneCount);

            if (!appsData[appName]) {
                appsData[appName] = {
                    labels: [],
                    datasets: {
                        Type1: [],
                        Type2: [],
                        Type3: [],
                        Type4: [],
                    },
                };
            }

            const appData = appsData[appName];

            // Update labels if not already added
            if (!appData.labels.includes(appName)) {
                appData.labels.push(appName);
            }

            // Update dataset for the clone type
            appData.datasets[cloneType].push(parseInt(cloneCount));
        });
        
        //console.log('Apps data:', appsData);

        // Chart configuration
        const ctx3 = document.getElementById('stackedBarChart').getContext('2d');
        
        const options = {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    stacked: true,
                    
                },
                y: { stacked: true }
            },
            plugins: {
                datalabels: {
                    color: 'rgba(48,48,48)',
                    anchor: 'center',
                    align: 'center',
                    formatter: function(value, context) {
                        return value;
                    }
                }
            },
            barPercentage: 1, // Adjust the width of the bars
            categoryPercentage: 0.75 // Adjust the spacing between the bars
        };

        // Create the chart
        const stackedBarChart = new Chart(ctx3, {
            type: 'bar',
            data: {
                labels: Object.keys(appsData),
                datasets: [
                    {
                        label: 'Type1',
                        data: Object.values(appsData).map(app => app.datasets['Type1'].reduce((a, b) => a + b, 0)),
                        backgroundColor: 'rgba(255, 0, 170, 0.8)',
                        borderColor: 'rgba(255, 0, 170, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Type2',
                        data: Object.values(appsData).map(app => app.datasets['Type2'].reduce((a, b) => a + b, 0)),
                        backgroundColor: 'rgba( 0, 170, 255 , 0.8)',
                        borderColor: 'rgba( 0, 170, 255 , 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Type3',
                        data: Object.values(appsData).map(app => app.datasets['Type3'].reduce((a, b) => a + b, 0)),
                        backgroundColor: 'rgba(170,0,255, 0.8)',
                        borderColor: 'rgba(170,0,255, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Type4',
                        data: Object.values(appsData).map(app => app.datasets['Type4'].reduce((a, b) => a + b, 0)),
                        backgroundColor: 'rgba(170,255,0, 0.7)',
                        borderColor: 'rgba(170,255,0, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: options
        });

        // Set width and height of container div
        const stackedChartContainer = document.getElementById('stackedChartContainer');
        stackedChartContainer.style.maxWidth = '100%';
        stackedChartContainer.style.height = '305px';

    </script>
    <!-- end stacked bar chart -->

    <!-- multiple bar chart -->
    <script>
        const ctx4 = document.getElementById('multiBarChart').getContext('2d');
        const multiChartContainer = document.getElementById('multiChartContainer');

        // Parse CSV data from local storage
        const parsedData = localStorage.getItem('uploadedCSV');
        const lines4 = parsedData.split('\n').slice(1); // Remove header
        const chartData = {};

        // Iterate over each line to aggregate data for each application
        lines4.forEach(line => {
            const [appName, , , , , , , , , , type1_2, type3_4] = line.split(',');

            // Skip processing if the appName is an empty string
            if (appName.trim() === '') return;

            if (!chartData[appName]) {
                chartData[appName] = { Type1_2: 0, Type3_4: 0 };
            }

            // Extract the values for Type1&Type2 and Type3&Type4
            const [type1_2Count, type3_4Count] = [type1_2, type3_4].map(countStr => parseInt(countStr));

            // Check if the parsed counts are valid numbers
            if (!isNaN(type1_2Count) && !isNaN(type3_4Count)) {
                // Update the chart data for the current application only if it's not already updated
                if (type1_2Count && type3_4Count) {
                    chartData[appName].Type1_2 = type1_2Count;
                    chartData[appName].Type3_4 = type3_4Count;
                } else {
                    // If there are multiple entries for the same application, accumulate the values
                    chartData[appName].Type1_2 += type1_2Count;
                    chartData[appName].Type3_4 += type3_4Count;
                }
            }
        });

        const chartLabels = Object.keys(chartData);
        const type1_2ChartData = chartLabels.map(app => chartData[app].Type1_2);
        const type3_4ChartData = chartLabels.map(app => chartData[app].Type3_4);

        const data6 = {
            labels: chartLabels,
            datasets: [
                {
                    label: 'Type 1 & Type 2',
                    backgroundColor: 'rgba( 0, 170, 255 , 0.8)', // Blue
                    borderColor: 'rgba( 0, 170, 255 , 1)',
                    borderWidth: 1,
                    data: type1_2ChartData,
                },
                {
                    label: 'Type 3 & Type 4',
                    backgroundColor: 'rgba(170,0,255, 0.8)', // Purple
                    borderColor: 'rgba(170,0,255, 1)',
                    borderWidth: 1,
                    data: type3_4ChartData,
                }
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
                        maxRotation: 15, // Rotate labels to 180 degrees
                        minRotation: 15 // Rotate labels
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
            data: data6,
            options: options2
        });

        console.log(chartData);

        // Set width and height of container div
        multiChartContainer.style.width = '100%';
        multiChartContainer.style.height = '305px';

    </script>
    <!-- end multiple bar chart -->

</body>

</html>
