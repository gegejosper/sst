@extends('assistant.layouts.assistant')

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
                  <td align="center" style="text-align:center; width:100px;"> <a href="/assistant/orders/{{$Reservation->requestId}}" class="avatar">{{$Reservation->requestId}}</a> </td>
                    <td> {{$Reservation->customer->name}} </td>
                    <td style="text-align:center; width:150px;">{{$Reservation->created_at}}</td>
                    <td class="td-actions"><a href="/assistant/declinereservation/{{$Reservation->requestId}}" class="btn btn-danger btn-small"><i class="btn-icon-only icon-remove"> </i></a></td>
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
    
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
@endsection