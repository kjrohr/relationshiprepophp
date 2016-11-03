<?php
echo("<p>PHP is working</p>"); 
$ses = mysql_connect("localhost","root","Poodles");
if(!$ses){
 echo("<p>Connection to content server failed.</p>");
 exit();
}
echo("<p>Database Connected</p>");
?>
