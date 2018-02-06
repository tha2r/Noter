<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{title}</title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="icon" href="/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="/assets/css/normalize.css">
            <!-- Custom styles for this template -->
    <link href="/assets/css/noter.css" rel="stylesheet">

    <!-- Bootstrap theme -->
    <link href="/assets/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        <!--  <a class="navbar-brand" href="/"><img src="/images/logo.png" border="0"></a> -->
                   <a class="navbar-brand" rel="home" href="/" title="Noter.ml - Publish your notes">Noter.ml - <small>Publish Your notes</small>
         <!--  <img style="margin-top: -15px;margin-left: -15px;"  src="/images/logo.png"> -->
    </a>
        </div>


        <div class="navbar-collapse collapse">
          <ul class="nav navbar-top-links navbar-right navbar-nav">
            <li><a href="/">Home</a></li>
            <li><a href="/notes/add">Add Note</a></li>
            <li><a href="/notes/top">Top Notes</a></li>
                        {nav_tab}

                  </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container theme-showcase" role="main">

{webcontents}

    </div> <!-- /container -->
<!--
<div class="wrapper">
  <p>Your website content here.</p>
  <div class="push"></div>
 </div>
 -->


<div class="container text-center active">
    <hr />
  <div class="row">
    <div class="col-lg-12">
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="/user/login">Login</a></li>
          <li><a href="/user/register">Register</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="/notes/add">Add a note</a></li>
          <li><a href="/notes/new">View latest notes</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
          <li><a href="/notes/top">Top notes</a></li>
          <li><a href="/notes/search">Search</a></li>
        </ul>
      </div>
      <div class="col-md-3">
        <ul class="nav nav-pills nav-stacked">
                <li><a href="/About">About Noter</a></li>
                <li><a href="/Contact">Contact Noter</a></li>
        </ul>
      </div>
    </div>
  </div>
  <hr>
    <div class="row">
        <div class="col-lg-12">
            <ul class="nav nav-pills nav-justified">
                <li><a href="http://noter.ml/">© 2014 Noter.ml.</a></li>
                <li><a href="/TOS">Terms of Service</a></li>
                <li><a href="/Privacy">Privacy</a></li>
            </ul>
        </div>
    </div>
</div>

    <script src="/assets/js/jquery.min.js"></script>

    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/noter.js"></script>
  </body>
</html>