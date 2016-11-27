<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: index.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: dashboard.php");
 }

 if (isset($_GET['delete'])) {
   // sql to delete a record
   $res=mysql_query("DELETE FROM users WHERE user_id='$_SESSION['user']'");

  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: index.php");
  exit;
 }
