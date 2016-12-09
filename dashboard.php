<?php
 session_start();
 require_once 'dbconfig.php';

 // if session is not set this will redirect to login page
 if( !isset($_SESSION['user']) ) {
  header("Location: login.php");
  exit;
 }
 // select loggedin users detail
 $res=mysql_query("SELECT * FROM users WHERE user_id=".$_SESSION['user']);
 $userRow=mysql_fetch_array($res);
 echo $_SESSION['user'];
 $_SESSION['user_type'] = 'user';

 if (!$userRow['username']) {
   $res=mysql_query("SELECT * FROM agents WHERE userId=".$_SESSION['user']);
   $userRow=mysql_fetch_array($res);
   $userRow['username'] = $userRow['user_name'];
   $_SESSION['user_type'] = 'agent';
 }


 if (isset($_POST['case_id'])) {
 // echo 'case id: ';
 // echo $_POST['case_id'];
 // echo '|||||||||';
 $userId = $_SESSION['user'];
 $case_id = $_POST['case_id'];
 $sql_query = "UPDATE cases SET userId='$userId' WHERE case_id='$case_id'";
 // This one is good
 mysql_query($sql_query);
  }


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome - <?php echo $userRow['username']; ?></title>
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"  />
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
Hello <?php echo $userRow['username']; ?>
<a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a>
<a href="delete_user.php?delete"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Delete</a>
<a href="update_user.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Update</a>

<!-- Case logic -->

<?php
// Agent dashboard is generated here
if ($_SESSION['user_type'] == 'agent')
{
// Need to show active cases, possibly limit to one per agent.
// $query="SELECT * FROM cases WHERE userId=".$_SESSION['user'];
// $results = mysql_query($query);

// if (is_null($results)) {
  // Need to display cases that aren't claimed
  $query="SELECT * FROM cases WHERE userId IS NULL";
  $results = mysql_query($query);
// }




?>
<table>
  <tr>
    <td>Case ID</td>
    <td>User ID</td>
    <td>Agent ID</td>
    <td>Content</td>
    <td>Accepted</td>
    <td>Completed</td>
  </tr>
<?php
while ($row = mysql_fetch_array($results)) {
    echo '<tr>';
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
    echo '</tr>';
}
?>
</table>
<!-- Agent dashboard contents -->

<?php
}
elseif ($_SESSION['user_type'] == 'user')
{
?>
<!-- User dashboard contents -->

<?php
}
else
{
  // Catch all
}
?>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
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
