<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	session_start();
	if(!isset($_SESSION['myusername']) ){
		header("location:index.php");
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> Central Library IIT Indore </title>
	<link rel='stylesheet' type = 'text/css' href='css/main.css' />
<script type="script/javascript">
</script>
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
		<h2> Add News Article </h2>
		<form style="margin-left:20px;" method="post" action="templater.php"> 
			<input name="heading" type="text" style="width:900px;" placeholder="Heading"> <br /> 
			<textarea name="content" placeholder="Content" type="text" style="width:900px; height: 600px;" ></textarea> <br />
			<input name="author" type="text" placeholder="Author"> <br />
			<input type="submit" value="Publish!">
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
			$Name = $_SESSION['myusername'];
			echo ("<td> <a href=\"logout.php\"> Admin ($Name) Logout </a> </td>") ;
			echo ("<td> <a href=\"login_success.php\"> Edit Newsfeed </a> </td>") ;
		?>
	</tr> </table>
	<h3> <a href="http://centrallibraryiitindore.blogspot.com/">Follow us on Wordpress </a> </h3>
</div>    
</body>
</html>