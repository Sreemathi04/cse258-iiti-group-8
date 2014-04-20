<?php

ob_start();
$host="localhost"; 
$username="root"; 
$password="11spicesandherbs";
$db_name="newsfeed_db";
$tbl_name="members";

mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$myusername = stripslashes($myusername);
$mypassword = stripslashes($mypassword);
$myusername = mysql_real_escape_string($myusername);
$mypassword = mysql_real_escape_string($mypassword);

$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result=mysql_query($sql);

$count=mysql_num_rows($result);

if($count==1){

session_start();
$_SESSION['myusername']=$myusername;
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>