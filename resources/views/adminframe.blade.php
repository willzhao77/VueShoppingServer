@extends('layouts.app')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="d-flex" id="wrapper">

      <!-- Sidebar -->
      <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">Admin Dashboard</div>
        <div class="list-group list-group-flush">
          <a href="{{ url('back/slideshow') }}" class="list-group-item list-group-item-action bg-light">Slide Show</a>
          <a href="{{ url('back/news') }}" class="list-group-item list-group-item-action bg-light">News</a>
          <a href="{{ url('back/newscomment') }}" class="list-group-item list-group-item-action bg-light">News Comment</a>
          <a href="{{ url('back/sharecategory') }}" class="list-group-item list-group-item-action bg-light">Share Category</a>
          <a href="{{ url('back/shareitem') }}" class="list-group-item list-group-item-action bg-light">Share Item</a>
          <a href="{{ url('back/sharecomment') }}" class="list-group-item list-group-item-action bg-light">Share Comment</a>
          <a href="{{ url('back/shopitem') }}" class="list-group-item list-group-item-action bg-light">Shop Item</a>
          <a href="{{ url('back/shopitemcomment') }}" class="list-group-item list-group-item-action bg-light">Shop Item Comment</a>
          <a href="{{ url('back/message') }}" class="list-group-item list-group-item-action bg-light">Message</a>

        </div>
      </div>

      <!-- Page Content -->
      <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
            </ul>
          </div>
        </nav>

        <div id="div1" class="container-fluid">
          @yield('content1')
        </div>
      </div>

  </div>
  </body>
</html>
<!-- <script type="text/javascript">
    function load_main_content()
    {
        $("#div1").load('../resources/views/back/shownews.blade.php');
    }
</script> -->
