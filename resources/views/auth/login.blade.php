<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Crowdsource Translator</title>
    <meta name="author" content="Crowdsource Translator">
    <!-- <meta name="csrf-token" content="{!! csrf_token() !!}"> -->
    <link rel="shortcut icon" href="dist/favicon.ico">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    {!! Html::style('bootstrap/css/bootstrap.min.css') !!}
    <!-- Font Awesome -->
    {!! Html::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') !!}
    <!-- Ionicons -->
    {!! Html::style('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') !!}
    <!-- Theme style -->
    {!! Html::style('dist/css/AdminLTE.min.css') !!}
    <!-- iCheck -->
    {!! Html::style('plugins/iCheck/square/blue.css') !!}

    {!! Html::style('bootstrap/css/bootstrap.css') !!}
    {!! Html::style('bootstrap/css/bootstrap-social.css') !!}
    <style>
        .login-page{
            background-image:url('../bg2.jpg');
            /*background-repeat:no-repeat;*/
            /*background-size:contain;*/
            background-position:center;

            

        }
        

        .panel {
            border-style: solid;
            border-color: #626567;
            background-color: #337ab7;
        }

    </style>

  </head>

  <body class="hold-transition login-page">
    <div class="login-box">




        <div class="login-box-body" style="background-color:#AF7AC5;">
            <div class="panel panel-success">
                <div class="panel-body text-center">
                    <b><h4 style="color: #ECF0F1; font-size: 1.5em; font-family: Georgia;font-weight: bold;">Crowdsource Translator</h4></b>
                </div>
            </div>



            @include('includes.alert')


            {!! Form::open(array('route' => 'postlogin', 'method' => 'post')) !!}
            <div class="form-group has-feedback" style="color: #000000; opacity: 0.7;">
                {!! Form::label('Name', "Type Your Name", array('class' => 'control-label')) !!}
                {!! Form::text('name', null, array('class' => 'form-control', 'placeholder' => 'Zakia Ritu..', 'required' => 'required')) !!}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::submit('Anonymous LogIn', array('class' => 'btn btn-primary btn-block btn-flat', 'type'=>'submit')) !!}
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

            <p class="text-center">
                <a href="#" class="btn btn btn-block btn-success " data-toggle="modal" data-target="#deleteConfirm">Login With Password</a><br>


                <!-- <a class="btn btn-block btn-social btn-facebook"  href="{{url('login/fb')}}">
                    <span class="fa fa-facebook"></span> Sign in with Facebook
                </a><br> -->

                {{--<a class="btn btn-block btn-social btn-google"  href="{{url('login/gp')}}">--}}
                    {{--<span class="fa fa-google"></span> Sign in with Google--}}
                {{--</a><br>--}}

            </p>

        </div><!-- /.login-box-body -->





        <!-- Modal for delete confirm -->
        <div class="modal fade" id="deleteConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title text-center" id="myModalLabel">Secure Login</h4>
                    </div>
                    {!! Form::open(array('route' => array('login.secure'), 'method'=> 'post', 'class' => 'deleteForm')) !!}
                    <div class="modal-body">
                        <div class="form-group has-feedback">
                            {!! Form::label('username', "Username", array('class' => 'control-label')) !!}
                            {!! Form::text('username', null, array('class' => 'form-control', 'placeholder' => 'Jhon Doe..', 'required' => 'required')) !!}
                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                        </div>

                        <div class="form-group has-feedback">
                            {!! Form::label('password', "Password", array('class' => 'control-label')) !!}
                            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => '****..', 'required' => 'required')) !!}
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        {!! Form::submit('Login', array('class' => 'btn btn-success')) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>






    </div><!-- /.login-box -->
    <!-- jQuery 2.1.4 -->
    {!! Html::script('plugins/jQuery/jQuery-2.1.4.min.js') !!}
    <!-- Bootstrap 3.3.5 -->
    {!! Html::script('bootstrap/js/bootstrap.min.js') !!}
    <!-- iCheck -->
    {!! Html::script('plugins/iCheck/icheck.min.js') !!}

  </body>
</html>
