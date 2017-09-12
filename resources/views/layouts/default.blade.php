<!DOCTYPE html>
<html lang="en">

@include('includes.header')

@yield('style')

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('includes.topMenu')
@include('includes.sideBar')

    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
          <br>
        @yield('content')
      </div><!-- /.content-wrapper -->

{{-- @include('includes.rightSideBar') --}}
@include('includes.footer')

</div><!-- ./wrapper -->

@yield('script')

</body>
</html>