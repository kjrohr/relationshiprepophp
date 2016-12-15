<?php
 session_start();
 require_once 'dbconfig.php';
 require_once 'header.php';
 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 $_SESSION['user_type'] = 'user';

 if (!$userRow['username']) {
   $res=mysql_query("SELECT * FROM agents WHERE userId=".$_SESSION['user']);
   $userRow=mysql_fetch_array($res);
   $userRow['username'] = $userRow['user_name'];
   $_SESSION['user_type'] = 'agent';
 }


 if (isset($_POST['case_id'])) {
 $userId = $_SESSION['user'];
 $case_id = $_POST['case_id'];
 $sql_query = "UPDATE cases SET userId='$userId' WHERE case_id='$case_id'";
 // This one is good
 mysql_query($sql_query);
  }

  if (isset($_POST['complete'])) {
    $case_id = $_POST['complete'];
    $sql_query = "UPDATE cases SET completed=1 WHERE case_id='$case_id'";
    mysql_query($sql_query);
  }


  if (isset($_POST['case-btn'])) {
    // Add case to cases table
    //  $user_id = $_SESSION['user'];
     $_SESSION['content'] = mysql_real_escape_string($_POST['content']);
     header('Location: payment.php');
     //$sql_query="INSERT INTO cases(user_id,content) VALUES('$user_id','$content')";
     //mysql_query($sql_query);

     // Need to move this over to the stripe file

  }

?>


<title>Welcome - <?php echo $userRow['first_name']; ?></title>
</head>
<body>
  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
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
                    <a href="/index.php">Dashboard</a>
                </li>

                  <?php
                  if ($_SESSION['user_type'] == 'agent') {

                  }
                  else {
                    ?>
                    <li>
                        <a href="update_user.php">My Account</a>
                    </li>
                    <?php
                  }
                   ?>

                  <li>
                      <a href="logout.php?logout"><strong>Logout</strong></a>
                  </li>
              </ul>
          </div>
          <!-- /.navbar-collapse -->
      </div>
      <!-- /.container-fluid -->
  </nav>
  <div class="container">
    <div class="page-header">
      <h1 style="margin:25% 0 0; font-size: 57px;">Welcome Back, <?php echo $userRow['first_name'] ?>!</h1>
    </div>
  </div>
<!-- Case logic -->

<?php
// Agent dashboard is generated here
if ($_SESSION['user_type'] == 'agent')
{
$case_owner = '';
// Need to show active cases, possibly limit to one per agent.
$query="SELECT * FROM cases WHERE userId=".$_SESSION['user'] . " AND completed IS NULL";
$results = mysql_query($query);
$test = mysql_num_rows($results);
if ($test == 0) {
  // Need to display cases that aren't claimed
  $query="SELECT * FROM cases WHERE userId IS NULL AND completed IS NULL";
  $results = mysql_query($query);
  $num_of_rows = mysql_num_rows($results);
?>
<section style="background: #A26F6E; padding:75px 0;" class="download bg-primary text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

<?php
if ($num_of_rows == 0){
  ?>
  <h2 class="section-heading" style="font-size: 57px; margin-bottom:0;">Thank You for Doing What You Do!</h2>
  <h2 class="section-heading" style="font-size: 57px">What You Do Helps Lessens the Pain of Our Users</h2>
  <h3>Suprisingly there are no cases to view at this time.</h3>
  <h3>We thank you for your vigilance in helping all our users.</h3>
  <h3>Once a user has submitted a case you may review it to claim.</h3>
  <h3>Once a case is claimed please contact the user within 24 hours.</h3>
  <?php
}
else {
?>
<h2 class="section-heading" style="font-size: 57px; margin-bottom:0;">Here is a List of Active Cases</h2>
<h2 class="section-heading" style="font-size: 57px">What You Do Helps Lessens the Pain of Our Users</h2>
<h3>Please claim one soon.</h3>
<h3>We thank you for your vigilance in helping all our users.</h3>
<h3>Once a case is claimed please contact the user within 24 hours.</h3>
<h3>Please see that cases are handled as quickly as possible.</h3>
<table>
  <tr>
    <td>Case ID</td>
    <td>User ID</td>
    <td>Agent ID</td>
    <td>Content</td>
    <td>Completed</td>
  </tr>
<?php

while ($row = mysql_fetch_array($results)) {
    echo '<tr>';

    $case_owner = $row['user_id'];
    $count = 0;
    foreach(array_unique($row) as $field) {
          $count = $count + 1;
          if (!empty($field)) {
            echo '<td>' . htmlspecialchars($field) . '</td>';
          }
          elseif (empty($field) && $count == 3) {
            echo '<td><button style="color: black !important;" class="claim" name="claim">Claim?</button></td>';
          }
          else {
            // Catch all
          }
    }
    // If a case isn't claimed it can't be complete
    echo '<td><button style="color: black !important;" class="complete" name="complete">Complete?</button></td>';
    echo '</tr>';
}

// Query users table for owner of the case

?>
</table>

<!-- Agent dashboard contents -->

<?php
}
?>
</div><!-- End of col-sm-7 -->
</div><!-- End of row -->
</section>
<?php
} // END of if test == 0
else {
  // If Agent has a case
  ?>
  <section style="background: #A26F6E; padding:75px 0;" class="download bg-primary text-center">
      <div class="container">
          <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <h2 class="section-heading" style="font-size: 57px; margin-bottom:0;">Here is Your Active Case</h2>
                <h2 class="section-heading" style="font-size: 57px">What You Do Helps Lessens the Pain of Our Users</h2>
                <h3>We thank you for your vigilance in helping all our users.</h3>
                <h3>Please contact this user within 24 hours.</h3>

  <table>
    <tr>
      <td>Case ID</td>
      <td>User ID</td>
      <td>Agent ID</td>
      <td>Content</td>
      <td>Completed</td>
    </tr>
  <?php
  while ($row = mysql_fetch_array($results)) {
      echo '<tr>';
      $case_owner = $row['user_id'];
      $count = 0;
      foreach(array_unique($row) as $field) {
            $count = $count + 1;
            if (!empty($field)) {
              echo '<td>' . htmlspecialchars($field) . '</td>';
            }
            elseif (empty($field) && $count == 3) {
              echo '<td><button style="color: black !important;" class="claim" name="claim">Claim?</button></td>';
            }
            else {
              // Catch all
            }
      }
      // If a case isn't claimed it can't be complete
      echo '<td><button style="color: black !important;" class="complete" name="complete">Complete?</button></td>';
      echo '</tr>';
      ?>
      </table>
      <h2 class="section-heading" style="font-size: 57px; margin-bottom:0;">Case Owner Information</h2>
      <?php
  }
  $owner=mysql_query("SELECT * FROM users WHERE user_id=".$case_owner);
  $ownerRow=mysql_fetch_array($owner);
  // Format this better later
  echo '<br />First Name: ' . $ownerRow['first_name'] . '<br />';
  echo 'Last Name: ' . $ownerRow['last_name'] . '<br />';
  echo 'Age: ' . $ownerRow['age'] . '<br />';
  echo 'Email: ' . $ownerRow['email'] . '<br />';
  echo 'Address: ' . $ownerRow['address'] . '<br />';
  ?>
</div>
</div>
</section>
<?php
}
}
elseif ($_SESSION['user_type'] == 'user')
{
?>
<!-- User dashboard contents -->
<?php
  $username = $userRow['username'];
  $first_name = $userRow['first_name'];
  $last_name = $userRow['last_name'];
  $age = $userRow['age'];
  $address = $userRow['address'];

  $query="SELECT * FROM cases WHERE user_id=".$_SESSION['user'] . " AND completed IS NULL";
  $results = mysql_query($query);
  $test = mysql_num_rows($results);

  if ($test == 0){
    // Case Submission form
    ?>


    <section style="background: #A26F6E; padding:75px 0;" class="download bg-primary text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h2 class="section-heading" style="font-size: 57px; margin-bottom:0;">Do You Need to Start a Case?</h2>
                    <h2 class="section-heading" style="font-size: 57px">Sometimes, Things Just Don't Work Out</h2>
                    <h3>We are here to help. Once you create a case, agents will be able to review it.</h3>
                    <h3>Once an agent has reviewed it they can choose to claim your case.</h3>
                    <h3>Once your case is claimed the claiming agent will contact you shortly.</h3>
                    <h3>We charge a $10.00 service fee for creating a case.</h3>
                    <a href="#signup-modal" data-toggle="modal" class="btn btn-outline btn-xl page-scroll">Start a Case</a>
                </div>
            </div>
        </div>
    </section>
    <?php
  }
  else {
    // Table of Active Case with Agent's Data
    $active_agent = '';
    ?>
    <section style="background: #A26F6E; padding:75px 0;" class="download bg-primary text-center">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <?php
                    if (isset($_SESSION['message'])) {
                      echo "<span id='message'><h2 class='section-heading' style='font-size: 57px; margin-bottom:0;'>" . $_SESSION['message'] . "</h2></span>";
                      unset($_SESSION['message']);
                    }
                  ?>
                  <h2 class="section-heading" style="font-size: 57px; margin-bottom:0;">Case Information</h2>

    <table>
      <tr>
        <td>Case ID</td>
        <td>User ID</td>
        <td>Agent ID</td>
        <td>Content</td>
        <td>Completed</td>
      </tr>
    <?php
    while ($row = mysql_fetch_array($results)) {
        echo '<tr>';
        $active_agent = $row['userId'];
        foreach(array_unique($row) as $field) {
              if (!empty($field)) {
                echo '<td>' . htmlspecialchars($field) . '</td>';
              }
              elseif (empty($field)) {
                if (is_null($active_agent)) {
                echo '<td>Waiting for an Agent to Claim!</td>';
              }
              }
              else {
                // Catch all
              }
        }
        // If a case isn't claimed it can't be complete
        echo '<td><button style="color: black !important;" class="complete" name="complete">Complete?</button></td>';
        echo '</tr>';
        ?>
      </table>

      <h2 class="section-heading" style="font-size: 57px; margin-bottom:0;">Agent's Information</h2>
        <?php
        if (is_null($active_agent)) {
          ?>
          <p>Our Agents our currently reviewing all cases.</p>
          <p>We thank you for your patience while you wait for an agent to select your case</p>
          <p>If an agent hasn't selected your case within 24 hours please contact us.</p>
          <p>It is our goal to help you as quickly as possible.</p>
          <?php
        }
        else {
          ?>
          <p>If an agent has claimed your case and has not contacted you within 24 hours please contact us.</p>
          <?php
        $agent=mysql_query("SELECT * FROM agents WHERE userId=".$active_agent);
        $agentRow=mysql_fetch_array($agent);
        // Format this better later
        if (!empty($active_agent)){
        echo '<br />First Name: ' . $agentRow['first_name'] . '<br />';
        echo 'Last Name: ' . $agentRow['last_name'] . '<br />';
        echo 'Age: ' . $agentRow['age'] . '<br />';
        echo 'Email: ' . $agentRow['email'] . '<br />';
        echo 'Employer: ' . $agentRow['employer'] . '<br />';
        echo 'Company: ' . $agentRow['company'] . '<br />';
        echo 'Company Address: ' . $agentRow['company_address'] . '<br />';
        }
        ?>

        <?php
      }
    }
    ?>
    </div>
</div>
</div>
</section>
<?php
  }

}
else
{
  // Catch all
}
?>



</div><!-- End of container -->

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


<div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
        <div class="loginmodal-container">
          <form method="post">
            <div class="container" style="max-width:530px; margin: 0 auto;">
                        <form class="form-horizontal" role="form">
                            <h2 style="color:white; margin-left: 10%;">Need to Create a Case?</h2>
                            <div style="margin-left: 30%;">
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <textarea name='content' class="form-control" required="">Please describe to us in detail about your case.</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" required>
                                            <p style="color:white; font-size:13px;">By checking this box, I hearby accept Relationship Repo's <br /><a href="/terms.php" target="_blank" style="color:#b0d0d1;">Terms and Conditions</a>.</p>
                                        </label>
                                    </div>
                                </div>
                            </div> <!-- /.form-group -->
                            <div class="form-group">
                                <div class="col-sm-9">
                                    <button type="submit" name="case-btn" class="btn btn-primary btn-block" style="background:#415c6f;">Submit Case</button><br />
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
</html>
