<?php

include 'header.php';
include 'nav.php';

if (isset($_POST['apply-btn'])) {
  // Generate and Send Email
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $phone = $_POST['phone'];
  $email_from = $_POST['email'];
  $address = $_POST['address'];
  $birthday = $_POST['birthday'];
  $email_to = 'catoverlord@gmail.com';
  $email_subject = $first_name .  ' ' . $last_name . ' Agent Application';
  $email_body = 'Hello my name is, ' . $first_name . ' ' . $last_name . ' I am interested in becoming a Relationship Repo Agent. ';
  $email_body_cont = 'Here is my contact information, Phone: ' . $phone . ', Address: ' . $address . '. Thank you for your time and I hope to hear from you soon.';
  $email_message = $email_body . $email_body_cont;
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $email_to \r\n";
  mail($email_to,$email_subject,$email_message,$headers);
}

// if(isset($_POST['submit'])){
//     $to = "zombiepoodles@icloud.com";
//     $from = $_POST['email'];
//     $first_name = $_POST['first_name'];
//     $last_name = $_POST['last_name'];
//     $phone = $_POST['phone'];
//     $address = $_POST['address'];
//     $birthday = $_POST['birthday'];
//     $subject = "RR Agent Application Submission";
//     $subject2 = "Your Application Has Been Received!";
//
//     $generic = "Please contact " . $first_name . " " . $last_name . "\n\n" . " Phone: " . $phone . "\n\n" . " Email: " . $from . "\n\n" . "Birthday: " . $birthday . "\n\n" . "Address: " . $address;
//
//     $message = "You've received an Agent application through the Relationship Repo website!" . "\n\n" . $generic;
//
//     $message2 = "Hey there " . $first_name . "," . "\n\n" . "We've received your Agent Application here at Relationship Repo and are currently in the process of reviewing your information." . "\n\n" . "Here is a copy of the information we've received from you." . $generic . "\n\n" . "Thanks so much for applying! Hopefully we'll talk to you soon.";
//
//     $headers = "From:" . $from;
//     $headers2 = "From:" . $to;
//     mail($to,$subject,$message,$headers);
//     mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
//     echo "Thanks for applying with us " . $first_name . ", someone will contact you shortly.";
//     // You can also use header('Location: thank_you.php'); to redirect to another page.
//     }

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

      <section class="cta" style="background:url('img/sun.jpg') no-repeat center center fixed; background-size: cover;">
          <div class="cta-content">
              <div class="container">
                <h1 style="margin-bottom:0; font-size: 57px; color:#FFF;">Current Promotional Offers:</h1>
                <h2 style="margin-top:0; margin-bottom:30px; font-size:30px; color: #FFF;">New Agents that are approved through Relationship Repo recieve a reduced monthly subscription rate of $25/month.</h2>
                <a href="#signup-modal" data-toggle="modal" class="btn btn-outline btn-xl page-scroll">Apply Today</a>
              </div>
          </div>
      </section>

      <section id="contact" class="contact bg-primary">
          <div class="container">
              <h2>Social media and stuff and things!</h2>
              <ul class="list-inline list-social">
                  <li class="social-twitter">
                      <a href="#"><i class="fa fa-twitter"></i></a>
                  </li>
                  <li class="social-facebook">
                      <a href="#"><i class="fa fa-facebook"></i></a>
                  </li>
                  <li class="social-google-plus">
                      <a href="#"><i class="fa fa-google-plus"></i></a>
                  </li>
              </ul>
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
                                          <input type="tel" name="phone" placeholder="Phone Number" class="form-control" required />
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
                                      <input type="date" name="birthday" max="2000-12-31" placeholder="Birthdate" class="form-control" required />
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
