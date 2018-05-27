@extends('layouts.app')

@section('content')
<div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Report For Vulnerabilities</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-sm-5 m-b-xs">
                            <button class="btn btn-success" type="button"><i class="fa fa-print"></i>&nbsp;Generate Report</button>
                        </div>
                        <div class="col-sm-4 m-b-xs">

                        </div>
                        <div class="col-sm-3">
                            <div class="input-group">
                                <input type="text" placeholder="Search" class="input-sm form-control"> <span class="input-group-btn">
                                    <button type="button" class="btn btn-sm btn-primary"> Go!</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Severity</th>
                                    <th>Vulnerabilities</th>
                                    <th>IP/URL</th>
                                    <th>Country</th>
                                    <th>Parameter</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><a href="#"><span class="label label-danger">High</span></a></td>
                                    <td><a href="#"><span>Sql Injection</span></a></td>
                                    <td>192.168.3.5 / <a href="http://danistutorial.com/" target="_blank">http://danistutorial.com/</a></td>
                                    <td>United State</td>
                                    <td>http://danistutorial.com/index.php?id=2</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
