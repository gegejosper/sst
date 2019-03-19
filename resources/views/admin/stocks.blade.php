@extends('admin.layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12 noprint">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>View Stocks
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content"> 
                  @foreach($dataBranch as $Branch)

                      <a href="/admin/branch/stocks/{{$Branch->id}}" class="btn btn-app">
                                <i class="fa fa-sitemap"></i> {{$Branch->branch_name}}
                      </a>
                      @endforeach  
                </div>
         </div>
      </div>
      <div class="col-md-9 col-sm-9 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Products
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                <div class="col-sm-12 col-md-6 noprint">
                    <div>{{ $dataProduct->links() }}</div> 
                </div>
                <div class="col-sm-12 col-md-6 noprint">
                    <form method="get" action="/admin/stockssearch">         
                        <div class="input-group">
                            <input type="search" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i></button>
                            </span>
                          </div>
                        {{ csrf_field() }}
                        </span>
                    </form>
                </div>
                  <table class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Product Name</th>
                      <th>Warehouse Quantity</th>
                      <th>On Delivery</th>
                      <th>On Branch</th>
                      <th>Total Quantity</th>
                      <th class="td-actions noprint"> Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dataProduct as $Product)
                    <tr class="item{{$Product->id}}">
                    <td>{{$Product->updated_at}}</td>
                      <td><a href="/admin/products/{{$Product->id}}">{{ ucwords($Product->product_name) }}</a></td>
                      <td>
                      <?php  $warehousequantity = 0; ?>
                      @forelse ($Product->productskus as $wquantity)
                      <?php 
                      $warehousequantity = $warehousequantity + $wquantity->warehousequantity;
                      
                      ?>
                      {{$wquantity->varoption->option_name}} ({{$wquantity->warehousequantity}}) <br>
                      @empty
                      <?php $warehousequantity = 0; 
                      echo $warehousequantity;
                      ?>
                      @endforelse
                      </td>
                      <!-- <td>{{$Product->warehousequantity}}</td> -->
                      <td>
                      <?php  $quantity = 0; ?>
                      @forelse ($Product->distributionrecord as $warehousequantity)
                      <?php 
                      if($warehousequantity->status == 0) {
                        $quantity = $quantity + $warehousequantity->quantity;
                      }
                      ?>
                      @empty
                      <?php $quantity = 0; ?>
                      @endforelse
                      <?php 
                      echo $quantity;
                      ?>
                      </td>
                      <td>
                      <?php  $Branchquantity = 0; ?>
                      @forelse ($Product->productquantities as $bquantity)
                      <?php 
                      $Branchquantity = $Branchquantity + $bquantity->quantity;
                      
                      ?>
                      <a href="/admin/branch/stocks/{{$bquantity->branch['id']}}">{{$bquantity->branch['branch_name']}} - {{$bquantity->variation['option_name']}} ({{$bquantity->quantity}}) </a> <br>
                      @empty
                      <?php $Branchquantity = 0; 
                      echo $Branchquantity;
                      ?>
                      @endforelse
                      </td>
                      <td><?php
                      echo  $wquantity->warehousequantity + $quantity + $Branchquantity;
                      ?></td>
                      <td style="width:100px;" class="td-actions noprint"><a href="/admin/products/{{$Product->id}}" class="btn btn-mini btn-info"  ><i class="icon-search"> </i>View</a> </td>
                      
                    </tr>
                    @endforeach
                    <tr>
                            <td colspan="7">
                            <button class="btn btn-primary hidden-print noprint" align="right" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
                            <script>
                            function myFunction() {
                            window.print();}
                            </script>
                            </td>
                        </tr>
                  </tbody>
                </table>   
                </div>
         </div>
      </div>
</div>
@endsection