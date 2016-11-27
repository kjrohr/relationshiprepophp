<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: index.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: dashboard.php");
 }

$user_id = $_SESSION['user'];
 if (isset($_GET['delete'])) {
   // sql to delete a record
   mysql_query("DELETE FROM users WHERE user_id='$user_id'");


  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: index.php");
  exit;
 }
