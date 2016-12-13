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


<title>Welcome - <?php echo $userRow['username']; ?></title>
</head>
<body>
  <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
      <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                  <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
              </button>
              <a class="navbar-brand page-scroll" style="padding-top:5px;" href="#page-top">
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
                      <a href="/aboutus.php">About Us</a>
                  </li>
                  <li>
                      <a href="update_user.php">Update Info</a>
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
  <div class="container">
    <div class="page-header">
      <h1 style="margin:25% 0 0; font-size: 57px;">Welcome to Your Dashboard</h1>
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

?>
<div class='row'>
  <div class='col-sm-7'>
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
            echo '<td><button class="claim" name="claim">Claim?</button></td>';
          }
          else {
            // Catch all
          }
    }
    // If a case isn't claimed it can't be complete
    echo '<td><button class="complete" name="complete">Complete?</button></td>';
    echo '</tr>';
}

// Query users table for owner of the case

?>
</table>
</div><!-- End of col-sm-7 -->
</div><!-- End of row -->
<!-- Agent dashboard contents -->

<?php
} // END of if test == 0
else {
  // If Agent has a case
  ?>
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
              echo '<td><button class="claim" name="claim">Claim?</button></td>';
            }
            else {
              // Catch all
            }
      }
      // If a case isn't claimed it can't be complete
      echo '<td><button class="complete" name="complete">Complete?</button></td>';
      echo '</tr>';
      ?>
      </table>
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
                echo '<td>Waiting for an Agent to Claim!</td>';
              }
              else {
                // Catch all
              }
        }
        // If a case isn't claimed it can't be complete
        echo '<td><button class="complete" name="complete">Complete?</button></td>';
        echo '</tr>';
        ?>
      </table>
      <h3>Agent's Information</h3>
        <?php
        if (is_null($active_agent)) {

        }
        else {

          }
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
      </div>
  </div>
  </div>
  </section>
        <?php
      }
    }
  }

}
else
{
  // Catch all
}
?>


<?php
  if (isset($_SESSION['message'])) {
    echo "<span id='message'>" . $_SESSION['message'] . "</span>";
    unset($_SESSION['message']);
  }
?>
</div><!-- End of container -->

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
                                            <p style="color:white; font-size:13px;">By checking this box, I hearby accept Relationship Repo's <br /><a href="#" style="color:#b0d0d1;">Terms and Conditions</a>.</p>
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
