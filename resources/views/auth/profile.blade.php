@extends('layouts.default')
@section('content')
@include('includes.alert')

    
    <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            My Profile
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="{!! Menu::isActiveURL('profile') !!}">My Profile</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-md-8">

              <!-- About Me Box -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">About Me</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <strong><i class="fa fa-book margin-r-5"></i>  Contact Details</strong>
                  <p class="text-muted">
                    <br>
                    Name: {{ $user->name }}
                  </p>
                  <hr>
                  <p class="text-muted">
                    Username: {{ $user->username or '' }}
                  </p>
                  <!-- <hr> -->
                  <!-- <p class="text-muted">
                    Email: {{ $user->email or '' }}
                  </p> -->
                  <hr>


                  <p></p>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-4">

              <!-- Profile Image -->
              <div class="box box-primary">
                <div class="box-body box-profile">
                  <img src="">
                  <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
                </div>
              </div>


              <div class="panel panel-success">
                <div class="panel-body text-center">
                  {!! Html::image($user->propic,'alt', array( 'width' => 130, 'height' => 130 )) !!}
                </div>
              </div>



              </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      

@stop