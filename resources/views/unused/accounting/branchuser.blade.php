@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
    <div class="row">
      <div class="span12">
        <div class="widget widget-table action-table">
                <div class="widget-header"> <i class="icon-sitemap"></i>
                <h3>Settings for Branch  @foreach($dataBranch as $Branch)
                                                    {{$Branch->branch_name}}
                                            @endforeach</h3>
                </div>
            <!-- /widget-header -->
            <div class="widget-content">
                <div class="shortcuts"> 
                @foreach($dataBranch as $Branch)
                    <a href="/accounting/branch/stocks/{{$Branch->id}}" class="shortcut reportshortcut" ><i class="shortcut-icon icon-sitemap"></i><span class="shortcut-label">Stocks</span> </a>
                    <a href="/accounting/branch/packages/{{$Branch->id}}" class="shortcut reportshortcut"><i class="shortcut-icon  icon-qrcode"></i><span class="shortcut-label">Packages</span> </a>
                    <a href="/accounting/branch/users/{{$Branch->id}}" class="shortcut reportshortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label">Users</span> </a>
                    <a href="/accounting/branch/subscribers/{{$Branch->id}}" class="shortcut reportshortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label">Subscribers</span> </a>
                    <a href="/accounting/branch/dealers/{{$Branch->id}}" class="shortcut reportshortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label">Dealers</span> </a>
                    <a href="/accounting/report/branch/{{$Branch->id}}" class="shortcut reportshortcut"><i class="shortcut-icon  icon-list-alt"></i> <span class="shortcut-label">Report</span> </a>
                @endforeach
                </div>
              <!-- /shortcuts --> 
            </div>
            <!-- /widget-content --> 
          </div>
        </div>
    </div>
      <div class="row">
        <div class="span4">
        <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-plus"></i>
              <h3>Add Branch User</h3>
            </div>
            <div class="widget-content" style="padding:20px;">
           
            {{ csrf_field() }}
            <div id="formerrors"></div>
									<fieldset>	                                        
                                    <div class="input-group mb-3">
                                    <label for="Name">Name</label>
                                    <input type="text" class="form-control" placeholder="Name"  aria-describedby="basic-addon2" name="name">
                                    <label for="Email">Email</label>
                                    <input type="email" class="form-control" placeholder="Email"  aria-describedby="basic-addon2" name="email">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password" aria-describedby="basic-addon2" required>
                                    <label for="usertype">Usertype</label>
                                    <select name="usertype" id="usertype" aria-describedby="basic-addon2">
                                    <option value="cashier">Cashier</option>

                                    </select>
                                    <label for="Branch">Branch</label>
                                    <select name="branch" id="branch" aria-describedby="basic-addon2">
                                    @foreach($dataBranch as $Branch)
                                      <option value="{{$Branch->id}}">{{$Branch->branch_name}}</option>
                                    @endforeach

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
                <a href="/accounting/categories" class="shortcut"><i class="shortcut-icon icon-sitemap"></i><span class="shortcut-label">Category</span> </a>
                <a href="/accounting/tags" class="shortcut"><i class="shortcut-icon  icon-tags"></i> <span class="shortcut-label">Tags</span> </a>
                <a href="/accounting/users" class="shortcut"><i class="shortcut-icon  icon-group"></i><span class="shortcut-label">Users</span> </a>
                <a href="/accounting/suppliers" class="shortcut"><i class="shortcut-icon  icon-share"></i> <span class="shortcut-label">Suppliers</span> </a>
                <a href="/accounting/brands" class="shortcut"><i class="shortcut-icon icon-briefcase"></i><span class="shortcut-label">Brand</span> </a>
                <a href="/accounting/branchs" class="shortcut"><i class="shortcut-icon  icon-cogs"></i> <span class="shortcut-label">Branch</span> </a>
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
              <h3>Branch User</h3>
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
            
  				
                  @foreach($dataBranchUser as $User)
                  <tr class="item{{$User->id}}">
                    <td> <a href="/accounting/users/{{$User->id}}" class="name">{{$User->user->name}}</a> </td>
                    <td> {{$User->user->email}}</td>
                    <td style="width:200px !important; "> 
                    {{ str_limit($User->user->password, $limit = 20, $end = '...') }}
                     </td>
                    <td>{{$User->user->usertype}}</td>
                    <td class="td-actions"><a href="javascript:;" class=" edit-modal btn btn-small btn-success" data-id="{{$User->user->id}}" data-name="{{$User->user->name}}" data-email="{{$User->user->email}}" data-usertype="{{$User->user->usertype}}" data-password="{{$User->user->password}}"><i class="btn-icon-only icon-pencil"> </i></a><a href="javascript:;" class="delete-modal btn btn-danger btn-small" data-id="{{$User->user->id}}"><i class="btn-icon-only icon-remove"> </i></a></td>
                    
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
<script src="{{ asset('js/branchusersscript.js') }}"></script>
<!-- /main -->
@endsection