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
 $address = $_POST['address'];
 $pass = $_POST['pass'];

 $password = hash('sha256', $pass);
 // variables for input data

 // sql query for inserting data into database

        $sql_query = "INSERT INTO users(username,first_name,last_name,age,email,address,password) VALUES('$username','$first_name','$last_name','$age','$email','$address','$password')";
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
      <a href="/login.php" class="btn btn-outline btn-xl page-scroll">Already Have An Account?</a>
      <a href="/index.php" class="btn btn-outline btn-xl page-scroll">Back To Home</a>

      <div class="container" style="max-width:530px; margin: 0 auto;">
                  <form class="form-horizontal" role="form">
                      <h2>Registration Form</h2>
                      <div style="margin-left: 30%;">
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
                          <input type="password" name="pass" placeholder="Your Password" class="form-control" required />
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





<a href="#" data-toggle="modal" data-target="#login-modal" class="btn btn-outline btn-xl page-scroll">Sign Up Today</a>

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="loginmodal-container">
          <h1>Sign Up With Relationship Repo</h1><br>
          <form method="post">
            <a href="/login.php" class="btn btn-outline btn-xl page-scroll">Already Have An Account?</a>
            <a href="/index.php" class="btn btn-outline btn-xl page-scroll">Back To Home</a>

            <div class="container" style="max-width:530px; margin: 0 auto;">
                        <form class="form-horizontal" role="form">
                            <h2>Registration Form</h2>
                            <div style="margin-left: 30%;">
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
                                <input type="password" name="pass" placeholder="Your Password" class="form-control" required />
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
        </div>
      </div>
      </div>







<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5845b8372d02a274f9b74057/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

</body>
