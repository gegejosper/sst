@extends('cashier.layouts.cashier')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span5">
       
        <div class="widget widget-table action-table">
        <div class="widget-header"> <i class="icon-th-list"></i>
        <h3>Reciept</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <div class="input-append" style="padding:20px;">
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>Package Successfully Processed!</strong>
                    </div>
                <div class="col-sm-4 invoice-col">
                From:
          
                    <strong>Kenlex Telecom</strong><br>
                    OR Number: <strong>{{ $dataPackageOrder->ornumber }}</strong><br>
                    Dealer Name: <strong>{{ ucwords($name) }}</strong><br>
                    Package: <strong>{{$packageName}}</strong><br>
                    Package Quantity : <strong>{{$dataPackageQuantity}}</strong><br>
                    Package Price: <strong> &#8369; </strong><?php echo number_format($dataPackagePrice,2); ?><br>
           
                </div>
                <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                    <script>
                    function myFunction() {
                    window.print();}
                    </script>
                <a href="/cashier/dashboard" class="btn btn-sm btn-success noprint" style="float:right; margin-top:5px;">Back</a>
        </div>
              

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
<!-- /main -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/assistantcartscript.js') }}"></script>
@endsection