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
  $resCase=mysql_query("SELECT * FROM cases");
  $caseRow=mysql_fetch_array($resCase);
  foreach ($caseRow as $case)
  {
    echo $case['content'];
  }
?>
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

    <script src="assets/jquery-1.11.3-jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>





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
