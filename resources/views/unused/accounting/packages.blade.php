@extends('accounting.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
    <div class="row">
        <div class="span6">
            <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Product List</h3>
                </div>
                <!-- /widget-header -->
                <div class="widget-content">
                <div class="widget big-stats-container">
                    <div class="widget-content">
                    
                    <div id="big_stats" class="cf">
                        <div class="control-group padding-20">	
                        <table class="table table-striped table-bordered" id="table">
                <thead>
                  <tr>
                    <!-- <th>Product ID</th> -->
                    <th>Package Name</th>
                    <th>Package Price</th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
            
  				
                  @foreach($dataPackage as $Package)
                  <tr class="item{{$Package->id}}">
                    <td> <a href="/accounting/packages/{{$Package->id}}" class="name">{{$Package->packagename}}</a> </td>
                    <td>{{$Package->packageprice}}</td>
                    <td style="width:100px;" class="td-actions"><a href="/accounting/packages/{{$Package->id}}" class="btn btn-mini btn-info" ><i class="icon-search"> </i></a><a href="javascript:;" class="edit-modal btn btn-mini btn-info" data-id="{{$Package->id}}" data-name="{{$Package->packagename}}" data-description="{{$Package->description}}" data-price="{{$Package->packageprice}}"><i class="icon-pencil"> </i></a>  </td>
                    
                   </tr>
                   @endforeach
                </tbody>
              </table>          
                        </div>  <!-- .stat --> 
                    </div>
                    </div>
                    <!-- /widget-content --> 
                </div>
                </div>
            </div>
        </div>
    </div>
   
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
  						<div class="form-group" style="display:none;">
  							<label class="control-label col-sm-2" for="id">ID:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="fid" disabled>
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="package_name" >Package Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="packageedit_name" name="packageedit_name">
  							</div>
                            <label class="control-label col-sm-2" for="description" >Description:</label>
  							<div class="col-sm-10">
                            <textarea name="editdescription" id="editdescription" cols="30" rows="10"></textarea>
  							</div>
                            <label class="control-label col-sm-2" for="Package Price" >Package Price:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="packagepriceedit" name="packagepriceedit">
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
<script src="{{ asset('js/packagescript.js') }}"></script>
<!-- /main -->
@endsection