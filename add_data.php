<?php
include 'header.php';
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
 $username = $_POST['username'];
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $age = $_POST['age'];
 $email = $_POST['email'];
 $address= $_POST['address'];

 // variables for input data

 // sql query for inserting data into database

        $sql_query = "INSERT INTO users(username,first_name,last_name,age,email,address) VALUES('$username','$first_name','$last_name','$age','$email','$address')";
 mysql_query($sql_query);

        // sql query for inserting data into database

}
?>

<title>Add User</title>
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>Add User</label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post">
      <a href="index.php">back to main page</a></td>

      <div class="container" style="max-width:530px; margin: 0 auto;">
                  <form class="form-horizontal" role="form">
                      <h2>Registration Form</h2>
                      <div class="form-group">
                        <div class="col-sm-9">
                              <input type="text" name="username" placeholder="Username" class="form-control" required />
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-9">
                              <input type="text" name="first_name" placeholder="First Name" class="form-control" required />
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-9">
                              <input type="text" name="last_name" placeholder="Last Name" class="form-control" required />
                          </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-9">
                              <input type="email" name="email" placeholder="Email Address" class="form-control" required />
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-9">
                              <input type="text" name="address" placeholder="Address, City, State, Zip" class="form-control" required />
                          </div>
                      </div> <!-- /.form-group -->
                      <div class="form-group">
                        <div class="col-sm-9">
                          <input type="number" name="age" placeholder="Your Age" class="form-control" required />
                          </div>
                      </div> <!-- /.form-group -->
                      <div class="form-group">
                          <div class="col-sm-9">
                              <div class="checkbox">
                                  <label>
                                      <input type="checkbox">By checking this box, I hearby accept Relationship Repo's <a href="#">Terms and Conditions</a>.
                                  </label>
                              </div>
                          </div>
                      </div> <!-- /.form-group -->
                      <div class="form-group">
                          <div class="col-sm-9">
                              <button type="submit" name="btn-save" class="btn btn-primary btn-block">Register</button>
                          </div>
                      </div>
                  </form> <!-- /form -->
              </div> <!-- ./container -->

</center>
</body>
