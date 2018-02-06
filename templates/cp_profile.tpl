<div class="row">
  <div class="col-md-6 col-md-offset-3" align="center">
       <div class="panel panel-default">
              <!-- Default panel contents -->
              <div class="panel-heading">
                    Edit your profile
              </div>

              <div class="panel-body" align="center">
                        <form role="form" method="post" action="/user/cp/doprofile">
                            <fieldset>
                                <div class="form-group">
								
								<div class="input-group">
						  <span class="input-group-addon">Full name</span>
						  <input class="form-control" placeholder="Full name" name="fullname" type="text" autofocus value="{user.fullname}">
								</div>
                                    
                                </div>
                                <div class="form-group">
								
								<div class="input-group">
						  <span class="input-group-addon">User name</span>
						  <input class="form-control" placeholder="User name" name="username" type="text" value="{user.username}">
								</div>
						    
                                </div>
                                <div class="form-group">
								
								<div class="input-group">
						  <span class="input-group-addon">Email</span>
						  <input class="form-control" placeholder="Email" name="email" type="text" value="{user.email}">
								</div>
						    
                                </div>

                                <input type="submit" class="btn btn-lg btn-success " value="Edit your info">
                            </fieldset>
                        </form>
						
			  </div>
		</div>
</div>
</div>