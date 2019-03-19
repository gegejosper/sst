@extends('admin.layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Create Purchase Request
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                  <form action="{{ route('createpurchase') }}" method="post">	
                        {{ csrf_field() }}
                        <fieldset>	                                        
                            <div class="form-group">
                              <label class="control-label" for="Purchase #" >Purchase #:</label>
                              @forelse($dataPurchaserequest as $request)
                              <?php 
                              $prnum = date("mdY");
                              ?>
                              <input type="text" class="form-control" placeholder="Purchase #"  aria-describedby="basic-addon2" name="purchasenumber" id="purchasenumber" value="SST-{{$prnum}}-{{$request->id + 1}}">
                              @empty
                              <input type="text" class="form-control" placeholder="Purchase #"  aria-describedby="basic-addon2" name="purchasenumber" id="purchasenumber" value="SST-01">
                              @endforelse 
                            </div>
                            <div class="form-group">
                              <label class="control-label" for="date" >Date:</label>
                              <input class="form-control" type="text" name="purchasedate" id="purchasedate" aria-describedby="basic-addon2" value="<?php echo date('m/d/Y'); ?>">
                              
                            </div>      
                            <button type="submit" class="btn btn-warning btn-small form-control">Create Purchase Request</button>      
                        </fieldset>
                  </form>   
                </div>
                <div class="x_title">
                    <h2>Purchase Order History
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="table table-striped table-bordered">
                        <th>Purchase Number</th>
                        <th>Status</th>
                        <th>Date</th>
                    
                      @foreach($dataPurchase as $puchase)
                      <tr>
                        <td><a href="/admin/purchase/history/{{$puchase->purchasenumber}}">{{$puchase->purchasenumber}}</a></td>
                        <td><?php
                          if ($puchase->status == 1){
                            echo "<em>Requesting</em>";
                          }
                          elseif($puchase->status == 2){
                            echo "<em>Received</em>";
                          }
                          else {
                            echo "<em>Waiting</em>";
                          }
                        ?></td>
                        <td>{{$puchase->date}}</td>
                      </tr>
                      @endforeach 
                    </table>   
                </div>  
         </div>
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Out of Stocks in the Warehouse
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                <table class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          
                          <th>Product Name</th>
                          <th>Quantity</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($dataProductofStock as $OutofStockProduct)
                        <tr>
                       
                          <td>{{$OutofStockProduct->product->product_name}}</td>
                          <td><em class="productprice">{{$OutofStockProduct->warehousequantity}}</em>  </td>
                         
                        </tr>
                        @empty
                        <tr><td colspan='4'><em>No Data</em></td></tr>
                        @endforelse
                      </tbody>
                    </table>   
                </div>
         </div>
      </div>
</div>
@endsection