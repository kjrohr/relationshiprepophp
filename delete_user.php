<?php
 session_start();
 if (!isset($_SESSION['user'])) {
  header("Location: index.php");
 } else if(isset($_SESSION['user'])!="") {
  header("Location: dashboard.php");
 }

 if (isset($_GET['delete'])) {
   // sql to delete a record
   $sql = "DELETE FROM users WHERE id='$_SESSION['user']'";

   if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
   } else {
    echo "Error deleting record: " . $conn->error;
    }

  unset($_SESSION['user']);
  session_unset();
  session_destroy();
  header("Location: index.php");
  exit;
 }
