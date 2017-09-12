@extends('layouts.default')
    @section('content')
        @include('includes.alert')
<!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {!! $title !!}
            <!-- <small>advanced tables</small> -->
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{ URL::current() }}">Edit Sentence</a></li>
            <!-- <li class="active">Data tables</li> -->
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
              <div class="row">
                <div class="col-md-8">
                {!! Form::model($sentence, array('route' => ['sentence.update',$sentence->id], 'method' => 'put', 'class' => 'form-horizontal')) !!}


                    {!! csrf_field() !!}
                    <div class="form-group">
                        {!! Form::label('name', "Sentence", array('class' => 'col-sm-2 control-label')) !!}
                        <div class="col-sm-10">
                            {!! Form::textarea('sentence', null, array('class' => 'form-control', 'placeholder' => 'Sentence', 'required' => 'required')) !!}
                        </div>
                    </div>


                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                          {!! Form::submit('Update', array('class' => 'btn btn-success')) !!}
                          </div>
                      </div>
                {!! Form::close() !!}
                </div>


              </div>
                
            </section><!-- /.content -->

@stop
