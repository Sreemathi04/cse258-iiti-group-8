<?php
	session_start();
	if(!isset($_SESSION['myusername']) ){
		header("location:index.php");
	}
	date_default_timezone_set('Asia/Calcutta');
	$heading = $_POST['heading'];
	$updatetime = substr($_POST['timestamp_update'] ,0 , 6);	
	$timestamp = substr($_POST['timestamp_update'] , 6 , strlen($_POST['timestamp_update']));
	
	$time = date('H:i:s d/m/Y');
	if ($updatetime == "retain"){
		$html = new DOMDocument();
		$html->loadHTMLFile('news/'.$timestamp.'.php');
		$time = ($html->getElementById('date')->nodeValue);
	}
	$content = $_POST['content'];
	$author = $_POST['author'];
	$newpost = "news/".$timestamp.".php";
	$handle = fopen($newpost, 'w') or die('Cannot open file:  '.$newpost);
	$data = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?PHP
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> Central Library IIT Indore </title>
<link rel=\'stylesheet\' type = \'text/css\' href=\'../css/main.css\' />
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
		<td> <a href="../index.php"> Home </a> </td>
		<td> <a href="../Search.php"> Search </a> </td>
		<td> <a href="newsfeed.php"> News </a> </td>
		<td> <a href="../eResources.php"> eResources </a> </td>
		<td> <a href="../Librarians.php"> Librarians </a> </td>
	</tr> </table>
	</div>
	<div id="contentbox">
		<br />
		<h2 id="heading">' .$heading. '</h2>
		<h3 id="date">' .$time. '</h3>
		<p id="content">' .$content. '</p>
		<h4 id="author">' .$author. '</h4>
		<?php
			if(isset($_SESSION[\'myusername\']) ){
				echo "<br /> <br /> <br /> 
					<h4> Admin Actions: <form method =\"POST\" action=\"../edit.php\">
					<input type=\"radio\" name=\"edit\" value=\"Edit ".basename(__FILE__,\'.php\')."\"> Edit
					<input type=\"radio\" name=\"edit\" value=\"Delete ".basename(__FILE__,\'.php\')."\"> Delete <br />
					<input type=\"submit\" name=\"Submit\" value=\"Proceed\">
					</form> </h4>";				
			}
		?>
		</div>
</div> 
<div id="footer">
	<table> <tr>
		<td> <a> About </a> </td>
		<td> <a href="../librarians.php"> Contact us </a> </td>
		<td> <a> Privacy Statement </a> </td>
		<td> <a href="http://iiti.ac.in"> IIT Indore </a> </td>
		<?php
			if(isset($_SESSION[\'myusername\']) ){
				$Name = $_SESSION[\'myusername\'];
				echo ("<td> <a href=\"logout.php\"> ($Name) Logout </a> </td>") ;
				echo ("<td> <a href=\"login_success.php\"> Manage Newsfeed </a> </td>") ;
			} else {
				echo ("<td> <a href=\"../login.php\"> Login </a> </td>");
			}
		?>
	</tr> </table>
	<h3> <a href="http://centrallibraryiitindore.blogspot.com/">Follow us on Wordpress </a> </h3>
</div> 
</body>
</html>';
	fwrite($handle, $data);
	fclose($handle);
	if ($updatetime == "update"){
		$timestampnew = date('YmdHis');
		echo $timestamp;
		echo $timestampnew;
		rename('news/'.$timestamp.'.php', 'news/'.$timestampnew.'.php');
	}
	header("location:index.php");
?>
