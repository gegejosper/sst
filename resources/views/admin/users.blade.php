@extends('admin.layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Add User
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content"> 
                  {{ csrf_field() }}
                    <div id="formerrors"></div>
                        <fieldset>	                                        
                                          <div class="input-group mb-3">
                                          <div class="form-group">
                                          <label for="Name">Name</label>
                                          <input type="text" class="form-control" placeholder="Name"  aria-describedby="basic-addon2" name="name">
                                          </div>
                                          <div class="input-group mb-3">
                                          <label for="Email">Email</label>
                                          <input type="email" class="form-control" placeholder="Email"  aria-describedby="basic-addon2" name="email">
                                          </div>
                                          <div class="input-group mb-3">
                                          <label for="password">Password</label>
                                          <input id="password" type="password" class="form-control" name="password" aria-describedby="basic-addon2" required>
                                          </div>
                                          <div class="input-group mb-3">
                                          <label for="usertype">Usertype</label>
                                          <select name="usertype" id="usertype" aria-describedby="basic-addon2" class="form-control mb-3">
                                          <option value="admin" class="form-control mb-3">Admin</option>
                                          <!-- <option value="checker" class="form-control mb-3">Checker</option>
                                          <option value="accounting" class="form-control mb-3">Accounting</option> -->
                                          </select>
                                          </div>
                                          <div class="input-group mb-3">
                                          <button class="btn btn-primary" type="submit" id="add">Save</button> 
                                          </div>
                                          </div> 
                        </fieldset>  
                </div> <!--end x_content-->
         </div><!--end x_panel-->
         <div class="x_panel">
                  <div class="x_title">
                    <h2>Settings Shortcuts
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 
                              <a href="/admin/settings" class="btn btn-app">
                                <i class="fa fa-gear"></i> Settings
                              </a>
                              <a href="/admin/categories" class="btn btn-app">
                                <i class="fa fa-sitemap"></i> Categories
                              </a>
                              <a href="/admin/users" class="btn btn-app"><i class="fa fa-group"></i> Users
                              </a>
                  </div>
          </div>
    </div><!--end col-->
    <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Users
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
                          @foreach($data as $User)
                          <tr class="item{{$User->id}}">
                            <td> <a href="users/{{$User->id}}" class="name">{{$User->name}}</a> </td>
                            <td> {{$User->email}}</td>
                            <td style="width:200px !important; "> 
                            <?php  
                            // $pass = $User->password;
                            // $pos=strpos( $pass, ' ', 50);
                            //   echo substr( $pass,0,$pos );  ?>
                            {{ str_limit($User->password, $limit = 20, $end = '...') }}
                            </td>
                            <td> {{$User->usertype}}</td>
                            <td class="td-actions">
                                <a href="javascript:;" class=" edit-modal btn btn-small btn-success" data-id="{{$User->id}}" data-name="{{$User->name}}" data-email="{{$User->email}}" data-usertype="{{$User->usertype}}" data-password="{{$User->password}}"><i class="fa fa-pencil"> Edit</i></a>
                                <!-- <a href="javascript:;" class="delete-modal btn btn-danger btn-small" data-id="{{$User->id}}"><i class="btn-icon-only icon-remove"> </i></a> -->
                              </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>   
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
</div><!--end row-->

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
                    <option value="admin">Admin</option>
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
<script src="{{ asset('js/usersscript.js') }}"></script>
<!-- /main -->
@endsection