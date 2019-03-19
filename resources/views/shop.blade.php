@extends('layouts.front')

@section('content')
<div class="container">

      <div class="row"  style="padding-top:50px;">
        <!-- /.col-lg-3 -->

        <div class="col-lg-12">

          <div class="row" >
          @include('includes.product')
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
@endsection
