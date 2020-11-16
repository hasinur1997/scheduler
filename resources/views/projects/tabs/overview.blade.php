<div class="row">
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span 
                    class="info-box-icon bg-info">
                    <i class="far fa-envelope">
                    </i></span>
                    <div class="info-box-content">
                    <span class="info-box-text">Task List</span>
                    <span class="info-box-number">1,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
                <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>

                <div class="info-box-content">
                <span class="info-box-text">Tasks</span>
                <span class="info-box-number">410</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            </div>
                
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-warning">
                        <i class="far fa-copy"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Discussion</span>
                        <span class="info-box-number">13,648</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="info-box">
                    <span class="info-box-icon bg-danger">
                        <i class="far fa-star"></i>
                    </span>
                    <div class="info-box-content">
                        <span class="info-box-text">Milestones</span>
                        <span class="info-box-number">93,139</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary card-outline">
            <div class="card-header">
                        <h3 class="card-title">
                        <i class="far fa-chart-bar"></i>
                        Interactive Area Chart
                        </h3>

                        <div class="card-tools">
                        Real time
                        <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                            <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                            <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
                        </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div 
                            id="interactive" 
                            style="height: 300px; padding: 0px; position: relative;">
                            <canvas 
                                class="flot-base" 
                                width="1119" 
                                height="300" 
                                style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1119px; height: 300px;"
                            >
                            </canvas>
                            <canvas 
                                class="flot-overlay" 
                                width="1119" 
                                height="300" 
                                style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 1119px; height: 300px;"
                            >
                            </canvas>
                            <div 
                                class="flot-svg" 
                                style="position: absolute; top: 0px; left: 0px; height: 100%; width: 100%; pointer-events: none;"
                            >
                            <svg 
                                style="width: 100%; height: 100%;"
                            >
                            <g 
                            class="flot-x-axis flot-x1-axis xAxis x1Axis" 
                                style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"
                            >
                                <text 
                                    x="28.1171875" 
                                    y="294.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: center;"
                                >
                                    0
                                </text>
                                <text 
                                    x="133.32694128787878" 
                                    y="294.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: center;"
                                >
                                    10
                                </text>
                                <text 
                                    x="242.11482007575756" 
                                    y="294.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: center;"
                                >
                                    20
                                </text>
                                <text 
                                    x="350.9026988636364" 
                                    y="294.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: center;"
                                >
                                    30
                                </text>
                                <text 
                                    x="459.6905776515151" 
                                    y="294.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: center;"
                                >
                                    40
                                </text>
                                <text 
                                    x="568.478456439394" 
                                    y="294.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: center;"
                                >
                                50
                                </text>
                                <text 
                                x="677.2663352272727" 
                                y="294.5" 
                                class="flot-tick-label tickLabel" 
                                style="position: absolute; text-align: center;"
                                >
                                60
                                </text>
                                <text 
                                    x="786.0542140151515" 
                                    y="294.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: center;"
                                >
                                    70
                                </text>

                                <text 
                                    x="894.8420928030303" 
                                    y="294.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: center;"
                                >
                                    80
                                </text>
                                <text 
                                    x="1003.6299715909091" 
                                    y="294.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: center;"
                                >
                                    90
                                </text>
                            </g>
                            <g 
                                class="flot-y-axis flot-y1-axis yAxis y1Axis" 
                                style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"
                            >
                                <text 
                                    x="8.15625" 
                                    y="270.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: right;"
                                >
                                    0
                                </text>
                                <text 
                                    x="1" 
                                    y="13.5" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: right;"
                                >
                                    70
                                </text>
                                <text 
                                    x="1" 
                                    y="233.78571428571428" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: right;"
                                >
                                    10
                                </text>
                                <text 
                                    x="1" 
                                    y="197.07142857142856" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: right;"
                                >
                                    20
                                </text>
                                <text 
                                    x="1" 
                                    y="160.35714285714286" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: right;"
                                >
                                    30
                                </text>
                                <text 
                                    x="1" 
                                    y="123.64285714285714" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: right;"
                                >
                                    40
                                </text>
                                <text 
                                    x="1" 
                                    y="86.92857142857143" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: right;"
                                >
                                    50
                                </text>
                                <text 
                                    x="1" 
                                    y="50.214285714285715" 
                                    class="flot-tick-label tickLabel" 
                                    style="position: absolute; text-align: right;"
                                >
                                    60
                                </text>
                            </g>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Col -->

    <div class="col-md-3">
        <users :team="{{ active_team() }}" :project="{{ $project }}"></user>
    </div>
</div>
