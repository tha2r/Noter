          <h1 class="page-header">Welcome <b><u>{user.fullname}</u></b> to your panel</h1>
			<h4>This is only simple panel allows you to modify your info and control your notes.</h4>


<br />
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading"><h3>Statistics</h3></div>

  <!-- Table -->
  <table class="table">

            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Column</th>
                  <th>Value</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Name</td>
                  <td>{user.fullname}</td>
                </tr>
                <tr>
                  <td>User Name</td>
                  <td>{user.username}</td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td>{user.email}</td>
                </tr>
                <tr>
                  <td>Notes Count</td>
                  <td>{user.posts}</td>
                </tr>
                <tr>
                  <td>User From</td>
                  <td>{user.date}</td>
                </tr>
				
              </tbody>
            </table>

</div>