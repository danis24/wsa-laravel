@extends('layouts.app')

@section('content')
<div class="row">
     <div class="col-lg-12">
          <div class="ibox float-e-margins">
               <div class="ibox-title">
                    <h5>Profile</h5>
               </div>
               <div class="ibox-content">
                    <form method="get" class="form-horizontal">

                         <!-- Email -->
                         <div class="form-group"><label class="col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                   <div class="input-group">
                                        <input type="text" class="form-control" disabled="" value="danistutorial@gmail.com"><span class="input-group-addon btn btn-primary">Change</span>
                                   </div>
                              </div>
                         </div>

                         <!-- passsword -->
                         <div class="form-group"><label class="col-sm-2 control-label">Password</label>
                              <div class="col-sm-10">
                                   <div class="input-group">
                                        <input type="password" class="form-control" disabled="" value="asjhakhskjahsjh"><span class="input-group-addon btn btn-primary">Change</span>
                                   </div>
                              </div>
                         </div>

                         <!-- First_name -->
                         <div class="form-group"><label class="col-sm-2 control-label">First Name</label>
                              <div class="col-sm-10"><input type="text" class="form-control"></div>
                         </div>

                         <!-- Last_Name -->
                         <div class="form-group"><label class="col-sm-2 control-label">Last Name</label>
                              <div class="col-sm-10"><input type="text" class="form-control"></div>
                         </div>

                         <!-- Phone -->
                         <div class="form-group"><label class="col-sm-2 control-label">Phone</label>
                              <div class="col-sm-10"><input type="text" class="form-control"></div>
                         </div>
                         <div class="form-group">
                              <div class="col-sm-4 col-sm-offset-2">
                                   <button class="btn btn-white" type="submit">Cancel</button>
                                   <button class="btn btn-primary" type="submit">Save changes</button>
                              </div>
                         </div>
                    </form>
               </div>
          </div>
     </div>
</div>
@endsection
