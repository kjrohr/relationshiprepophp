<?php
include 'header.php';
include_once 'dbconfig.php';
if(isset($_POST['btn-save']))
{
 // variables for input data
 $username = $_POST['username'];
 $first_name = $_POST['first_name'];
 $last_name = $_POST['last_name'];
 $age = $_POST['age'];
 $email = $_POST['email'];
 $address= $_POST['address'];

 // variables for input data

 // sql query for inserting data into database

        $sql_query = "INSERT INTO users(username,first_name,last_name,age,email,address) VALUES('$username','$first_name','$last_name','$age','$email','$address')";
 mysql_query($sql_query);

        // sql query for inserting data into database

}
?>

<title>Add User</title>
</head>
<body>
<center>

<div id="header">
 <div id="content">
    <label>Add User</label>
    </div>
</div>
<div id="body">
 <div id="content">
    <form method="post">
    <table align="center" class="input-group input-group-lg">
    <tr>
    <td align="center"><a href="index.php">back to main page</a></td>
    </tr>
    <tr>
    <td><input type="text" name="username" placeholder="Username" class="form-control" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="first_name" placeholder="First Name" class="form-control" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="last_name" placeholder="Last Name" class="form-control" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="age" placeholder="22" class="form-control" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="email" placeholder="example@example.com" class="form-control" required /></td>
    </tr>
    <tr>
    <td><input type="text" name="address" placeholder="123 Test Lane Winter Park FL, 32792" class="form-control" required /></td>
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
