<?php
include 'header.php';
include_once 'dbconfig.php';
?>

<title>Admin Dashboard</title>
</head>
<body>
<center>

<div id="body">
 <div id="content">
    <table align="center">
    <tr>
    <th colspan="8"><a href="add_data.php">add data here.</a></th>
    </tr>
    <th>User Name</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Age</th>
    <th>Email</th>
    <th>Address</th>
    </tr>
    <?php
 $sql_query="SELECT * FROM users";
 $result_set=mysql_query($sql_query);;
 while($row=mysql_fetch_row($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row[1]; ?></td>
        <td><?php echo $row[2]; ?></td>
        <td><?php echo $row[3]; ?></td>
        <td><?php echo $row[4]; ?></td>
        <td><?php echo $row[5]; ?></td>
        <td><?php echo $row[6]; ?></td>
        </tr>

        <?php
 }
 ?>
    </table>
    </div>
</div>

</center>
</body>
</html>
