@extends('layouts.default')
@section('content')
<!-- Main content -->
<section class="content">
    <!-- row -->
    <div class="row">

        <div class="col-sm-offset-1 col-md-10">

            <div class=" panel panel-success">
                <div class="panel-heading text-center">Sentence</div>
                <div class="panel-body">
                    {{--<span class="time"><i class="fa fa-clock-o"></i> {{$sentence->created_at->diffForHumans()}}</span>--}}
                     <h4 class="timeline-header no-border text-center">
                         @if(! empty($sentence))
                        {!! $sentence->sentence !!}
                        @else
                             No Sentence found ...
                        @endif
                     </h4>
                </div>
            </div>

        </div><!-- /.col -->


        @if(! empty($sentence))
        <div class="col-sm-offset-2 col-md-10">
            <div class="col-md-10 panel panel-info">
                <div class="panel-heading text-center">Translation</div>
                <div class="panel-body">
                    <!-- The time line -->
                    <ul class="timeline">
                        <!-- timeline item -->
                        <li>
                            <i class="fa bg-blue">{!! Html::image(Auth::user()->propic , 'PP', array('class' => 'img-circle', 'width' => 25, 'height' => 25 )) !!}</i>
                            <div class="timeline-item">
                                {{--<span class="time"><i class="fa fa-clock-o"></i> 12:05</span>--}}
                                <h3 class="timeline-header">{!! Auth::user()->name !!}</h3>
                                <div class="timeline-body">

                                    {!! Form::open(array('route' => 'translation.store', 'method' => 'POST', 'class' => 'form-horizontal')) !!}
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    {!! Form::textarea('translate', null, array('size' => '30x5', 'class' => 'form-control', 'placeholder' => 'Bengali to English Translate', 'required' => 'required')) !!}
                                    {{ Form::hidden('sentence_id', $sentence->id) }}
                                </div>
                                <div class="timeline-footer">
                                    <a class="btn btn-danger btn-sm" href="{!! route('translation.create') !!}">Skip</a>
                                    {!! Form::submit('Submit', array('class' => 'btn btn-primary btn-sm')) !!}
                                </div>
                                {!! Form::close() !!}

                            </div>
                        </li>
                        <!-- END timeline item -->
                    </ul>
                </div>

            </div>
        </div><!-- /.col -->
            @endif
    </div><!-- /.row -->
</section><!-- /.content -->
@stop

@section('style')
<style>

</style>
@endsection


@section('script')
@endsection