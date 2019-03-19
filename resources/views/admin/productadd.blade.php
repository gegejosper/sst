@extends('admin.layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div id="wizard" class="form_wizard wizard_horizontal">
                      <ul class="wizard_steps anchor">
                        <li>
                          <a class="selected" isdone="1" rel="1">
                            <span class="step_no">1</span>
                            <span class="step_descr">
                                              Step 1<br>
                                              <small>Add Product Details</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a  class="disabled" isdone="0" rel="2">
                            <span class="step_no">2</span>
                            <span class="step_descr">
                                              Step 2<br>
                                              <small>Add Product Variation</small>
                                          </span>
                          </a>
                        </li>
                        <li>
                          <a  class="disabled" isdone="0" rel="3">
                            <span class="step_no">3</span>
                            <span class="step_descr">
                                              Step 3<br>
                                              <small>Add Branch Availability</small>
                                          </span>
                          </a>
                        </li>
                        
                      </ul>
            </div>    
               <div class="x_panel">
                        <div class="x_title">
                            <h2>Add Product Basic Info
                            </h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                                @php
                                Session::forget('success');
                                @endphp
                            </div>
                            @endif 
                            <form action="{{ route('addproducts') }}" method="post">
                                    {{ csrf_field() }}     
                                    
                                    <div class="form-group">
                                        <label for="Product Name">Product Name</label>
                                        <input type="text" class="form-control" placeholder="Product Name"  name="product_name">
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="Description">Description</label>
                                        <div class="controls">
                                            <textarea name="description" id="description" cols="50" rows="10" placeholder="Description" style="width:90%;"></textarea>			
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="Product Unit">Product Unit</label>
                                        <div class="controls">
                                        <select name="unit" id="unit" class="form-control">
                                                <option value="piece">Piece</option>
                                                <option value="roll">Roll</option>
                                                <option value="can">Can</option>
                                                <option value="bottle">Bottle</option>
                                                <option value="pack">Pack</option>
                                                <option value="unit">Unit</option>
                                                <option value="pad">Pad</option>
                                                <option value="box">Box</option>
                                                <option value="container">Container</option>
                                                <option value="set">Set</option>
                                                <option value="bundle">Bundle</option>
                                                <option value="case">Case </option>
                                                <option value="ream">Ream</option>
                                                <option value="pair">Pair</option>
                                        </select>		
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label for="Bulk Quantity">Bulk Quantity</label>
                                        <input type="text" class="form-control" placeholder="Bulk Quantity" name="bulkquantity" required>  
                                        <label class="control-label" for="Bulk Unit">Bulk Unit</label>
                                        <div class="controls">
                                            <select name="bulkunit" id="bulkunit" class="form-control">
                                                    <option value="Box">Box</option>
                                                    <option value="Pack">Pack</option>
                                                    <option value="Container">Container</option>
                                                    <option value="Set">Set</option>
                                                    <option value="Bundle">Bundle</option>
                                                    <option value="Case">Case </option>
                                                    <option value="Ream">Ream</option>
                                            </select>	
                                        </div> 
                                    </div>
                                    <div class="form-group">  
                                        <label for="Brand Name">Brand</label>
                                            <select name="brand_id" id="brand_id" class="form-control">
                                                @foreach($dataBrand as $Brand)
                                                    <option value="{{$Brand->id}}">{{$Brand->brand_name}}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">											
                                            <label for="Category">Category</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                @foreach($dataCategory as $Category)
                                                    <option value="{{$Category->id}}">{{$Category->cat_name}}</option>
                                                @endforeach
                                            </select>           
                                    </div> 
                                    <!-- <div class="control-group">											
                                        <label for="Warehouse Quantity">Warehouse Quantity</label>
                                        <input type="number" class="form-control" placeholder="Warehouse Quantity"  name="warehousequantity">      
                                    </div>   -->
                                    <button class="btn btn-large btn-primary " type="submit">Save</button>      
                                </form>  
                        </div> <!--end x_content-->
                </div><!--end x_panel-->
            </div><!--end col-->
            
        </div><!--end row-->
    </div>
</div>
<!-- /main -->
@endsection