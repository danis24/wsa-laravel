@extends('layouts.app')

@section('content')
<div class="row">
     <div class="col-lg-3">
          <div class="ibox float-e-margins">
               <div class="ibox-title">
                    <h5>Scans Running</h5>
               </div>
               <div class="ibox-content">
                    <h1 class="no-margins">0</h1><br>
               </div>
          </div>
     </div>
     <div class="col-lg-3">
          <div class="ibox float-e-margins">
               <div class="ibox-title">
                    <h5>Scans Waiting</h5>
               </div>
               <div class="ibox-content">
                    <h1 class="no-margins">0</h1><br>
               </div>
          </div>
     </div>
     <div class="col-lg-3">
          <div class="ibox float-e-margins">
               <div class="ibox-title">
                    <h5>Open Vulnerabilities</h5>
               </div>
               <div class="ibox-content">
                    <h1 class="no-margins">0</h1><br>
               </div>
          </div>
     </div>
     <div class="col-lg-3">
          <div class="ibox float-e-margins">
               <div class="ibox-title">
                    <h5>Total Target</h5>
               </div>
               <div class="ibox-content">
                    <h1 class="no-margins">0</h1><br>
               </div>
          </div>
     </div>
</div>

<div class="row">
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-danger pull-right">High</span>
                <h5>High Vulnerabilities</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">0</h1><br>
                <small>More Detail &gt;</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-warning pull-right">Medium</span>
                <h5>Medium Vulnerabilities</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">0</h1><br>
                <small>More Detail &gt;</small>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right">Low</span>
                <h5>Low Vulnerabilities</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">0</h1><br>
                <small>More Detail &gt;</small>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Country Result Scanner</h5>
                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-xs btn-white active">Today</button>
                        <button type="button" class="btn btn-xs btn-white">Monthly</button>
                        <button type="button" class="btn btn-xs btn-white">Annual</button>
                    </div>
                </div>
            </div>
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="749" height="220" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 681.136px; height: 200px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 56px; top: 185px; left: 68px; text-align: center;">Jan 03</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 56px; top: 185px; left: 129px; text-align: center;">Jan 06</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 56px; top: 185px; left: 191px; text-align: center;">Jan 09</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 56px; top: 185px; left: 253px; text-align: center;">Jan 12</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 56px; top: 185px; left: 314px; text-align: center;">Jan 15</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 56px; top: 185px; left: 376px; text-align: center;">Jan 18</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 56px; top: 185px; left: 437px; text-align: center;">Jan 21</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 56px; top: 185px; left: 499px; text-align: center;">Jan 24</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 56px; top: 185px; left: 560px; text-align: center;">Jan 27</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 56px; top: 185px; left: 622px; text-align: center;">Jan 30</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 171px; left: 19px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 131px; left: 6px; text-align: right;">250</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 91px; left: 6px; text-align: right;">500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 51px; left: 6px; text-align: right;">750</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 11px; left: 0px; text-align: right;">1000</div></div><div class="flot-y-axis flot-y2-axis yAxis y2Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 171px; left: 669px;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 143px; left: 669px;">5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 114px; left: 669px;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 86px; left: 669px;">15</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 57px; left: 669px;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 29px; left: 669px;">25</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 0px; left: 669px;">30</div></div></div><canvas class="flot-overlay" width="749" height="220" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 681.136px; height: 200px;"></canvas><div class="legend"><div style="position: absolute; width: 102.727px; height: 30.9091px; top: 13px; left: 35px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:13px;left:35px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #000000;padding:1px"><div style="width:4px;height:0;border:5px solid #1ab394;overflow:hidden"></div></div></td><td class="legendLabel">Number Of Scan</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #000000;padding:1px"><div style="width:4px;height:0;border:5px solid #1C84C6;overflow:hidden"></div></div></td><td class="legendLabel">Vulnerabilities</td></tr></tbody></table></div></div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <ul class="stat-list">
                            <li>
                                <h2 class="no-margins">United State</h2>
                                <div class="stat-percent">48 <i class="fa fa-level-up text-navy"></i></div>
                                <div class="progress progress-mini">
                                    <div style="width: 48%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins ">Brazil</h2>
                                <div class="stat-percent">60 <i class="fa fa-level-down text-navy"></i></div>
                                <div class="progress progress-mini">
                                    <div style="width: 60%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins ">Australia</h2>
                                <div class="stat-percent">22 <i class="fa fa-bolt text-navy"></i></div>
                                <div class="progress progress-mini">
                                    <div style="width: 22%;" class="progress-bar"></div>
                                </div>
                            </li>
                            <li>
                                <h2 class="no-margins ">Malaysia</h2>
                                <div class="stat-percent">12 <i class="fa fa-bolt text-navy"></i></div>
                                <div class="progress progress-mini">
                                    <div style="width: 12%;" class="progress-bar"></div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
