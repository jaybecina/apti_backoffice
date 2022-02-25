@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="main-content">

  <div class="page-content">
      <div class="container-fluid">

          <!-- start page title -->
          <div class="row">
              <div class="col-12">
                  <div class="page-title-box d-sm-flex flex-column align-items-start">
                      <h4 class="mb-sm-0 font-size-18 text-warning">Dashboard</h4>

                      <div class="page-title-right">
                          <ol class="breadcrumb m-0">
                              <li class="breadcrumb-item"><a href="javascript: void(0);">Main Platform</a></li>
                              <li class="breadcrumb-item active">Dashboard</li>
                          </ol>
                      </div>

                  </div>
              </div>
          </div>
          <!-- end page title -->

          <div class="row">
              <div class="col-xl-12 col-sm-12 col-md-12 col-md-12">
                    <div class="card overflow-hidden">
                      
                    </div>
                  
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">    
                                    <div class="d-flex justify-content-between">
                                        <p><strong>Total No. of Interactions</strong></p>
                                        <p class="text-muted">Last 30 days</p>
                                    </div>      

                                    <div class="container-fluid">
                                        <div class="chart-container">
                                            <div class="doughnut-chart-container">
                                                <canvas id="myChartDoughnut">
                                                </canvas>
                                            </div> 
                                        </div>  
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 vertical-line" align="center">
                                                <img src = "{{ asset('assets/icons/oval.svg') }}" class="oval-icon" alt="" />
                                                <span><strong>10,000</strong></span><br>
                                                <span>Total Number of Interactions</span>
                                            </div>
                                            <div class="col-md-6" align="center">
                                                <img src = "{{ asset('assets/icons/oval.svg') }}" class="oval-icon" alt="" />
                                                <span><strong>300</strong></span><br>
                                                <span>Total Number of Interactions Today</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">    
                                    <div class="d-flex justify-content-between">
                                        <p><strong>Total Web Visits</strong></p>
                                        <p class="text-muted">Last 30 days</p>
                                    </div>      

                                    <div class="container-fluid">
                                        <div class="chart-container">
                                            <div class="doughnut-chart-container">
                                                <canvas id="myChartDoughnut2">
                                                </canvas>
                                            </div>  
                                        </div>  
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 vertical-line" align="center">
                                                <img src = "{{ asset('assets/icons/oval.svg') }}" class="oval-icon" alt="" />
                                                <span><strong>15,000</strong></span><br>
                                                <span class="text-warning">Total Number of Website Visits</span>
                                            </div>
                                            <div class="col-md-6" align="center">
                                                <img src = "{{ asset('assets/icons/oval.svg') }}" class="oval-icon" alt="" />
                                                <span><strong>9.43%</strong></span><br>
                                                <span class="text-warning">Total Number of Interactions Today</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">    
                                    <div class="d-flex justify-content-between">
                                        <p><strong>Total No. of Interactions</strong></p>
                                    </div>      

                                    <div class="container-fluid">
                                        <div class="chart-container">
                                            <div class="doughnut-chart-container">
                                                <canvas id="myChartDoughnut3">
                                                </canvas>
                                            </div>  
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 vertical-line" align="center">
                                                <img src = "{{ asset('assets/icons/oval.svg') }}" class="oval-icon" alt="" />
                                                <span><strong>200</strong></span><br>
                                                <span class="text-warning">Total Number of Website Visits</span>
                                            </div>
                                            <div class="col-md-6" align="center">
                                                <img src = "{{ asset('assets/icons/oval.svg') }}" class="oval-icon" alt="" />
                                                <span><strong>500</strong></span><br>
                                                <span class="text-warning">Maximum Website Visits Today</span>
                                            </div>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-body"> 
                                    <div class="d-flex justify-content-between">
                                        <p><strong>Access Statistics</strong></p>
                                        <p class="text-muted">Sessions</p>
                                    </div>   
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex">
                                            <div class="px-2"><span></span><strong>Day</strong></span></div>
                                            <div class="px-2"><span><strong>Week</strong></span></div>
                                            <div class="text-warning px-2"><span><strong>Month</strong></span></div>
                                            <div><span><strong>Year</strong></span></div>
                                        </div>  
                                        <div class="d-flex">
                                            <div class="px-2 text-warning"><img src = "{{ asset('assets/icons/oval.svg') }}" class="oval-icon" alt="" /><strong>2021</strong></div>
                                            <div class="px-2 text-warning"><img src = "{{ asset('assets/icons/oval.svg') }}" class="oval-icon" alt="" /><strong>2022</strong></div>
                                        </div>
                                    </div>  

                                    <div class="line-chart-container">
                                        <canvas id="myChartLine"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="bar-chart-maincontainer">
                                        <div class="d-flex flex-column">
                                            <div class="px-2 text-warning"><img src = "{{ asset('assets/icons/oval_eye.svg') }}" class="oval-icon" alt="" /><strong>120,495</strong></div>
                                            <div class="px-2"><strong>App Logins</strong></div>
                                        </div>
                                        <div class="bar-chart-container mb-2">
                                            <canvas id="myChartBar"></canvas>
                                        </div> 
                                        <div class="d-flex flex-column">
                                            <div class="px-2 text-warning"><img src = "{{ asset('assets/icons/oval_route.svg') }}" class="oval-icon" alt="" /><strong>120,495</strong></div>
                                            <div class="px-2"><strong>Traffic Rate</strong></div>
                                        </div>
                                        <div class="bar-chart-container mb-2">
                                            <canvas id="myChartBar2"></canvas>
                                        </div> 
                                        <div class="d-flex flex-column">
                                            <div class="px-2 text-warning"><img src = "{{ asset('assets/icons/oval_time.svg') }}" class="oval-icon" alt="" /><strong>120,495</strong></div>
                                            <div class="px-2"><strong>Average TIme</strong></div>
                                        </div>
                                        <div class="bar-chart-container mb-2">
                                            <canvas id="myChartBar3"></canvas>
                                        </div> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
          </div>
          <!-- end row -->
      </div>
      <!-- container-fluid -->
  </div>
  <!-- end page-content -->

  <!-- Modals Here -->
  
  <!-- end modals -->

</div>
<!-- end main content-->
@stop

@section('page-scripts')
<script type="text/javascript">

// // Jquery Scripts
$(document).ready(function() {

    // // Doughnut 1
    // Set up block
    const datapoints = [155, 50]; // here are the centered text value 
    const dataDoughnut = {
        // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: datapoints, // here are the value of the doughnut chart
            backgroundColor: [
                '#F5AE30',
                '#D8D8D8'
            ],
            borderColor: [
                '#F5AE30',
                '#D8D8D8'
            ],
            borderWidth: 1,
            cutout: '80%',
            circumference: 180,
            rotation: -90,
        }]
    };

    // counter plugin block
    const counter = {
        id: 'counter',
        beforeDraw( chart, args, options ) {
            const { ctx, chartArea: { top, right, bottom, left, width, height } } = chart;
            ctx.save();

            ctx.font = 
            options.fontWeight + ' ' + options.fontSize + ' ' + options.fontFamily;
            ctx.textAlign = options.textAlign;
            ctx.fillStyle = options.fontColor;
            ctx.fillText(datapoints[0], width / 2, (top*2) + (height / 2));
            ctx.restore();

            ctx.font = 
            options.subFontWeight + ' ' + options.subFontSize + ' ' + options.fontFamily;
            ctx.textAlign = "center";
            ctx.fillStyle = options.subFontColor;
            ctx.fillText("Incidents Today", width / 2, 20 + (top*2) + (height / 2));
        }
    };

    // Config Block
    const configDoughnut = {
        type: 'doughnut',
        data: dataDoughnut,
        options: {
            plugins: {
                counter: {
                    fontColor: "#F5AE30",
                    textAlign: "center",
                    subFontColor: "#B5B5B5",
                    fontSize: "20px",
                    subFontSize: "14px",
                    fontFamily: "sans-serif",
                    fontWeight: "bold",
                    subFontWeight: "normal"
                }
            },
            aspectRatio: 1,
            responsive: true,
            maintainAspectRatio: false, 
        },
        plugins: [counter]
    };

    // render init block
    const myChartDoughnut = new Chart(
        document.getElementById('myChartDoughnut').getContext('2d'),
        configDoughnut
    );


    // // Doughnut 2
    // Set up block
    const datapoints2 = [155, 50]; // here are the centered text value 
    const dataDoughnut2 = {
        // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: datapoints2, // here are the value of the doughnut chart
            backgroundColor: [
                '#F5AE30',
                '#D8D8D8'
            ],
            borderColor: [
                '#F5AE30',
                '#D8D8D8'
            ],
            borderWidth: 1,
            cutout: '80%',
            circumference: 180,
            rotation: -90,
        }]
    };

    // counter plugin block
    const counter2 = {
        id: 'counter2',
        beforeDraw( chart, args, options ) {
            const { ctx, chartArea: { top, right, bottom, left, width, height } } = chart;
            ctx.save();

            ctx.font = 
            options.fontWeight + ' ' + options.fontSize + ' ' + options.fontFamily;
            ctx.textAlign = options.textAlign;
            ctx.fillStyle = options.fontColor;
            ctx.fillText(datapoints2[0], width / 2, (top*2) + (height / 2));
            ctx.restore();

            ctx.font = 
            options.subFontWeight + ' ' + options.subFontSize + ' ' + options.fontFamily;
            ctx.textAlign = "center";
            ctx.fillStyle = options.subFontColor;
            ctx.fillText("Website Visits", width / 2, 20 + (top*2) + (height / 2));
        }
    };

    // Config Block
    const configDoughnut2 = {
        type: 'doughnut',
        data: dataDoughnut2,
        options: {
            plugins: {
                counter2: {
                    fontColor: "#F5AE30",
                    textAlign: "center",
                    subFontColor: "#B5B5B5",
                    fontSize: "20px",
                    subFontSize: "14px",
                    fontFamily: "sans-serif",
                    fontWeight: "bold",
                    subFontWeight: "normal"
                }
            },
            aspectRatio: 1,
            responsive: true,
            maintainAspectRatio: false, 
        },
        plugins: [counter2]
    };

    // render init block
    const myChartDoughnut2 = new Chart(
        document.getElementById('myChartDoughnut2').getContext('2d'),
        configDoughnut2
    );


    // // Doughnut 3
    // Set up block
    const datapoints3 = [155, 50]; // here are the centered text value 
    const dataDoughnut3 = {
        // labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: datapoints3, // here are the value of the doughnut chart
            backgroundColor: [
                '#F5AE30',
                '#D8D8D8'
            ],
            borderColor: [
                '#F5AE30',
                '#D8D8D8'
            ],
            borderWidth: 1,
            cutout: '80%',
            circumference: 180,
            rotation: -90,
        }]
    };

    // counter plugin block
    const counter3 = {
        id: 'counter3',
        beforeDraw( chart, args, options ) {
            const { ctx, chartArea: { top, right, bottom, left, width, height } } = chart;
            ctx.save();

            ctx.font = 
            options.fontWeight + ' ' + options.fontSize + ' ' + options.fontFamily;
            ctx.textAlign = options.textAlign;
            ctx.fillStyle = options.fontColor;
            ctx.fillText(datapoints2[0], width / 2, (top*2) + (height / 2));
            ctx.restore();

            ctx.font = 
            options.subFontWeight + ' ' + options.subFontSize + ' ' + options.fontFamily;
            ctx.textAlign = "center";
            ctx.fillStyle = options.subFontColor;
            ctx.fillText("Web Visits", width / 2, 20 + (top*2) + (height / 2));
        }
    };

    // Config Block
    const configDoughnut3 = {
        type: 'doughnut',
        data: dataDoughnut3,
        options: {
            plugins: {
                counter3: {
                    fontColor: "#F5AE30",
                    textAlign: "center",
                    subFontColor: "#B5B5B5",
                    fontSize: "20px",
                    subFontSize: "14px",
                    fontFamily: "sans-serif",
                    fontWeight: "bold",
                    subFontWeight: "normal"
                }
            },
            aspectRatio: 1,
            responsive: true,
            maintainAspectRatio: false, 
        },
        plugins: [counter3]
    };

    // render init block
    const myChartDoughnut3 = new Chart(
        document.getElementById('myChartDoughnut3').getContext('2d'),
        configDoughnut3
    );


    // Line
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
    ];
    const data = {
        labels: labels,
        datasets: [{
            label: 'My First dataset',
            backgroundColor: '#F79E00',
            borderColor: '#F79E00',
            data: [0, 10, 5, 2, 20, 30, 45],
        },
        {
            label: 'My Second dataset',
            backgroundColor: 'rgb(255, 255, 0)',
            borderColor: 'rgb(255, 255, 0)',
            data: [10, 10, 15, 12, 20, 30, 45],
        },
        ]
    };

    // Config block
    const configLine = {
        type: 'line',
        data: data,
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            indexAxis: 'x',
            scales: {
                x: {
                    grid: {
                        drawBorder: true,
                        display: false
                    }
                },
                y: {
                    beginAtZero: true
                }
            },
            aspectRatio: 1,
            responsive: true,
            maintainAspectRatio: false, 
        }
    };

    // render init block
    const myChartLine = new Chart(
        document.getElementById('myChartLine').getContext('2d'),
        configLine
    );



    // Bar chart
    var ctx = document.getElementById('myChartBar');
    var myChartBar = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['', '', '', '', '', ''],
            datasets: [{
                label: '',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5'
                ],
                borderColor: [
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            indexAxis: 'x',
            scales: {
                x: {
                    grid: {
                        drawBorder: true,
                        display: false
                    }
                },
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            maintainAspectRatio: false, 
        }
    });


    // Bar chart 2
    var ctx = document.getElementById('myChartBar2');
    var myChartBar2 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['', '', '', '', '', ''],
            datasets: [{
                label: '',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5'
                ],
                borderColor: [
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            indexAxis: 'x',
            scales: {
                x: {
                    grid: {
                        drawBorder: true,
                        display: false
                    }
                },
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            maintainAspectRatio: false, 
        }
    });


    // Bar chart 3
    var ctx = document.getElementById('myChartBar3');
    var myChartBar3 = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['', '', '', '', '', ''],
            datasets: [{
                label: '',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5'
                ],
                borderColor: [
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5',
                    '#B5B5B5'
                ],
                borderWidth: 1
            }]
        },
        options: {
            plugins: {
                legend: {
                    display: false
                }
            },
            indexAxis: 'x',
            scales: {
                x: {
                    grid: {
                        drawBorder: true,
                        display: false
                    }
                },
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            maintainAspectRatio: false, 
        }
    });


}); 
</script>
@endsection