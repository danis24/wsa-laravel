@extends('layouts.app')

@section('content')
<div class="row">
     <div class="col-lg-12">
          <div class="ibox float-e-margins">
               <div class="ibox-title">
                    <h5>Target Verification</h5>
                    <div class="label label-danger pull-right">
                         Not Verified
                    </div>
               </div>
               <div class="ibox-content">
                    <h3>
                         Url : <a href="http://{{ $site[0]['url']}}" target="_blank">http://{{ $site[0]['url']}}</a>
                    </h3>
                    <p>
                         The Ownership of each Scan Target needs to be verified before scans can be launched against the Scan Target.
                    </p>
                    <ul>
                         <li>
                              <strong>Web Scans</strong> require that you upload a unique file to the root of your web site.
                         </li>
                    </ul>
                    <hr>
                    <h4>
                         Web Scan Verification <label class="label label-danger">Not Verified</label>
                    </h4>
                    <a href="/target/verification/download/{{ $site[0]['id'] }}" target="_blank" class="btn btn-success">Downoad Verification File</a>
                    <a class="btn btn-primary">Verify Scan Target</a>
                    <br>
                    <br>
                    <p>
                         Verification file URL: <a href="">http://{{$site[0]['url'] }}/{{ $site[0]['tokenSite'] }}.txt</a>
                    </p>
               </div>
          </div>
     </div>
</div>
@endsection
