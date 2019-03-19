@extends('cashier.layouts.cashier')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
    <div class="row">
        <div class="span6">
            <div class="widget widget-nopad">
                <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3>Package List</h3>
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
                    <th>Dealers Price</th>
                    <th> Action </th>
                  </tr>
                </thead>
                <tbody>
            
  				
                  @foreach($dataPackage as $Package)
                  <tr class="item{{$Package->id}}">
                    <td> <a href="packages/{{$Package->packageid}}" class="name">{{$Package->package->packagename}}</a> </td>
                    <td>{{$Package->price}}</td>
                    <td>{{$Package->dealersprice}}</td>
                    <td style="width:100px;" class="td-actions">
                    
                        <a href="packages/{{$Package->packageid}}" class="btn btn-mini btn-default" >View</a>
                        <!-- <a href="javascript:;" class="branchedit-modal btn btn-small btn-info" data-id="{{$Package->id}}" data-name="{{$Package->package->packagename}}" data-price="{{$Package->price}}" data-dealersprice="{{$Package->dealersprice}}"><span style="color:#fff;">Update</span></a>   -->
                        </td>
                    
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
  								<input type="hidden" class="form-control" id="fid">
  							</div>
  						</div>
  						<div class="form-group">
  							<label class="control-label col-sm-2" for="package_name" >Package Name:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="packageedit_name" name="packageedit_name" readonly>
  							</div>
                        <label class="control-label col-sm-2" for="Package Price" >Package Price:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="packagepriceedit" name="packagepriceedit">
  							</div>
                              <label class="control-label col-sm-2" for="Dealers Price" >Dealers Price:</label>
  							<div class="col-sm-10">
  								<input type="text" class="form-control" id="dealerpackagepriceedit" name="dealerpackagepriceedit">
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
<script src="{{ asset('js/branchpackagescript.js') }}"></script>
<!-- /main -->
@endsection