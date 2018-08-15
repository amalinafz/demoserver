@extends('layouts.app')

@section('content')

    {{-- <div role="navigation">
        <ul class="nav justify-content-end md-pills pills-unique">
            <li class="nav-item">
                <a class="nav-link  active" href="#table" data-toggle="tab" role="tab" style="margin:auto;background-color: white;"><i class="fa fa-table " aria-hidden="true"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#graph" data-toggle="tab" role="tab" style="margin:auto;background-color: white;"><i class="fa fa-bar-chart " aria-hidden="true"></i></a>
            </li>
        </ul>
    </div>

    <div class="tab-content">
        <div class="tab-pane fade in show active" id="table" role="tabpanel">
        
            <div id="myDiv" class="responsive-plot"></div>
            <img id="jpg-export"></img> 
        </div>

        <div class="tab-pane fade" id="graph" role="tabpanel">
            
        </div>
    </div> --}}

    <!-- Nav tabs -->
    <div class="row">
        <div class="col-md-3">
            <ul class="nav  md-pills pills-primary flex-column" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#panel21" role="tab">Downloads
                    <i class="fa fa-download ml-2"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel22" role="tab">Orders & invoices
                    <i class="fa fa-file-text ml-2"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#panel23" role="tab">Billing details
                    <i class="fa fa-address-card ml-2"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="col-md-9">
            <!-- Tab panels -->
            <div class="tab-content vertical">
            <!--Panel 1-->
            <div class="tab-pane fade in show active" id="panel21" role="tabpanel">

                <!-- Nav tabs -->
                <div class="row">
                    <div class="col-md-3">
                        <ul class="nav  md-pills pills-primary flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#panel21" role="tab">Downloads
                                <i class="fa fa-download ml-2"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#panel22" role="tab">Orders & invoices
                                <i class="fa fa-file-text ml-2"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#panel23" role="tab">Billing details
                                <i class="fa fa-address-card ml-2"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        <!-- Tab panels -->
                        <div class="tab-content vertical">
                        <!--Panel 1-->
                        <div class="tab-pane fade in show active" id="panel21" role="tabpanel">

                            <h5 class="my-2 h5">Panel 1</h5>

                        </div>
                        <!--/.Panel 1-->

                        <!--Panel 2-->
                        <div class="tab-pane fade" id="panel22" role="tabpanel">

                            <h5 class="my-2 h5">Panel 2</h5>

                        </div>
                        <!--/.Panel 2-->
                        <!--Panel 3-->
                        <div class="tab-pane fade" id="panel23" role="tabpanel">

                            <h5 class="my-2 h5">Panel 3</h5>

                        </div>
                        <!--/.Panel 3-->
                        </div>
                    </div>
                </div>
                <!-- Nav tabs -->

            </div>
            <!--/.Panel 1-->

            <!--Panel 2-->
            <div class="tab-pane fade" id="panel22" role="tabpanel">

                <h5 class="my-2 h5">Panel 2</h5>

            </div>
            <!--/.Panel 2-->
            <!--Panel 3-->
            <div class="tab-pane fade" id="panel23" role="tabpanel">

                <h5 class="my-2 h5">Panel 3</h5>

            </div>
            <!--/.Panel 3-->
            </div>
        </div>
    </div>
    <!-- Nav tabs -->

        
        
    
@endsection

@push('scripts')


    <script>

        var d3 = Plotly.d3;
        var img_jpg= d3.select('#jpg-export');
        // initial data..
        z1 = [
            [8.83,8.89,8.81,8.87,8.9,8.87],
            [8.89,8.94,8.85,8.94,8.96,8.92],
            [8.84,8.9,8.82,8.92,8.93,8.91],
            [8.79,8.85,8.79,8.9,8.94,8.92],
            [8.79,8.88,8.81,8.9,8.95,8.92],
            [8.8,8.82,8.78,8.91,8.94,8.92],
            [8.75,8.78,8.77,8.91,8.95,8.92],
            [8.8,8.8,8.77,8.91,8.95,8.94],
            [8.74,8.81,8.76,8.93,8.98,8.99],
            [8.89,8.99,8.92,9.1,9.13,9.11],
            [8.97,8.97,8.91,9.09,9.11,9.11],
            [9.04,9.08,9.05,9.25,9.28,9.27],
            [9,9.01,9,9.2,9.23,9.2],
            [8.99,8.99,8.98,9.18,9.2,9.19],
            [8.93,8.97,8.97,9.18,9.2,9.18]
        ];
        // generating data for other traces..
        z2 = [];
        for (var i=0;i<z1.length;i++ ) { 
            z2_row = [];
            for(var j=0;j<z1[i].length;j++) { 
                z2_row.push(z1[i][j]+1);
            }
            z2.push(z2_row);
        }

        z3 = []
        for (var i=0;i<z1.length;i++ ) { 
            z3_row = [];
            for(var j=0;j<z1[i].length;j++) { 
                z3_row.push(z1[i][j]-1);
            }
            z3.push(z3_row);
        }

        // creating data objects..
        var data_z1 = {z: z1, type: 'surface'};
        var data_z2 = {z: z2, showscale: false, opacity:0.9, type: 'surface'};
        var data_z3 = {z: z3, showscale: false, opacity:0.9, type: 'surface'};

        // Plotting the surfaces..
        Plotly.newPlot('myDiv', [data_z1, data_z2, data_z3]).then(
            function(gd)
             {
              Plotly.toImage(gd)
                 .then(
                    function(url)
                 {
                     img_jpg.attr("src", url);
                     return Plotly.toImage(gd,{format:'jpeg',height:400,width:400});
                 }
                 )
            });
    </script>

    {{-- <script type="text/javascript">
        var trace1 = {
          x: [0, 1, 2, 3, 4, 5],
          y: [1.5, 1, 1.3, 0.7, 0.8, 0.9],
          type: 'scatter'
        };

        var trace2 = {
          x: [0, 1, 2, 3, 4, 5],
          y: [1, 0.5, 0.7, -1.2, 0.3, 0.4],
          type: 'bar'
        };

        var data = [trace1, trace2];

        Plotly.newPlot('myDiv', data);
    </script> --}}
@endpush