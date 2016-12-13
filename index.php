<?php

include 'header.php';
include 'nav.php';

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
<!-- NAVBAR
================================================== -->
<title>Relationship Repo!</title>
</head>

  <body id="page-top">



      <header>
          <div class="container">

              <div class="row">
                  <div class="col-sm-7">
                      <div class="header-content">
                          <div class="header-content-inner">
                              <h1 style="margin-bottom:0; font-size: 57px;">Sometimes, Things Just Don't Work Out</h1>
                              <h2 style="margin-top:0; margin-bottom:30px; font-size:30px;">Relationship Repo is here for you - through the good times, and the bad.</h2>
                              <a href="#signup-modal" data-toggle="modal" class="btn btn-outline btn-xl page-scroll">Sign Up Today</a>
                              <a href="/login.php" class="btn btn-outline btn-xl page-scroll" style="margin-left:25px">Account Login</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </header>


      <section class="cta">
          <div class="cta-content">
              <div class="container">
                <h1 style="margin-bottom:0; font-size: 57px;">Want to work for Relationship Repo?</h1>
                <h2 style="margin-top:0; margin-bottom:30px; font-size:30px; color: #333;">We are always looking for new agents to join our team!</h2>
                  <a href="/agents.php" class="btn btn-outline btn-xl page-scroll">More Information</a>
              </div>
          </div>
          <div class="overlay"></div>
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
                                  <h2 style="color:white; margin-left: 10%;">Sign Up With Relationship Repo</h2>
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
                                                  <input type="checkbox">
                                                  <p style="color:white; font-size:13px;">By checking this box, I hearby accept Relationship Repo's <br /><a href="#" style="color:#b0d0d1;">Terms and Conditions</a>.</p>
                                              </label>
                                          </div>
                                      </div>
                                  </div> <!-- /.form-group -->
                                  <div class="form-group">
                                      <div class="col-sm-9">
                                          <button type="submit" name="btn-save" class="btn btn-primary btn-block" style="background:#415c6f;">Register</button><br />
                                          <a href="/login.php" class="btn btn-block btn-outline">Already A Member?</a>
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
