@extends('cashier.layouts.cashier')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span6">
            
        <div class="widget widget-table action-table">
            <div class="widget-header"> <i class="icon-th-list"></i>
              <h3>Request Order</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th> Request Number </th>
                    <th> Name</th>
                    <th> Date</th>
                    <th class="td-actions"> Actions</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($dataReservation as $Reservation)
                  <tr>
                  <td align="center" style="text-align:center; width:100px;"> <a href="/cashier/orders/{{$Reservation->requestId}}" class="avatar">{{$Reservation->requestId}}</a> </td>
                    <td> <a class="name">{{$Reservation->customer->name}}</a> </td>
                    <td style="text-align:center; width:150px;">{{$Reservation->created_at}}</td>
                    <td class="td-actions"><a href="/cashier/declinereservation/{{$Reservation->requestId}}" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
                  </tr>
                @endforeach            
                </tbody>
              </table>
            </div>
            <!-- /widget-content --> 
          </div>
          <!-- /widget --> 

        </div>
        <!-- /span12 -->

       
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