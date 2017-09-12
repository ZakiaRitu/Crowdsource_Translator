@extends('layouts.default')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-offset-1 col-md-10">

                <div class="panel panel-info">
                    <div class="panel-heading text-center"><h4><b>LEADERBOARD </b></h4></div>
                    <div class="panel-body">
                        @if(count($leaderboard))
                            <table id="example2" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Rank</th>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Translation</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $cnt = 1; ?>
                                @foreach ($leaderboard as $leader)
                                    <tr>
                                        <td><?php echo $cnt; $cnt++;?></td>
                                        <td>{!! Html::image($leader->user->propic , 'PP', array('class' => 'img-circle', 'width' => 25, 'height' => 25 )) !!}</td>
                                        <td>{!! $leader->user->name !!}</td>
                                        <td>{!! $leader->total !!}</td>
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
            "ordering": false,
            "info": true,
            "autoWidth": false
        });
    </script>
@endsection