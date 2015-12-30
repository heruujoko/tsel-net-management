<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Network Operation App</title>
  <link href="{{ URL::to('/') }}/themes/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/themes/font-awesome/css/font-awesome.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/themes/css/animate.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/themes/css/style.css" rel="stylesheet">
  <link href="{{ URL::to('/') }}/themes/login-styles.css" rel="stylesheet">
  <link rel="shortcut icon" href="{{ URL::to('/') }}/favicon.ico" />
</head>

<body class="login">
    <!--
      <div class="logo">
      <a href="{{ URL::to('/') }}">
        <img src="{{ URL::to('/') }}/logo-big.png" alt="Logo App" /> </a>
      </div>
    -->
    <div class="content animated fadeInDown">
      <h3 class="title font-green">Sign In</h3>
      <p>Network Operation App</p>
      @if(Session::get('error'))
      <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        {{ Session::get('error') }}
      </div>
      @endif
      @if(Session::get('info'))
      <div class="alert alert-info alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        {{ Session::get('info') }}
      </div>
      @endif
      <form method="post" class="login-form" role="form" action="{{ URL::to('/auth') }}">
        <div class="form-group">
          <input type="text" name="email" class="form-control" placeholder="Username" autocomplete="off" required="">
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="off" required="">
        </div>
        <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
      </form>
      <!-- <p class="m-t"> <small>Inspinia web app framework base on Bootstrap 3 &copy; 2014</small> </p> -->
    </div>
    <!-- Mainly scripts -->
    <script src="{{ URL::to('/') }}/themes/js/jquery-2.1.1.js"></script>
    <script src="{{ URL::to('/') }}/themes/js/bootstrap.min.js"></script>
  </body>
  </html>
