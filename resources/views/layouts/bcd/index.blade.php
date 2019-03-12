<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'MyBlog')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('backend/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('backend/plugins/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    @yield('style')
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('backend/css/skins/_all-skins.min.css')}}">
    <!-- bootstrap wysihtml5 - text editor -->

    <link rel="stylesheet" href="{{asset('backend/plugins/simple-mde/simplemde.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">



    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>--}}


    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}

    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>--}}







    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="{{route('seo')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>M</b>B</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>MY</b>BLOG</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a> -->

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{asset('backend/img/user2-160x160.jpg')}}" class="user-image" alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{asset('backend/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">

                                <p>
                                    {{Auth::user()->name}} - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dasbhboard
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-dashboard"></i> Dashboard</li>
            </ol>
        </section>

@include('layouts.bcd.sbar')
        <!-- Main content -->
        {{--@include('layouts.bcd.wc')--}}
        <!-- /.content -->

        @yield('content')
    </div>
    <!-- /.content-wrapper -->
    <footer  style="" class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.6
        </div>
        <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
        reserved.
    </footer>


</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{asset('backend/js/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('backend/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('backend/js/app.min.js')}}"></script>
<script src="{{asset('backend/plugins/simple-mde/simplemde.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

<script src="{{asset('backend/plugins/tag-editor/jquery.caret.min.js')}}"></script>
<script src="{{asset('backend/plugins/tag-editor/jquery.tag-editor.min.js')}}"></script>

@yield('script')

</body>
</html>
