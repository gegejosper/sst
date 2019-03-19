@extends('cashier.layouts.cashier')
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Return #: {{$returnbatchnum}}
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">   
                <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Quantity </th>
                      <th>Note </th>
                    </tr>
                  </thead>
                  <tbody>
                 
                    @foreach($returnDetails as $Return)
                
                    <tr>
                    
                      <td>{{$Return->product_name}}</a></td>
                      <td>{{$Return->rquantity}}</a></td>
                      <td>{{$Return->note}}</a></td>

                      </tr>
                    @endforeach
                    
                   
                    <tr>
                        <td colspan="5">
                        
                        </td>
                    </tr>
                  </tbody>
                </table>

                <div class="table-responsive">
                    <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                    <script>
                    function myFunction() {
                    window.print();}
                    </script>
                </div>
                </div> <!--end x_content-->
         </div><!--end x_panel-->
    </div><!--end col-->
</div><!--end row-->
@endsection