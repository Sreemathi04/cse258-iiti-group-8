<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> Central Library IIT Indore </title>
	<link rel='stylesheet' type = 'text/css' href='css/main.css' />
</head>
<body>
<div id="wrap"> 
	<div id="header">
		<img src="css/resources/logo.png" />
		<h1> Central Library </h1>
		<br  />
		<h1> Indian Institute of Technology Indore </h1>
		<br /> 
		<br />
	</div>
	<br />
	<div id="pinned">
		<table> <tr>
			<td> <a href="index.php"> Home </a> </td>
			<td> <a href="Search.php"> Search </a> </td>
			<td> <a href="newsfeed.php"> News </a> </td>
			<td> <a href="eResources.php"> eResources </a> </td>
			<td> <a href="Librarians.php"> Librarians </a> </td>
		</tr> </table>
	</div>
	<div id="contentbox">
		<br />
		<form method="POST" action="checklogin.php" style="margin-top: 50px;">
			<table style="margin:0px auto; width: 400px; position: relative;">
			<tr> <td> Username </td> <td> <input name="myusername" size="25" type="text"> </td> </tr>
			<tr> <td> Password </td> <td> <input name="mypassword" size="25" type="password"> </td> </tr>
			<tr> <td> </td> <td> <input type="submit" name="Submit" value=" Submit "> </td> </tr>
			</table>
		</form>
    </div>
</div>
<div id="footer">
	<table> <tr>
		<td> <a> About </a> </td>
		<td> <a href="librarians.php"> Contact us </a> </td>
		<td> <a> Privacy Statement </a> </td>
		<td> <a href="http://iiti.ac.in"> IIT Indore </a> </td>
		<?php
			if(isset($_SESSION['myusername']) ){
				$Name = $_SESSION['myusername'];
				echo ("<td> <a href=\"logout.php\"> ($Name) Logout </a> </td>") ;
				echo ("<td> <a href=\"login_success.php\"> Manage Newsfeed </a> </td>") ;
			} else {
				echo ("<td> <a href=\"login.php\"> Login </a> </td>");
			}
		?>
	</tr> </table>
	<h3> <a href="http://centrallibraryiitindore.blogspot.com/">Follow us on Wordpress </a> </h3>
</div>
</body>
</html>