<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
 <meta content="utf-8" http-equiv="encoding">
  <title>Topic Pulse</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Topic Pulse">
  <meta name="author" content="Jai Bapna">

  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet">
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css" />


  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="{{ asset('bootstrap/js/html5shiv.js') }}"></script>
  <![endif]-->
</head>
<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
<body>

  @yield('content')

  <!-- Placed at the end of the document so the pages load faster -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> <!-- use Google CDN for jQuery to hopefully get a cached copy -->
  <script src="{{ asset('node_modules/underscore/underscore-min.js') }}"></script>
  <script src="{{ asset('node_modules/backbone/backbone-min.js') }}"></script>
  <script src="{{ asset('node_modules/mustache/mustache.js') }}"></script>
  <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>
  @yield('scripts')

</body>
</html>
