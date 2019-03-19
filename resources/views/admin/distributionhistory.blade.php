@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12 hidden-print">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Distribution Record History
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">  
                  <table class="table table-striped table-bordered">
                      <th>Distribution Number</th>
                      <th>Branch</th>
                      <th>Status</th>
                      <th>Date</th>
                   
                    @foreach($dataDistributionList as $Distribution)
                    <tr>
                      <td><a href="/admin/distribution/history/{{$Distribution->distributionnumber}}">{{$Distribution->distributionnumber}}</a></td>
                      <td><a href="/admin/branchs/{{$Distribution->branchid}}">{{$Distribution->branch->branch_name}}</a></td>
                      <td><?php
                        if ($Distribution->status == 1){
                          echo "<em>Delivery</em>";
                        }
                        elseif($Distribution->status == 2){
                          echo "<em>Received</em>";
                        }
                        else {
                          echo "<a href='/admin/distribution/$Distribution->distributionnumber'><em>Not Confirmed</em>";
                        }
                      ?></td>
                      <td>{{$Distribution->date}}</td>
                    </tr>
                    @endforeach 
                    </table> 
                </div>
         </div>
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Distribution # <strong>{{$distributionnumber}}</strong>
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content"> 
                        <table class="table table-striped table-bordered">
                          <thead>
                            <tr>
                              <th>Product Name</th>
                              <th>Quantity</th>
                              <th>Recieve Quantity</th>
                              <th>Status</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($dataDistributionrecord as $Record)
                                <tr>
                                    <td>{{$Record->product->product_name}}</td>
                                    <td>{{$Record->quantity}}</td>
                                    <td>{{$Record->recievequantity}}</td>
                                    <td style="width:100px;" class="td-actions">
                                    <?php 
                                    if($Record->status == 0)
                                    {
                                    ?><em>Delivery</em>
                                    <?php 
                                    }
                                    else {
                                    ?>
                                    <em>Recieved</em>
                                    <?php
                                    }
                                    
                                    ?>
                                    </td>
                                </tr>
                            @endforeach 
                          </tbody>
                      </table>     
                    <button style="margin:20px 0px; float: right;"class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                    <script>
                    function myFunction() {
                    window.print();}
                    </script>  
                </div>
         </div>
      </div>
</div>
@endsection