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

      <div class="content-header homepage-header clearfix">
          <h1 class="content-left">
              <a id="menu-toggle-left" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
          </h1>

          <ul class="list-inline list-unstyled" style="padding:0;">
              <li style=""><a href="#">All Topics</a></li>
              <li><a href="#">New York City</a></li>
              <li><a href="#">National</a></li>
              <li><a href="#">Entertainment</a></li>
              <li><a href="#">Sports</a></li>
              <li><a href="#">Politics</a></li>
              <li><a href="#">Technology</a></li>
              <li><a href="#">Science</a></li>
              <li><a href="#">Faith</a></li>
              <li><a href="#">Parenting</a></li>
          </ul>

          <div class="row filter-buttons">
              <button class="col-xs-2 col-sm-2 col-md-1 well" title="Hot">
              <span class="button-text"><i class="icon-home"></i> Hot</span>
              </button>
              <button class="col-xs-3 col-sm-3 col-md-1 well" title="Trending">
              <span class="button-text"><i class="icon-home"></i> Trending</span>
              </button>
              <button class="col-xs-2 col-sm-2 col-md-1 well" title="New">
              <span class="button-text"><i class="icon-home"></i> New</span>
              </button>
              <button class="col-xs-2 col-sm-2 col-md-1 well" title="Flat">
              <span class="button-text"><i class="icon-home"></i> Flat</span>
              </button>
              <button class="col-xs-2 col-sm-2 col-md-1 well" title="Stop">
              <span class="button-text"><i class="icon-home"></i> Stop</span>
              </button>

              <div class="search input-group col-xs-12 col-sm-12 col-md-2">
                 <input type="text" class="form-control" ng-model="q" placeholder="Search news stories ..">
              </div>


              <button class="col-xs-5 col-sm-5 col-md-2 well" data-toggle="modal" href="#myModal">
                <span class="button-text">Highlight Topics</span>
              </button>
              <button class="col-xs-5 col-sm-5 col-md-2 well dropdown-toggle" data-toggle="dropdown">
                <span class="button-text">Today @ 1:44 PM EST</span>
              </button>
          </div>

      </div>

      <!-- Keep all page content within the page-content inset div! -->
      <div class="page-content inset">
        <div class="col-md-12">

          @yield('content')

        </div>
      </div> <!-- </page-content-inset> -->

    </div> <!-- </page-content-wrapper> -->

  </div> <!-- </wrapper> -->


    <!-- Placed at the end of the document so the pages load faster -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.1.5/angular-resource.min.js"></script>
    <!-- use Google CDN for
    jQuery to hopefully get a cached copy -->
    <script src="{{ asset('node_modules/underscore/underscore-min.js') }}"></script>
    <script src="{{ asset('node_modules/mustache/mustache.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')

</body>
</html>
