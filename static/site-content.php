<div class="flex-fill container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">
                            <i class="fas fa-home"></i>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="far fa-file"></i>
                            Files
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chart-area"></i>
                            Data
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-users"></i>
                            Users
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-table"></i>
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-database"></i>
                            Integrations
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <i class="fas fa-plus-square"></i>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-file-alt"></i>
                            Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-file-alt"></i>
                            Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-file-alt"></i>
                            Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-file-alt"></i>
                            Year-end sale
                        </a>
                    </li>
                </ul>

                <div id="livedata" class="mb-2"></div>
                <script type="text/javascript">

                    Highcharts.setOptions({
                        global: {
                            useUTC: false
                        }
                    });

                    Highcharts.chart('livedata', {
                        chart: {
                            type: 'spline',
                            animation: Highcharts.svg, // don't animate in old IE
                            marginRight: 10,
                            events: {
                                load: function () {

                                    // set up the updating of the chart each second
                                    var series = this.series[0];
                                    setInterval(function () {
                                        var x = (new Date()).getTime(), // current time
                                            y = Math.random();
                                        series.addPoint([x, y], true, true);
                                    }, 1000);
                                }
                            }
                        },
                        title: {
                            text: 'Live random data'
                        },
                        xAxis: {
                            type: 'datetime',
                            tickPixelInterval: 150
                        },
                        yAxis: {
                            title: {
                                text: 'Value'
                            },
                            plotLines: [{
                                value: 0,
                                width: 1,
                                color: '#808080'
                            }]
                        },
                        tooltip: {
                            formatter: function () {
                                return '<b>' + this.series.name + '</b><br/>' +
                                    Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                                    Highcharts.numberFormat(this.y, 2);
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        exporting: {
                            enabled: false
                        },
                        series: [{
                            name: 'Random data',
                            data: (function () {
                                // generate an array of random data
                                var data = [],
                                    time = (new Date()).getTime(),
                                    i;

                                for (i = -19; i <= 0; i += 1) {
                                    data.push({
                                        x: time + i * 1000,
                                        y: Math.random()
                                    });
                                }
                                return data;
                            }())
                        }]
                    });
                </script>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary mb-2" data-toggle="modal"
                        data-target="#exampleModalCenter">
                    Launch demo modal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-signin">
                                    <div class="text-center mb-4">
                                        <img class="mb-4"
                                             src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt=""
                                             width="72" height="72">
                                        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                                        <p>Use your <code>Company-Email-Address</code></p>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="email" id="inputEmail" class="form-control"
                                               placeholder="Email address" required="" autofocus="">
                                        <label for="inputEmail">Email address</label>
                                    </div>

                                    <div class="form-label-group">
                                        <input type="password" id="inputPassword" class="form-control"
                                               placeholder="Password" required="">
                                        <label for="inputPassword">Password</label>
                                    </div>

                                    <div class="checkbox mb-3">
                                        <label>
                                            <input type="checkbox" value="remember-me"> Remember me
                                        </label>
                                    </div>
                                    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary">Share</button>
                        <button class="btn btn-sm btn-outline-secondary">Export</button>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                        <span data-feather="calendar"></span>
                        This week
                    </button>
                </div>
            </div>


            <div id="message-1"
                 class="d-flex justify-content-between align-items-center p-3 my-3 text-white-50 bg-warning rounded shadow"
                 style="display: none !important;">
                <i class="fas fa-exclamation-triangle mr-3 message-symbol"></i>
                <div class="lh-100">
                    <h6 class="mb-0 text-dark lh-100">Warnung</h6>
                    <small class="text-dark">Diese Seite ist noch nicht fertig, daher steht hier Testweise eine
                        Menge
                        Text, unter Anderem
                        auch Lorem Ipsum: Ein schöner Test, Eins, Zwei, Drei, Vier und Fünf
                        <br/>
                        <span class="date-today"></span>
                    </small>
                </div>
                <div class="p-2">
                    <button class="btn btn-dark float-right"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div id="message-2"
                 class="d-flex justify-content-between align-items-center p-3 my-3 text-white-50 bg-danger rounded shadow"
                 style="display: none !important;">
                <i class="fas fa-exclamation-triangle mr-3 message-symbol"></i>
                <div class="lh-100">
                    <h6 class="mb-0 text-dark lh-100">Gefahr</h6>
                    <small class="text-dark">Diese Seite ist noch nicht fertig, daher steht hier Testweise eine
                        Menge
                        Text, unter Anderem
                        auch Lorem Ipsum: Ein schöner Test, Eins, Zwei, Drei, Vier und Fünf
                        <br/>
                        <span class="date-today"></span>
                    </small>
                </div>
                <div class="p-2">
                    <button class="btn btn-dark float-right"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div id="message-3"
                 class="d-flex justify-content-between align-items-center p-3 my-3 text-white-50 bg-light rounded shadow"
                 style="display: none !important;">
                <i class="fas fa-info mr-3 message-symbol"></i>
                <div class="lh-100">
                    <h6 class="mb-0 text-dark lh-100">Information</h6>
                    <small class="text-dark">Diese Seite ist noch nicht fertig, daher steht hier Testweise eine
                        Menge
                        Text, unter Anderem
                        auch Lorem Ipsum: Ein schöner Test, Eins, Zwei, Drei, Vier und Fünf
                        <br/>
                        <span class="date-today"></span>
                    </small>
                </div>
                <div class="p-2">
                    <button class="btn btn-dark float-right"><i class="fas fa-times"></i></button>
                </div>
            </div>

            <div id="message-4"
                 class="d-flex justify-content-between align-items-center p-3 my-3 text-white-50 bg-success rounded shadow"
                 style="display: none !important;">
                <i class="fas fa-check mr-3 message-symbol"></i>
                <div class="lh-100">
                    <h6 class="mb-0 text-dark lh-100">Abgeschlossen</h6>
                    <small class="text-dark">Diese Seite ist noch nicht fertig, daher steht hier Testweise eine
                        Menge
                        Text, unter Anderem
                        auch Lorem Ipsum: Ein schöner Test, Eins, Zwei, Drei, Vier und Fünf
                        <br/>
                        <span class="date-today"></span>
                    </small>
                </div>
                <div class="p-2">
                    <button class="btn btn-dark float-right"><i class="fas fa-times"></i></button>
                </div>
            </div>


            <h3 class="border-bottom">Section title</h3>

            <div id="chart" class="d-flex pt-3"></div>

            <script type="text/javascript">

                $.getJSON(
                    '../app/model/usdeur.json',
                    function (data) {

                        Highcharts.chart('chart', {
                            chart: {
                                zoomType: 'x'
                            },
                            title: {
                                text: 'USD to EUR exchange rate over time'
                            },
                            subtitle: {
                                text: document.ontouchstart === undefined ?
                                    'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                            },
                            xAxis: {
                                type: 'datetime'
                            },
                            yAxis: {
                                title: {
                                    text: 'Exchange rate'
                                }
                            },
                            legend: {
                                enabled: false
                            },
                            plotOptions: {
                                area: {
                                    fillColor: {
                                        linearGradient: {
                                            x1: 0,
                                            y1: 0,
                                            x2: 0,
                                            y2: 1
                                        },
                                        stops: [
                                            [0, '#DC143C'],
                                            [1, Highcharts.Color('#DC143C').setOpacity(0).get('rgba')]
                                        ]
                                    },
                                    marker: {
                                        radius: 2
                                    },
                                    lineWidth: 1,
                                    states: {
                                        hover: {
                                            lineWidth: 1
                                        }
                                    },
                                    threshold: null
                                },
                                line: {
                                    color: '#DC143C'
                                }
                            },

                            series: [{
                                lineColor: Highcharts.getOptions().colors[1],
                                /*color: Highcharts.getOptions().colors[2],*/
                                type: 'area',
                                name: 'USD to EUR',
                                data: data
                            }]
                        });
                    }
                );
            </script>

            <div class="d-flex table-responsive pt-3">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                        <th>Header</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1,001</td>
                        <td>Lorem</td>
                        <td>ipsum</td>
                        <td>dolor</td>
                        <td>sit</td>
                    </tr>
                    <tr>
                        <td>1,002</td>
                        <td>amet</td>
                        <td>consectetur</td>
                        <td>adipiscing</td>
                        <td>elit</td>
                    </tr>
                    <tr>
                        <td>1,001</td>
                        <td>Lorem</td>
                        <td>ipsum</td>
                        <td>dolor</td>
                        <td>sit</td>
                    </tr>
                    <tr>
                        <td>1,002</td>
                        <td>amet</td>
                        <td>consectetur</td>
                        <td>adipiscing</td>
                        <td>elit</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Recent updates</h6>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt=""
                         class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@username</strong>
                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo,
                        tortor mauris
                        condimentum nibh, ut fermentum massa justo sit amet risus.
                    </p>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt=""
                         class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@username</strong>
                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo,
                        tortor mauris
                        condimentum nibh, ut fermentum massa justo sit amet risus.
                    </p>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt=""
                         class="mr-2 rounded">
                    <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <strong class="d-block text-gray-dark">@username</strong>
                        Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo,
                        tortor mauris
                        condimentum nibh, ut fermentum massa justo sit amet risus.
                    </p>
                </div>
                <small class="d-block text-right mt-3">
                    <a href="#">All updates</a>
                </small>
            </div>

            <div class="my-3 p-3 bg-white rounded box-shadow">
                <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt=""
                         class="mr-2 rounded">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark">Full Name</strong>
                            <a href="#">Follow</a>
                        </div>
                        <span class="d-block">@username</span>
                    </div>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt=""
                         class="mr-2 rounded">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark">Full Name</strong>
                            <a href="#">Follow</a>
                        </div>
                        <span class="d-block">@username</span>
                    </div>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt=""
                         class="mr-2 rounded">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark">Full Name</strong>
                            <a href="#">Follow</a>
                        </div>
                        <span class="d-block">@username</span>
                    </div>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt=""
                         class="mr-2 rounded">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark">Full Name</strong>
                            <a href="#">Follow</a>
                        </div>
                        <span class="d-block">@username</span>
                    </div>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt=""
                         class="mr-2 rounded">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark">Full Name</strong>
                            <a href="#">Follow</a>
                        </div>
                        <span class="d-block">@username</span>
                    </div>
                </div>
                <div class="media text-muted pt-3">
                    <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt=""
                         class="mr-2 rounded">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <strong class="text-gray-dark">Full Name</strong>
                            <a href="#">Follow</a>
                        </div>
                        <span class="d-block">@username</span>
                    </div>
                </div>
                <small class="d-block text-right mt-3">
                    <a href="#">All suggestions</a>
                </small>
            </div>
        </main>
    </div>
</div>