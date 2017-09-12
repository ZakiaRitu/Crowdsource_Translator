@extends('layouts.default')
    @section('content')
        @include('includes.alert')
        
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <!-- <small>Version 2.0</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
          </ol>
        </section>

                  <h2 class="content-header">Welcome, {!! Auth::user()->name !!}</h2>


        <!-- Main content -->
        <section class="content">


          <!-- Info boxes -->
          <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Total Contribute</span>
                  <span class="info-box-number">{!! \App\Translation::where('user_id', Auth::user()->id)->count() !!}</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <div class="col-md-6 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-lock"></i></span>
                <div class="info-box-content">

                  <span class="info-box-number">Login Credential for Secure Login:</span>
                  <span class="info-text">Username: {!! Auth::user()->username !!}</span><br>
                  <span class="info-text">Password: @role('admin') <small>ADMIN</small> @else 1234 @endrole </span>
                </div>
              </div>

            </div>

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

          </div><!-- /.row -->

         
        </section><!-- /.content -->
       

       

@stop