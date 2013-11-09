<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
  <meta charset="utf-8">
  <title>Topic Pulse</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Topic Pulse">
  <meta name="author" content="Jai Bapna">

  <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/bootstrap-theme.min.css') }}" rel="stylesheet">
  <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}" type="text/css" />
  <link href="{{ asset('bootstrap/css/bootstrap-timepicker.min.css') }}" rel="stylesheet">
  <link href="{{ asset('bootstrap/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/tagmanager.css') }}" type="text/css" />

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular-resource.min.js"></script>


  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="{{ asset('bootstrap/js/html5shiv.js') }}"></script>
  <![endif]-->
</head>

<body>

  <div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
      <ul class="sidebar-nav">
          <li><a href="{{ route('home') }}"><i class="icon-home icon-3x pull-left"></i><span style="padding-left:14px;">Pulse</span></a></li>
          <li><a href="{{ route('trends') }}"><i class="icon-flag icon-3x pull-left"></i><span style="padding-left:8px;">Trends</span></a></li>
          <li><a href="{{ route('compare') }}"><i class="icon-star icon-3x pull-left"></i><span>Compare</span></a></li>
          <li><a href="{{ route('explore') }}"><i class="icon-globe icon-3x pull-left"></i><span style="padding-left:8px;">Explore</span></a></li>
          <li><a href="{{ route('tweetmap') }}"><i class="icon-twitter icon-3x pull-left"></i><span>Tweetmap</span></a></li>
      </ul>
    </div>

    <!-- Page content -->
    <div id="page-content-wrapper">

      <div class="content-header">
          <h1 class="content-left">
              <a id="menu-toggle-left" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
          </h1>
      </div>

      <!-- Keep all page content within the page-content inset div! -->
      <div class="page-content inset">

          @yield('content')

      </div> <!-- </page-content-inset> -->

    </div> <!-- </page-content-wrapper> -->

  </div> <!-- </wrapper> -->


    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
     <script src="{{ asset('js/tagmanager.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
   
    @yield('scripts')

</body>
</html>
