<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title>{title}</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/assets/css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="/assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/user/cp">Noter.ml User Panel</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li{active.profile}><a href="/user/cp/profile">Profile</a></li>
            <li{active.password}><a href="/user/cp/password">Change Password</a></li>
            <li{active.home}><a href="/user/cp/home">Overview</a></li>
            <li{active.add}><a href="/user/cp/add">Add note</a></li>
            <li{active.manage}><a href="/user/cp/manage">Manage notes</a></li>
            <li{active.empty}><a href="/">Home</a></li>
            <li{active.empty}><a href="/user/logout">Logout</a></li>
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li{active.home}><a href="/user/cp/home">Overview</a></li>
     <!--       <li{active.reports}><a href="/user/cp/reports">Reports</a></li> -->
          </ul>
          <ul class="nav nav-sidebar">
            <li{active.add}><a href="/user/cp/add">Add note</a></li>
            <li{active.manage}><a href="/user/cp/manage">Manage notes</a></li>
          </ul>
          <ul class="nav nav-sidebar">
            <li{active.profile}><a href="/user/cp/profile">Profile</a></li>
            <li{active.password}><a href="/user/cp/password">Change Password</a></li>
          </ul>

          <ul class="nav nav-sidebar">
 <!--           <li{active.help}><a href="/user/cp/help">FAQ ( Help )</a></li> -->
            <li{active.empty}><a href="/user/logout">Logout</a></li>
          </ul>

  </div>

        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                        {webcontents}
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>