@extends('layouts.front')

@section('content')
<div class="container">

      <div class="row" style="padding:50px 0px;">

        <div class="col-lg-3">

        @include('includes.sidebar')

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div class="row">
          @include('includes.product')
          </div>
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
@endsection
