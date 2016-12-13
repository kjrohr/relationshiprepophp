<?php
session_start();
if (isset($_SESSION['user'])){
  header("Location: dashboard.php");
}
include 'header.php';
include 'nav.php';
include_once 'dbconfig.php';

if (isset($_POST['apply-btn'])) {

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
          $sql_query = "INSERT INTO agents(first_name,last_name,age,user_name,email,gender,cell_phone,address,employer,company,company_address,company_phone,user_permissions,password) VALUES('$first_name','$last_name','$age','$user_name','$email','$gender','$cell_phone','$address','$employer','$company','$company_address','$company_phone','$user_permissions','$password')";
   mysql_query($sql_query);
}

?>

<title>Relationship Repo!</title>
</head>

  <body id="page-top">

      <header style="background:url('img/laugh.jpeg') no-repeat center center fixed; background-size: cover;">
          <div class="container">

              <div class="row">
                  <div class="col-sm-7">
                      <div class="header-content">
                          <div class="header-content-inner">
                              <h1 style="margin:25% 0 0; font-size: 57px;">Interested in an exciting new career?</h1>
                              <h2 style="margin:0; font-size:30px;">Relationship Repo is always accepting applications for new Agents.</h2>
                              <h3 style="margin: 0 0 30px 0; color: #333;">* Please be sure to read the <a href="#">terms and conditions</a> prior to filling out an application.</h3>
                              <a href="#signup-modal" data-toggle="modal" class="btn btn-outline btn-xl page-scroll">Apply Today</a>
                              <a href="/login.php" class="btn btn-outline btn-xl page-scroll" style="margin-left:25px">Account Login</a>



                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </header>

      <section style="background: #A26F6E; padding:75px 0;" class="download bg-primary text-center">
          <div class="container">
              <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                      <h2 class="section-heading" style="font-size: 57px; margin-bottom:0;">Design your workload, Design your pay rate,</h2>
                      <h2 class="section-heading" style="font-size: 57px">Design your career.</h2>
                      <h3>There are tons of perks that come along with becoming a registered Agent with Relationship Repo.</h3>
                      <h3>Set your own working rate and gain access to an unlimited amount of potential clients per month.</h3>
                      <h3>Connect with clients of your choosing and enjoy the freedom of creating your own work schedule.</h3>


                  </div>
              </div>
          </div>
      </section>

      <footer>
          <div class="container">
              <p>&copy; 2016 Relationship Repo. All Rights Reserved.</p>
              <ul class="list-inline">
                  <li>
                      <a href="#">Privacy</a>
                  </li>
                  <li>
                      <a href="#">Terms</a>
                  </li>
                  <li>
                      <a href="#">FAQ</a>
                  </li>
              </ul>
          </div>
      </footer>


      <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
              <div class="modal-dialog">
              <div class="loginmodal-container">
                <form method="post">
                  <div class="container" style="max-width:530px; margin: 0 auto;">
                              <form class="form-horizontal" role="form">
                                  <h2 style="color:white; margin-left: 10%;">Relationship Repo "Agent" Application</h2>
                                  <div style="margin-left: 30%;">
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
                                      <input type="radio" name="gender" value="male" class="form-control"> Male<br>
                                      <input type="radio" name="gender" value="female" class="form-control"> Female<br>
                                      </div>
                                  </div> <!-- /.form-group -->
                                  <div class="form-group">
                                    <div class="col-sm-9">
                                          <input type="tel" name="cell_phone" placeholder="Phone Number" class="form-control" required />
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
                                      <input type="date" name="age" max="2000-12-31" placeholder="Birthdate" class="form-control" required />
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
                                          <input type="text" name="user_name" placeholder="User Name" class="form-control" required />
                                      </div>
                                  </div>
                                  <div class="form-group">
                                    <div class="col-sm-9">
                                      <input type="password" name="pass" placeholder="Your Password" class="form-control" required />
                                      </div>
                                  </div> <!-- /.form-group -->
                                  <div class="form-group">
                                      <div class="col-sm-9">
                                          <div class="checkbox">
                                              <label>
                                                  <input type="checkbox" required>
                                                  <p style="color:white; font-size:13px;">By checking this box, I hearby accept Relationship Repo's <br /><a href="#" style="color:#b0d0d1;">Terms and Conditions</a>.</p>
                                              </label>
                                          </div>
                                      </div>
                                  </div> <!-- /.form-group -->
                                  <div class="form-group">
                                      <div class="col-sm-9">
                                          <button type="submit" name="apply-btn" class="btn btn-primary btn-block" style="background:#415c6f;">Submit</button><br />
                                          <a href="/login.php" class="btn btn-block btn-outline">Already Registered?</a>
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
</html>
