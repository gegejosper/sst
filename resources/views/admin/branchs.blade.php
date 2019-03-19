@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="x_panel">
            <div class="x_title">
                    <h2>Add Branch
                    </h2>
              <div class="clearfix"></div>
            </div>
            <div class="widget-content" style="padding:20px;">
            {{ csrf_field() }}
									<fieldset>	                                        
                                    
                  <div class="input-group">
                  <input type="text" class="form-control" placeholder="Branch Name"  aria-describedby="basic-addon2" name="branch_name">
                    <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" id="add">Save</button> 
                    </span>
                  </div>
									</fieldset>
            </div>
            </div>
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
        </div>         
    <div class="col-md-6 col-sm-6 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
                    <h2>Branch
                    </h2>
            <div class="clearfix"></div>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered" id="table">
                <thead>
                  <tr>
                    <th> Name</th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($data as $Branch)
                  <tr class="item{{$Branch->id}}">
                    <td> <a href="branchs/{{$Branch->id}}"class="name">{{$Branch->branch_name}}</a> </td>
                    <td class="td-actions">
                    <a href="branchs/{{$Branch->id}}"class="btn btn-small btn-info"><i class="fa fa-search"></i> View</a>
                      <a href="javascript:;" class=" edit-modal btn btn-small btn-success" data-id="{{$Branch->id}}" data-name="{{$Branch->branch_name}}"><i class="fa fa-edit"> </i> Edit </a>
                      <a href="javascript:;" class="delete-modal btn btn-danger btn-small" data-id="{{$Branch->id}}"><i class="fa fa-remove"></i>  Remove</a></td>
                   </tr>
                   @endforeach
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
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
  							<label class="control-label col-sm-2" for="branch_name" >Branch Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="branchedit_name" name="branchedit_name">
                </div>
            
          
                </div>
            
  					</form>
  					<div class="deleteContent">
  						Are you Sure you want to delete <span class="dname"></span> ? <span
  							class="hidden did"></span>
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
<script src="{{ asset('js/branchscript.js') }}"></script>
<!-- /main -->
@endsection