@extends('layouts.default')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-offset-1 col-md-10">

                <div class="panel panel-info">
                    <div class="panel-heading text-center"><h4><b>History [ Total Translate -- {!! $history->count() !!} Item's ]</b></h4></div>
                    <div class="panel-body">
                        @if(count($history))
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    {{--<th>#</th>--}}
                                    <th>Sentence</th>
                                    <th>Translate</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($history as $data)
                                    <tr>
                                        {{--<td>{!! $data->id !!}</td>--}}
                                        <td>{!! $data->sentence->sentence !!}</td>
                                        <td>{!! $data->translate !!}</td>
                                        <td>{!! $data->created_at !!}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            No Data Found
                        @endif
                    </div>
                </div>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </section><!-- /.content -->

@stop

@section('style')

    {!! Html::style('plugins/datatables/dataTables.bootstrap.css') !!}

@endsection

@section('script')
    {!! Html::script('plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('plugins/datatables/dataTables.bootstrap.min.js') !!}

    <script>

        $("#example1").DataTable();
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    </script>
@endsection