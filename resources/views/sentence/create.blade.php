@extends('layouts.default')
@section('content')
@include('includes.alert')
        <section class="content-header">
          <h1>
            {{ $title }}
          </h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="{!! URL::current() !!}">New Sentence</li>
          </ol>
        </section>

            <section class="content">
              <div class="row">
                <div class="col-md-8">
                {!! Form::open(array('route' => 'sentence.store', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
                         {!! csrf_field() !!}
                        <div class="form-group">
                        {!! Form::label('name', "Sentence", array('class' => 'col-sm-2 control-label')) !!}
                          <div class="col-sm-10">
                          {!! Form::textarea('sentence', null, array('class' => 'form-control', 'placeholder' => 'Sentence', 'required' => 'required')) !!}
                          </div>
                         </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                {!! Form::submit('Save', array('class' => 'btn btn-success')) !!}
                            </div>
                        </div>


                    {!! Form::close() !!}
                    </div>
                </div>
            </section>
 
@endsection

@section('style')
@endsection

@section('script')
@endsection