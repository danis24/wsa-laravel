@extends('layouts.app')

@section('content')
<div class="row">
     <div class="col-lg-12">
         @include('sweet::alert')
     </div>
     <div class="col-lg-12">
          <div class="ibox float-e-margins">
               <div class="ibox-title">
                    <h5>Target For Scans</h5>
               </div>
               <div class="ibox-content">
                    <div class="row">
                         <div class="col-sm-5 m-b-xs">
                              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#targetModal"><i class="fa fa-plus"></i>&nbsp;Add Target / Domains</button>
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
                                        <th width="10px">#</th>
                                        <th width="100px">IP</th>
                                        <th width="200px">Address / Domain</th>
                                        <th width="150px">Country</th>
                                        <th>Progress</th>
                                        <th width="100px">Status</th>
                                        <th width="150px">Vulnerabilities</th>
                                        <th width="100px">Action</th>
                                   </tr>
                              </thead>
                              <tbody>
                                   <?php
                                   $no = 1;
                                   ?>
                                   @foreach($sites as $site)
                                   <tr>
                                        <td><?= $no++;?></td>
                                        <td>{{ $site['ip']}}</td>
                                        <td><a href="http://{{ $site['url'] }}" target="_blank">http://{{ $site['url'] }}/</a></td>
                                        <td>{{ $site['country'] }}</td>
                                        <td>
                                             <div class="progress progress-striped">
                                                  <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" role="progressbar" class="progress-bar progress-bar-warning">
                                                       <span class="sr-only">40% Complete (success)</span>
                                                  </div>
                                             </div>
                                        </td>
                                        <td>
                                             @if ($site['status'] == 'verified')
                                             <span class="label label-success">Verify</span>
                                             @else
                                             <a href="target/verification/{{ $site['id']}}"><span class="label label-danger">Not Verified</span></a>
                                             @endif
                                        </td>
                                        <td>
                                             <a href="#" title="High"><span class="label label-danger">0</span></a>
                                             <a href="#" title="Medium"><span class="label label-warning">0</span></a>
                                             <a href="#" title="Low"><span class="label label-success">0</span></a>
                                        </td>
                                        <td>
                                             <a href="" class="btn btn-success" type="button" title="Scan Your Webite"><i class="fa a-fw fa-dot-circle-o"></i></a>
                                             <a href="/targets/vulnerabilities" class="btn btn-primary" type="button" title="Vulnerabilities"><i class="fa a-fw fa-file-o"></i></a>
                                        </td>
                                   </tr>
                                   @endforeach
                              </tbody>
                         </table>
                    </div>
               </div>
          </div>
     </div>
</div>
<div class="modal inmodal" id="targetModal" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
     <div class="modal-dialog">
          <div class="modal-content animated fadeIn">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title">Add Url For Scan</h4>
               </div>
               <form method="POST" action="{{ route('target/add') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">
                         <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                              <label>Site</label>
                              <input type="text" name="url" placeholder="http://sites.com" class="form-control">
                              @if ($errors->has('url'))
                              <span class="help-block">
                                   <strong>{{ $errors->first('url') }}</strong>
                              </span>
                              @endif
                         </div>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
               </form>
          </div>
     </div>
</div>
@endsection
