<?php
session_start();
if (isset($_SESSION['user'])) {
  header("Location: dashboard.php");
}
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

<title>Relationship Repo!</title>
</head>
<body id="page-top">

  <header style="background: url('img/sun.jpg') no-repeat center center fixed;">
      <div class="container">

          <div class="row">
              <div class="col-sm-6">
                  <div class="header-content">
                      <div class="header-content-inner">
                        <div style="margin:200px 0 10px 0; background: rgba(0,0,0,0.6); border-radius:10px; padding:25px 25px 25px 35px;">
                          <h1 style="font-size: 68px; margin-bottom: 10px;">What is Relationship Repo?</h1>
                          <h3 style="margin-top:0; margin-bottom:10px; max-width:95%; font-size: 32px;">


                            It's difficult enough when relationships end on less-than-friendly terms. It's worse when you're at risk of losing your possessions, whether their value is sentimental or monetary. You don't want trouble. You don't want to drag your family or friends into it. You just want to get your stuff back and get on with your life.</h3>

                          <h3 style="margin-top:0; max-width:80%; font-size: 45px;">That's where we come in.</h3>

                        </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </header>

  <section style="background: #A26F6E; padding:90px 0;" class="download bg-primary text-center">
      <div class="container">
          <div class="row">
              <div class="col-md-10 col-md-offset-1">
                  <h2 class="section-heading" style="font-size: 50px; margin-bottom:0;">Relationship Repo is a web-based service that comes to your aid when you're
                     at risk of losing your possessions due to a break-up. We connect you with people who specialize in handling such situations with sensitivity
                     and professionalism. They will pick up your possessions for you — sparing you, your friends and your family the difficulty of dealing with your ex.</h2>
              </div>
          </div>
      </div>
  </section>

  <section class="cta" style="padding: 90px 0">
      <div class="cta-content">
          <div class="container">
            <div class="col-md-10" style="margin-left: 25%;">
            <h2 style="margin:0 0 15px 300px; font-size: 42.5px; max-width: 60%;">
              Remember that girlfriend back in college who stole your heart <b>and</b> your favorite hoodie?</h2>
              <h2 style="margin:0 0 5px 300px; font-size: 42.5px; max-width: 60%;">There's still hope for the hoodie, and all the others out there like it.
            </h2>
            <h4 style="margin:0 0 35px 300px; font-size: 25px; max-width: 60%; color: #AFD0D0;">(Plus, she didn't even like that band before she met you!)</h4>
            <a href="#signup-modal" data-toggle="modal" class="btn btn-outline btn-xl page-scroll" style="margin-left: 335px;">Sign Up Today</a>
            <a href="/login.php" class="btn btn-outline btn-xl page-scroll" style="margin-left:25px">Account Login</a>


            </div>
          </div>
      </div>
      <div class="overlay" style="background: url('img/giggle.jpg') no-repeat center center fixed;"></div>
  </section>

  <section class="cta" style="padding: 40px 0">
      <div class="cta-content">
          <div class="container">
            <h1 style="margin-bottom:30px; font-size: 70px;">Meet Our Development Team</h1>
            <h2 style="color: #333; max-width:none;">



              <div class="container-fluid text-center">
                  <div class="row">
                    <div class="col-sm-5 col-md-offset-1">
                      <img src="/img/team-01.png" width="65%">
                      <h4 style="font-size:50px; margin-bottom: 0;">Karl Rohr</h4>
                      <h4 style="font-size:32px; margin-top:0; color: #415B6F;">Back-End Developer</h4>
                    </div>
                    <div class="col-sm-5">
                      <img src="/img/team-02.png" width="65%"/>
                      <h4 style="font-size:50px; margin-bottom: 0;">Lindsay Hampton</h4>
                      <h4 style="font-size:32px; margin-top:0; color: #415B6F;">Front-End Developer</h4>
                    </div>
                    </div>
                  </div>



            </h2>
          </div>
      </div>
      <div class="overlay" style="background: transparent;"></div>
  </section>

  <section class="cta">
      <div class="cta-content">
          <div class="container">
            <h1 style="margin-bottom:0; font-size: 57px; color: rgba(0,0,0,0.7);">Want to work for Relationship Repo?</h1>
            <h2 style="margin-top:0; margin-bottom:30px; font-size:30px; color: rgba(0,0,0,0.7); max-width:none;">We are always looking for new agents to join our team!</h2>
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

  <!-- Modal for Sign Up -->


  <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; background: black;">
          <div class="modal-dialog">
          <div class="loginmodal-container">
            <form method="post">
              <div class="container" style="max-width:530px; margin: 0 auto;">
                          <form class="form-horizontal" role="form">
                              <h2 style="color:white; margin-left: 10%;">Sign Up With Relationship Repo</h2>
                              <div style="margin-left: 30%;">
                              <div class="form-group">
                                <div class="col-sm-9">
                                      <input style="margin-bottom:20px !important;" type="text" name="username" placeholder="Username" class="form-control" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-9">
                                      <input style="margin-bottom:20px !important;" type="text" name="first_name" placeholder="First Name" class="form-control" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-9">
                                      <input style="margin-bottom:20px !important;" type="text" name="last_name" placeholder="Last Name" class="form-control" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                <div class="col-sm-9">
                                      <input style="margin-bottom:20px !important;" type="email" name="email" placeholder="Email Address" class="form-control" required />
                                  </div>
                              </div>
                              <div class="form-group">
                                  <div class="col-sm-9">
                                      <input style="margin-bottom:20px !important;" type="text" name="address" placeholder="Address, City, State, Zip" class="form-control" required />
                                  </div>
                              </div> <!-- /.form-group -->
                              <div class="form-group">
                                <div class="col-sm-9">
                                  <input style="margin-bottom:20px !important;" type="number" name="age" placeholder="Your Age" class="form-control" required />
                                  </div>
                              </div> <!-- /.form-group -->
                              <div class="form-group">
                                <div class="col-sm-9">
                                  <input style="margin-bottom:20px !important;" type="password" name="pass" placeholder="Your Password" class="form-control" required />
                                  </div>
                              </div> <!-- /.form-group -->
                              <div class="form-group">
                                  <div class="col-sm-9">
                                      <div class="checkbox">
                                          <label>
                                              <input type="checkbox">
                                              <p style="color:white; font-size:13px;">By checking this box, I hearby accept Relationship Repo's <br /><a href="/terms.php" target="_blank" style="color:#b0d0d1;">Terms and Conditions</a>.</p>
                                          </label>
                                      </div>
                                  </div>
                              </div> <!-- /.form-group -->
                              <div class="form-group">
                                  <div class="col-sm-9">
                                      <button type="submit" name="btn-save" class="btn btn-primary btn-block" style="background:#415c6f;">Register</button><br />
                                      <a href="/login.php" class="btn btn-block btn-outline">Already A Member?</a>
                                      <a href="/aboutus.php"id="no-thanks" class="btn btn-block btn-outline">No Thanks</a>
                                  </div>
                              </div>
                              </div>
                          </form> <!-- /form -->
          </div>
        </div>
      </div>





  <script src="main.js"></script>
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
