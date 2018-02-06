<div class="row">
  <div class="col-md-6 col-md-offset-3" align="center">
       <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">
                     Login
              </div>

              <div class="panel-body" align="center">
                        <form role="form" method="post" action="/user/login">

                                <div class="form-group">
                                                <div class="input-group">
                                                  <span class="input-group-addon">Login EMail</span>
                                                  <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
                                                </div>

                                </div>
                                <div class="form-group">
                                                <div class="input-group">
                                                  <span class="input-group-addon">Login Pass</span>
                                                  <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                                </div>

                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Login">

                        </form>
              </div>
       </div>
  </div>
</div>