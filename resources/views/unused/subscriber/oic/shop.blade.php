@extends('admin.layouts.admin')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
            
        <div class="widget widget-table action-table">
            <div class="widget-header"> 
            <i class="icon-th-list"></i>
              <h3>Request Order</h3>
              <div style="float:right;"><button type="button" class="btn btn-primary btn-lg" >+Add</button></div>
            </div>
           
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Product Picture </th>
                    <th> Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Category</th>
                    <th>Tags</th>
                    <th class="td-actions"> Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('img/message_avatar1.png') }}"/></a> </td>
                    <td> <a class="name">Product Name</a> </td>
                    <td>25 pcs</td>
                    <td>250.00</td>
                    <td>Spare Parts</td>
                    <td>XRM</td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only  icon-pencil"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('img/message_avatar1.png') }}"/></a> </td>
                    <td> <a class="name">Product Name</a> </td>
                    <td>25 pcs</td>
                    <td>250.00</td>
                    <td>Spare Parts</td>
                    <td>XRM</td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only  icon-pencil"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('img/message_avatar1.png') }}"/></a> </td>
                    <td><a class="name">Product Name</a> </td>
                    <td>25 pcs</td>
                    <td>250.00</td>
                    <td>Spare Parts</td>
                    <td>XRM</td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only  icon-pencil"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                  <td align="center" style="text-align:center"><a href="#" class="avatar"><img src="{{ asset('img/message_avatar1.png') }}"/></a> </td>
                    <td><a class="name">Product Name</a></td>
                    <td>25 pcs</td>
                    <td>250.00</td>
                    <td>Spare Parts</td>
                    <td>XRM</td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only  icon-pencil"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                  <tr>
                  <td align="center" style="text-align:center"> <a href="#" class="avatar"><img src="{{ asset('img/message_avatar1.png') }}"/></a></td>
                    <td> <a class="name">Product Name</a> </td>
                    <td>25 pcs</td>
                    <td>250.00</td>
                    <td>Spare Parts</td>
                    <td>XRM</td>
                    <td class="td-actions"><a href="javascript:;" class="btn btn-small btn-success"><i class="btn-icon-only  icon-pencil"> </i></a><a href="javascript:;" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 

        </div>

        <!-- /span4 --> 

      </div>
      <!-- /row --> 
      <div class="row">
	      	
	      	<div class="span12">
              <div class="widget-header">
						<i class="icon-star"></i>
						<h3>Daily Sales Summary Report</h3>
					</div>
	      	<div class="info-box">
               <div class="row-fluid stats-box">
                   
                  <div class="span4">
                  	<div class="stats-box-title">Branch 1</div>
                    <div class="stats-box-all-info"><i class="icon-money" style="color:#3366cc;"></i> 555K</div>
                    
                  </div>
                  
                  <div class="span4">
                    <div class="stats-box-title">Branch 2</div>
                    <div class="stats-box-all-info"><i class="icon-money" style="color:#F30"></i> 66.66</div>
                   
                  </div>
                  
                  <div class="span4">
                    <div class="stats-box-title">Total Sales</div>
                    <div class="stats-box-all-info"><i class="icon-money" style="color:#3C3"></i> 15.55</div>
                    
                  </div>
               </div>
               
               
             </div>
               
               
         </div>
         </div>
    <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
@endsection