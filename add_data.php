<?php
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
 // variables for input data

 // sql query for inserting data into database

        $sql_query = "INSERT INTO users (username,first_name,last_name,age,email,address) VALUES('$username',$first_name','$last_name','$age','$email','$address')";
 mysql_query($sql_query);

        // sql query for inserting data into database

}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Add User for Admin Dashboard Test</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>Add User for Admin Dashboard Test</label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post">
    <table align="center">
    <tr>
    <td align="center"><a href="read_user.php">Admin Dashboard</a></td>
    </tr>
    <tr>
    <td><input type="text" name="username" placeholder="Username" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="first_name" placeholder="First Name" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" placeholder="Last Name" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="age" placeholder="22" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="email" placeholder="example@example.com" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="address" placeholder="123 First St Little Rock AK 23434" required /></td>
    </tr>
    <tr>
    <td><button type="submit" name="btn-save"><strong>SAVE</strong></button></td>
    </tr>
    </table>
    </form>
    </div>
</div>

</center>
</body>
