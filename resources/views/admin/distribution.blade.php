@extends('admin.layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Create Distribution Record
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content"> 
                <form action="{{ route('createdistributionAdmin') }}" method="post">	
                  {{ csrf_field() }}
									<fieldset>	                                        
                                    
                                    <div class="form-group">
                                      <label class="control-label" for="Distribution #" >Distribution #:</label>
                                      <?php 
                                      $prnum = date("mdY");
                                      ?>
                                      @forelse($dataDistribution as $record)
                                    
                                      <input type="text" class="form-control" placeholder="Distribution #"  aria-describedby="basic-addon2" name="distributionnumber" id="distributionnumber" value="DR-{{$prnum}}-{{$record->id + 1}}">
                                      @empty
                                      <input type="text" class="form-control" placeholder="Distribution #"  aria-describedby="basic-addon2" name="distributionnumber" id="distributionnumber" value="DR-{{$prnum}}-0">
                                      @endforelse 
                                    </div>
                                    <div class="form-group">
                                      <label for="Branch">Branch</label>
                                      <select name="branch" id="branch" aria-describedby="basic-addon2" class="form-control">
                                      @foreach($dataBranch as $Branch)
                                        <option value="{{$Branch->id}}">{{$Branch->branch_name}}</option>
                                      @endforeach

                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="date" >Date:</label>
                                      <input class="control-label form-control" type="text" name="distributiondate" id="distributiondate" value="<?php echo date('m/d/Y'); ?>">
                                     
                                    </div>		
                                    <div class="form-group">
                                     
                                      <button type="submit" class="btn btn-warning btn-small form-control">Create Delivery Record</button>
                                    </div>			
									</fieldset>
						</form>  
                </div>
         </div>
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="x_panel">
                  <div class="x_title">
                    <h2>Distribution History
                    </h2>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content">
                    <table class="table table-striped table-bordered distribution">
                        <th>Distribution Number</th>
                        <th>Branch</th>
                        <th>Status</th>
                        <th>Date</th>
                    
                      @foreach($dataDistributionList as $Distribution)
                      <tr>
                        <td><a href="/admin/distribution/history/{{$Distribution->distributionnumber}}">{{$Distribution->distributionnumber}}</a></td>
                        <td><a href="/admin/branchs/{{$Distribution->branchid}}">{{$Distribution->branch['branch_name']}}</a></td>
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
</div>
@endsection