<?php
include 'header.php';
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$age = $_POST['age'];
$user_name = $_POST['user_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$cell_phone = $_POST['cell_phone'];
$address = $_POST['address'];
$employer = $_POST['employer'];
$company = $_POST['company'];
$company_address = $_POST['company_address'];
$company_phone = $_POST['company_phone'];
$user_permissions = "agent";
$pass = $_POST['pass'];

 $password = hash('sha256', $pass);
 // variables for input data

 // sql query for inserting data into database
        nsert into agents(first_name,last_name,age,user_name,email,gender,cell_phone,address,employer,company,company_address,company_phone,user_permissions,password) values(
        $sql_query = "INSERT INTO agents(first_name,last_name,age,user_name,email,gender,cell_phone,address,employer,company,company_address,company_phone,user_permissions,password) VALUES('$first_name','$last_name','$age','$user_name','$email','$gender','$cell_phone','$address','$employer','$company','$company_address','$company_phone','$user_permissions','$password')";
 mysql_query($sql_query);

        // sql query for inserting data into database

}
?>

<title>Agent Registration</title>
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>Agent Registration</label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post">
      <a href="index.php">back to main page</a></td>

      <div class="container" style="max-width:530px; margin: 0 auto;">
                  <form class="form-horizontal" role="form">
                      <h2>Registration Form</h2>
                      <div style="margin-left: 30%;">
                      <div class="form-group">
                        <div class="col-sm-9">
                              <input type="text" name="user_name" placeholder="Username" class="form-control" required />
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
                          <input type="password" name="pass" placeholder="Your Password" class="form-control" required />
                          </div>
                      </div> <!-- /.form-group -->
                      <div class="form-group">
                        <div class="col-sm-9">
                          <input type="radio" name="gender" value="male"> Male<br>
                          <input type="radio" name="gender" value="female"> Female<br>
                          </div>
                      </div> <!-- /.form-group -->
                      <div class="form-group">
                          <div class="col-sm-9">
                              <input type="text" name="cell_phone" placeholder="111.222.3333" class="form-control" required />
                          </div>
                      </div> <!-- /.form-group -->
                      <div class="form-group">
                          <div class="col-sm-9">
                              <input type="text" name="employer" placeholder="Employer's Name" class="form-control" required />
                          </div>
                      </div> <!-- /.form-group -->
                      <div class="form-group">
                          <div class="col-sm-9">
                              <input type="text" name="company" placeholder="Company Name" class="form-control" required />
                          </div>
                      </div> <!-- /.form-group -->
                      <div class="form-group">
                          <div class="col-sm-9">
                              <input type="text" name="company_address" placeholder="Address, City, State, Zip" class="form-control" required />
                          </div>
                      </div> <!-- /.form-group -->
                      <div class="form-group">
                          <div class="col-sm-9">
                              <input type="text" name="company_phone" placeholder="111.222.3333" class="form-control" required />
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
                      </div>
                  </form> <!-- /form -->
              </div> <!-- ./container -->


</center>
</body>
