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
<!-- NAVBAR
================================================== -->
<title>Relationship Repo!</title>
</head>

  <body id="page-top">



      <header>
          <div class="container">

              <div class="row">
                  <div class="col-sm-10">
                      <div class="header-content">
                          <div class="header-content-inner">

                            <h1 style="margin:120px 0 5px 0; font-size: 90px; max-width:none;">Take back your

                              <div class="rw-sentence rw-words rw-words-1" style="margin:100px 0 5px 0; max-width:none;">
                                   <span style="max-width:none;"><h1 style="color: #AFD0D0; font-size: 130px; max-width:none; padding-left: 10px;">Belongings.</h1></span>
                                   <span style="max-width:none;"><h1 style="color: #AFD0D0; font-size: 130px; max-width:none; padding-left: 10px;">Happiness.</h1></span>
                                   <span style="max-width:none;"><h1 style="color: #AFD0D0; font-size: 130px; max-width:none; padding-left: 10px;">Peace of Mind.</h1></span>
                                   <span style="max-width:none;"><h1 style="color: #AFD0D0; font-size: 130px; max-width:none; padding-left: 10px;">Heart.</h1></span>
                                   <span style="max-width:none;"><h1 style="color: #AFD0D0; font-size: 130px; max-width:none; padding-left: 10px;">Life.</h1></span>
                               </div></h1>






                              <h2 style="margin-top:5px; margin-bottom:30px; font-size:40px; max-width: none;">Relationship Repo is here for you - <br />we'll deal with the end so you can start a new beginning.</h2>
                              <a href="/aboutus.php" class="btn btn-outline btn-xl page-scroll" style="margin-left:25px">Learn More</a>
                              <a href="/login.php" class="btn btn-outline btn-xl page-scroll" style="margin-left:25px">Account Login</a>

                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </header>

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
