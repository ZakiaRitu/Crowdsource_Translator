@extends('layouts.default')
@section('content')




    <!-- Main content -->
    <section class="content">
        <!-- row -->
        <div class="row">

            <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                    <!-- timeline item -->
                    <li>
                        <div class="timeline-item" style="min-height: 150px;">
                            {{--<span class="time"><i class="fa fa-clock-o"></i> {{$sentence->created_at->diffForHumans()}}</span>--}}
                            <h3 class="timeline-header no-border text-center"><br><br>
                                {!! $sentence->sentence !!}
                                <br><br></h3>
                        </div>
                    </li>
                    <!-- END timeline item -->
                </ul>
            </div><!-- /.col -->




            <div class="col-sm-offset-2 col-md-10">
                <div class="col-md-10 panel panel-info">
                    <div class="panel-heading text-center"><h4><b>Translation [{!! $sentence->translations->count() !!}]</b></h4></div>
                    <div class="panel-body" id="" style="overflow-y: scroll; height:400px;">
                        <!-- The time line -->
                        <ul class="timeline">

                            @foreach($sentence->translations as $translate)
                            <!-- timeline item -->
                            <li>
                                <i class="fa bg-blue">{!! Html::image($translate->user->propic , 'PP', array('class' => 'img-circle', 'width' => 25, 'height' => 25 )) !!}</i>
                                <div class="timeline-item">
                                    <span class="time"><i class="fa fa-clock-o"></i> <b>{{$translate->created_at->diffForHumans()}}</b></span>
                                    <h6 class="timeline-header"><b>{!! $translate->user->name !!}</b></h6>
                                    <div class="timeline-body">
                                       {!! $translate->translate !!}
                                    </div>
                                    {{--<div class="timeline-footer">--}}
                                    {{--<a class="btn btn-primary btn-xs">Read more</a>--}}
                                    {{--<a class="btn btn-danger btn-xs">Delete</a>--}}
                                    {{--</div>--}}
                                </div>
                            </li>
                            <!-- END timeline item -->
                            @endforeach



                        </ul>
                    </div>
                    <div class="panel-footer">
                    </div>
                </div>

            </div><!-- /.col -->



        </div><!-- /.row -->
    </section><!-- /.content -->
@stop

@section('style')

@endsection


@section('script')
@endsection