<div class="row">
  <div class="col-md-6 col-md-offset-3" align="center">
       <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">
                     Change Password
              </div>

              <div class="panel-body" align="center">
                        <form role="form" method="post" action="/user/cp/dopassword">
                            <fieldset>
                                <div class="form-group">
						  <span class="input-group-addon">Old Password</span>
						  <input class="form-control" placeholder="Old Password" name="oldpassword" type="password" autofocus value="">

                                    
                                </div>
                                <div class="form-group">
						  <span class="input-group-addon">New Password</span>
						  <input class="form-control" placeholder="New Password" name="newpassword1" type="password" value="">
						    
                                </div>
                                <div class="form-group">
						  <span class="input-group-addon">Repeat new password</span>
						  <input class="form-control" placeholder="Repeat New Password" name="newpassword2" type="password" value="">
						    
                                </div>

                                <input type="submit" class="btn btn-lg btn-success " value="Change Password">
                            </fieldset>
                        </form>
						
			  </div>
		</div>
</div>
</div>