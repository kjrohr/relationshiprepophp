<?php
session_start();
include 'header.php';
include_once 'dbconfig.php';

if( !isset($_SESSION['user']) ) {
 header("Location: login.php");
 exit;
}

if(isset($_POST['btn-save']))
{
 // variables for input data
 $username = $_POST['username'];
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $age = $_POST['age'];
 $email = $_POST['email'];
 $address = $_POST['address'];
 //$pass = $_POST['pass'];
 $user_id = $_SESSION['user'];

 //$password = hash('sha256', $pass);
 // variables for input data

 // sql query for inserting data into database

        //$sql_query = "INSERT INTO users(username,first_name,last_name,age,email,address,password) VALUES('$username','$first_name','$last_name','$age','$email','$address','$password')";
        $sql_query = "UPDATE users SET first_name='$first_name', last_name='$last_name', age='$age', email='$email', address='$address' WHERE user_id='$user_id'";

 mysql_query($sql_query);



        // sql query for inserting data into database

}
?>

<title>Update User</title>
</head>
<body>
  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand page-scroll" style="padding-top:5px;" href="/index.php">
                <img src="img/logo3.png" id="pagelogo" alt="Relationship Repo"/>
                </a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="/index.php">Hello <?php echo $userRow['username']; ?></a>
                </li>
                  <li>
                      <a href="update_user.php">My Account</a>
                  </li>
                  <li>
                      <a href="logout.php?logout"><strong>Logout</strong></a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>
  <div class='container'>
    <div class="page-header">
      <h1 style="margin:25% 0 0; font-size: 57px;">Update User</h1>
    </div>
  <section style="background: #A26F6E; padding:75px 0;" class="download bg-primary text-center">
      <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">


<div id="header">
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
                              <button type="submit" name="btn-save" class="btn btn-primary btn-block">Update</button>
                          </div>
                      </div>
                      </div>
                  </form> <!-- /form -->
              </div> <!-- ./container -->

</div>
</div>
</section>
</div>
<footer>
    <div class="container">
        <p>&copy; 2016 Relationship Repo. All Rights Reserved.</p>
        <ul class="list-inline">
            <li>
                <a href="/terms.php">Terms and Conditions</a>
            </li>
            <li>
              <a href="/dashboard.php">My Account</a>
            </li>
            <li>
              <a href="/agents.php">Careers</a>
            </li>
        </ul>
    </div>
</footer>
</body>
