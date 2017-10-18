<!-- Footer Start -->
<footer class="main-footer">
        <div class="pull-right hidden-xs">
          <!-- <b>Version</b> 2.3.0 -->
          
        </div>
          <strong>Copyright &copy;2016 <a href="#">SUST CSE</a>.</strong> All rights reserved.
</footer>
<!-- Footer Ends -->




<!-- js placed at the end of the document so the pages load faster -->
  	<!-- {!! Html::script('js/jquery.js') !!}
  	{!! Html::script('js/bootstrap.min.js') !!}
  	{!! Html::script('js/pace.min.js')!!}
  	{!! Html::script('js/wow.min.js') !!}
  	{!! Html::script('js/jquery.nicescroll.js') !!}
  	{!! Html::script('js/jquery.app.js') !!} -->

  	<!-- AdminLTE template javascript file  -->

  	<!-- jQuery 2.1.4 -->
    {!! Html::script('plugins/jQuery/jQuery-2.1.4.min.js') !!}
    <!-- Bootstrap 3.3.5 -->
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
    <!-- FastClick -->
    {!! Html::script('plugins/fastclick/fastclick.min.js') !!}
    <!-- AdminLTE App -->
    {!! Html::script('dist/js/app.min.js') !!}
    <!-- Sparkline -->
    {!! Html::script('plugins/sparkline/jquery.sparkline.min.js') !!}
    <!-- jvectormap -->
    {!! Html::script('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
    {!! Html::script('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
    <!-- SlimScroll 1.3.0 -->
    {!! Html::script('plugins/slimScroll/jquery.slimscroll.min.js') !!}
    <!-- ChartJS 1.0.1 -->
    {!! Html::script('plugins/chartjs/Chart.min.js') !!}
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {!! Html::script('dist/js/pages/dashboard2.js') !!}
    <!-- AdminLTE for demo purposes -->
    {!! Html::script('dist/js/demo.js') !!}

    <!-- AdminLTE template javascript file end  -->

    <!-- toastr -->
    {!! Html::script('dist/toastr/toastr.min.js') !!}
    @include('includes.toastr')



<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        /* do not add datatable method/function here , its always loaded from footer -- masiur */
        $(document).on("click", ".deleteBtn", function() {
            var url = "<?php echo URL::to('fileToDatabase'); ?>";
            $(".deleteForm").attr("action", url);
        });

    });
</script>


<script>
    $(function() {
        // Set idle time
        $( document ).idleTimer( 7200000 );
    });

    $(function() {
        $( document ).on( "idle.idleTimer", function(event, elem, obj){
            window.location.href = "example.com/login"
        });
    });
</script>