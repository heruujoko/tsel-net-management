<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>Home Screen - Network Operation App</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <link href="{{ asset('/assets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/style-responsive.css') }}" rel="stylesheet" />
    <link href="{{ asset('/css/style-default.css') }}" rel="stylesheet" id="style_color" />
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" />
</head>
<body class="lock">
    <div class="lock-header">
        <!-- BEGIN LOGO -->
        <a class="center" id="logo" href="{{ public_path() }}">
            <img class="center" alt="logo" src="{{ URL::to('/') }}/img/logo-logo.jpg">
        </a>
        <br><br>
        <!-- END LOGO -->
    </div>
    <div class="container">
        @if( Session::has('info') )
        <div class="alert alert-success">
            <button class="close" data-dismiss="alert">×</button>
            <stong>Message : </strong>{{ Session::get('info') }}
        </div>
        @elseif( Session::has('error') )
        <div class="alert alert-error">
           <button class="close" data-dismiss="alert">×</button>
        <strong>Error : </strong> {{ Session::get('error') }}
        </div>
        @endif
        <div class="row-fluid">

            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-block-orange">
                    <a data-original-title="" href="{{ URL::to('/') }}/admin/oss/spj">
                        <i class="icon-briefcase"></i>
                        <div class="status">OSS SPJ Bantek </div>
                    </a>
                </div>
                <div class="metro-nav-block nav-olive">
                    <a data-original-title="" href="{{ URL::to('/') }}/admin/stpd">
                        <i class="icon-tags"></i>
                        <div class="status">FPL </div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="{{ URL::to('/') }}/admin/stpd">
                        <i class="icon-location-arrow"></i>
                        <div class="status">STPD</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-green double">
                    <a data-original-title="" href="{{ URL::to('/') }}/admin/perjalanandinas">
                        <i class="icon-eye-open"></i>
                        <div class="status">Perjalanan Dinas</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-deep-red">
                    <a data-original-title="" href="{{ URL::to('/') }}/login">
                        <i class="icon-lock"></i>
                        <div class="status">Login</div>
                    </a>
                </div>
            </div>
            <div class="metro-nav">
                <div class="metro-nav-block nav-light-purple">
                    <a data-original-title="" href="{{ URL::to('/') }}/admin/oss/material">
                        <i class="icon-folder-open"></i>
                        <div class="status">OSS Material</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-blue double">
                    <a data-original-title="" href="{{ URL::to('/') }}/admin/spph">
                        <i class="icon-tasks"></i>
                        <div class="status">SPPH</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-green">
                    <a data-original-title="" href="{{ URL::to('/') }}/admin/surattugas">
                        <i class="icon-file-alt"></i>
                        <div class="status">Surat Tugas</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-light-brown">
                    <a data-original-title="" href="{{ URL::to('/') }}/admin/versheet">
                        <i class="icon-check"></i>
                        <div class="status">Verification Sheet</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-grey ">
                    <a data-original-title="" href="{{ URL::to('/') }}/admin/bantek">
                        <i class="icon-sitemap"></i>
                        <div class="status">Bantek</div>
                    </a>
                </div>
            </div>
            <div class="space10"></div>
            <!--END METRO STATES-->
        </div>
    </div>
</body>
<!-- END BODY -->
</html>