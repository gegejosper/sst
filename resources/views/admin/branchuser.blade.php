@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="x_panel">
                  <div class="x_title">
                    <h2>Settings for Branch  
                        @foreach($dataBranch as $Branch)
                          {{$Branch->branch_name}}
                        @endforeach
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    @foreach($dataBranch as $Branch)
                      <a href="/admin/branch/stocks/{{$Branch->id}}" class="btn btn-app" >
                        <i class="fa fa-database"></i><span class="shortcut-label">Stocks</span> 
                      </a>
                      <a href="/admin/branch/users/{{$Branch->id}}" class="btn btn-app">
                        <i class="fa fa-group"></i><span class="shortcut-label">Users</span> 
                      </a>
                      <a href="/admin/report/branch/{{$Branch->id}}" class="btn btn-app">
                          <i class="fa fa-bar-chart"></i> <span class="shortcut-label">Report</span> 
                      </a>
                    @endforeach
                  </div>
            </div>
            <div class="x_panel">
                  <div class="x_title">
                    <h2>Add Branch User
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    {{ csrf_field() }}
                    <div id="formerrors"></div>
                    <style type="text/css">
                    .clearfix{
                      padding-top: 30px !important;
                    }
                    </style>
                      <fieldset>	                                        
                        <div class="form-group">
                          <label for="Name" class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" class="form-control" placeholder="Name"  aria-describedby="basic-addon2" name="name">
                          </div> 
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                          <label for="Email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="email" class="form-control" placeholder="Email"  aria-describedby="basic-addon2" name="email">
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                          <label for="password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="password" type="password" class="form-control" name="password" aria-describedby="basic-addon2" required>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                          <label for="usertype" class="control-label col-md-3 col-sm-3 col-xs-12">Usertype</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="usertype" id="usertype" aria-describedby="basic-addon2" class="form-control"> 
                            <option value="cashier">Cashier</option>
                            <option value="checker">Checker</option>
                            </select>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="form-group">
                        <label for="Branch" class="control-label col-md-3 col-sm-3 col-xs-12">Branch</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                              <select name="branch" id="branch" aria-describedby="basic-addon2" class="form-control">
                            @foreach($dataBranch as $Branch)
                              <option value="{{$Branch->id}}">{{$Branch->branch_name}}</option>
                            @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="clearfix"></div>
                        <button class="btn btn-primary" type="submit" id="add">Save</button> 
                        </div>
									    </fieldset>
            </div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                  <div class="x_title">
                    <h2>Branch User
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <table class="table table-striped table-bordered" id="table">
                      <thead>
                        <tr>
                          <th> Name</th>
                          <th> Email</th>
                          <th style="width:200px !important; "> Password</th>
                          <th> Usertype</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($dataBranchUser as $User)
                        <tr class="item{{$User->userid}}">
                          <td>{{$User->user->name}}</td>
                          <td> {{$User->user->email}}</td>
                          <td style="width:200px !important; "> 
                          {{ str_limit($User->user->password, $limit = 20, $end = '...') }}
                          </td>
                          <td>{{$User->user->usertype}}</td>
                          <td class="td-actions">
                            <a href="javascript:;" class="edit-modal btn btn-small btn-success" 
                              data-id="{{$User->user->id}}" data-name="{{$User->user->name}}" 
                              data-email="{{$User->user->email}}" 
                              data-usertype="{{$User->user->usertype}}" 
                              data-password="{{$User->user->password}}">
                            <i class="fa fa-edit"> </i> Edit </a>
                            </a>
                            
                            <a href="javascript:;" class="delete-modal btn btn-danger btn-small" 
                              data-id="{{$User->user->id}}"><i class="fa fa-remove"></i>  Remove</a></td>
                          
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
            </div>
            <!-- /widget-content --> 
          </div>            

  </div>
  <!-- /main-inner --> 
</div>
<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  			<!-- Modal content-->
  			<div class="modal-content">
  				<div class="modal-header">
  					<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title"></h4>
  				</div>
  				<div class="modal-body">
  					<form class="form-horizontal" role="form">
                      {{ csrf_field() }}
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="id">ID:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="fid" disabled>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="user_name" >Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="useredit_name" >
  							</div>
                <label class="control-label col-sm-2" for="user_email" >Email:</label>
  							<div class="col-sm-10">
  							
                  <input type="text" class="form-control" id="useredit_email">
  							</div>
                <label class="control-label col-sm-2" for="supplier_name" >Password:</label>
  							<div class="col-sm-10">
  							
                <input type="text" class="form-control" id="useredit_pass">
  							</div>
                <label class="control-label col-sm-2" for="supplier_name" >Usertype:</label>
                <div class="col-sm-10">
  							
                <select name="edit_usertype" id="useredit_usertype" class="form-control">
                    <option value="cashier">Cashier</option>
                    <option value="checker">Checker</option>
                </select>
  							</div>
               
                                   
              </div>
            
  					</form>
  					<div class="deleteContent">
  						Are you Sure you want to delete <span class="dname"></span> ? <span
  							class="hidden did"></span>
  					</div>
            <div class="errorContent">
  						There is a problem in adding user account. Please check the details correctly..
  					</div>
  					<div class="modal-footer">
  						<button type="button" class="btn actionBtn" data-dismiss="modal">
  							<span id="footer_action_button" class='glyphicon'> </span>
  						</button>
  						<button type="button" class="btn btn-warning" data-dismiss="modal">
  							<span class='glyphicon glyphicon-remove'></span> Close
  						</button>
  					</div>
  				</div>
  			</div>
		  </div>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
    </div>
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/branchusersscript.js') }}"></script>
<!-- /main -->
@endsection