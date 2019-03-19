@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span4">
        <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-plus"></i>
              <h3>Add User</h3>
            </div>
            <div class="widget-content" style="padding:20px;">
           
            {{ csrf_field() }}
            <div id="formerrors"></div>
									<fieldset>	                                        
                                    <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Name"  aria-describedby="basic-addon2" name="name">
                                    <input type="email" class="form-control" placeholder="Email"  aria-describedby="basic-addon2" name="email">
                                    <input id="password" type="password" class="form-control" name="password" aria-describedby="basic-addon2" required>
                                    
                                    <select name="usertype" id="usertype" aria-describedby="basic-addon2">
                                    <option value="admin">Admin</option>
                                    <option value="oic">OIC</option>
                                    <option value="accounting">Accounting</option>
                                    <option value="cashier">Cashier</option>
                                    <option value="customer">Customer</option>

                                    </select>
                                    <button class="btn btn-primary" type="submit" id="add">Save</button> 
                                    </div>
										
											
										
									</fieldset>
							
            </div>
            </div>
        <div class="widget">
            <div class="widget-header"> <i class="icon-bookmark"></i>
              <h3>Setting Shortcuts</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="shortcuts"> 
                <a href="/admin/categories" class="shortcut"><i class="shortcut-icon icon-sitemap"></i><span class="shortcut-label">Category</span> </a>
                <a href="/admin/tags" class="shortcut"><i class="shortcut-icon  icon-tags"></i> <span class="shortcut-label">Tags</span> </a>
                <a href="/admin/users" class="shortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label">Users</span> </a>
                <a href="/admin/suppliers" class="shortcut"><i class="shortcut-icon  icon-share"></i> <span class="shortcut-label">Suppliers</span> </a>
                <a href="/admin/brands" class="shortcut"><i class="shortcut-icon icon-briefcase"></i><span class="shortcut-label">Brand</span> </a>
                <a href="/admin/branchs" class="shortcut"><i class="shortcut-icon  icon-cogs"></i> <span class="shortcut-label">Branch</span> </a>
                </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div> 
        </div>

        <!-- /span4 -->
        <div class="span8">
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-sitemap"></i>
              <h3>Suppliers</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
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
                    <td> <a href="users/{{$User->usertype}}" class="name">{{$User->usertype}}</a> </td>
                    <td class="td-actions"><a href="javascript:;" class=" edit-modal btn btn-small btn-success" data-id="{{$User->id}}" data-name="{{$User->name}}" data-email="{{$User->email}}" data-usertype="{{$User->usertype}}" data-password="{{$User->password}}"><i class="btn-icon-only icon-pencil"> </i></a><a href="javascript:;" class="delete-modal btn btn-danger btn-small" data-id="{{$User->id}}"><i class="btn-icon-only icon-remove"> </i></a></td>
                    
                   </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>            

       

        </div>
        <!-- /span4 --> 
      </div>
      <!-- /row --> 

    </div>
    <!-- /container --> 
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
  							
                <select name="edit_usertype" id="useredit_usertype">
                    <option value="admin">Admin</option>
                    <option value="oic">OIC</option>
                    <option value="accounting">Accounting</option>
                    <option value="cashier">Cashier</option>
                    <option value="customer">Customer</option>
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