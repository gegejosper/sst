@extends('assistant.layouts.assistant')

@section('content')
 <div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span5">
        <div align="center" style="padding:20px 0px;"><img src="{{ asset('img/logohorizontal.png') }}" align="center"></div>
        <div class="widget widget-table action-table">
        <div class="widget-header">
        <h3>Reciept</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
            <div class="input-append" style="padding:20px;">
                <div class="col-sm-4 invoice-col">
                From:
                <address>
                    <strong>Ching Ching Enterprises</strong><br><br>
                    Amount: <strong> &#8369; <?php echo number_format($request->amounttopay,2); ?></strong><br><br>
                    Amount Paid: <strong> &#8369; <?php echo number_format($request->money,2); ?></strong><br><br>
                    <?php $change = $request->money - $request->amounttopay; ?>
                    Change: <strong> &#8369; <?php echo number_format($change,2); ?></strong><br>
                </address>
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
<script src="{{ asset('js/cashiercartscript.js') }}"></script>
@endsection