<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Network Operation App</title>
    <link href="{{ URL::to('/') }}/themes/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/themes/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/themes/css/animate.css" rel="stylesheet">
    <link href="{{ URL::to('/') }}/themes/css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="{{ URL::to('/') }}/favicon.ico" />
    @section('css')
    @show
</head>
<body>

<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"><span class="block m-t-xs"> <strong class="font-bold">{{ Auth::user()->nama }}</strong>
                             </span> <span class="text-muted text-xs block">{{ Auth::user()->jabatan }} <b class="caret"></b></span></span>
                             <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="/{{ Auth::user()->role }}/profile">Profile</a></li>
                                <li><a href="{{ URL::to('/logout') }}">Logout</a></li>
                            </ul>
                        </a>
                    </div>
                    <div class="logo-element">
                        App
                    </div>
                </li>
                @if(Auth::user()->role == 'admin')
                    @include('layouts.nav')
                @elseif(Auth::user()->role == 'no')
                    @include('layouts.navno')
                @else
                    @include('layouts.navbantek')
                @endif
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="">
                        <div class="form-group">
                            <input type="text" class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a href="{{ URL::to('/logout') }}">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-sm-4">
                @section('breadcrumb')

                @show
            </div>
        </div>

        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        <div class="footer">
            <div class="pull-right">
                10GB of <strong>250GB</strong> Free.
            </div>
            <div>
                <strong>Copyright</strong> Example Company &copy; 2014-2015
            </div>
        </div>

    </div>
</div>

<!-- Mainly scripts -->
<script src="{{ URL::to('/') }}/bower_components/jquery/dist/jquery.min.js"></script>
<script src="{{ URL::to('/') }}/themes/js/bootstrap.min.js"></script>
<script src="{{ URL::to('/') }}/themes/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{ URL::to('/') }}/themes/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<!-- Custom and plugin javascript -->
<script src="{{ URL::to('/') }}/themes/js/inspinia.js"></script>
<script src="{{ URL::to('/') }}/themes/js/plugins/pace/pace.min.js"></script>
@section('js')
@show


</body>
</html>
