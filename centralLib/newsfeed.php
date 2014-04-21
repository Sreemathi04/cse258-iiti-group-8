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
		<h2 style="padding-top:30px"> News feed</h2>
		<br />
		<table>
		<?PHP
			$files = glob("news/*"); 
			$files = array_combine($files, array_map("basename", $files));
			arsort($files);
			$files = array_keys($files); 
			$html = new DOMDocument(); 
			for ($counter = 0; $counter < count($files); $counter++){
				@$html->loadHTMLFile($files[$counter]);
				$heading = ($html->getElementById('heading')->nodeValue);
				$url = basename($files[$counter]);
				echo "<h3><a href=\"news/$url\"> $heading </a><h3>";
				$author = ($html->getElementById('author')->nodeValue);
				$time = ($html->getElementById('date')->nodeValue);
				echo "<h4>$author, $time </h4>";
				$content = ($html->getElementById('content')->nodeValue);
				if (strlen($content) < 294){
					echo "<p> $content </p>";
				} else {
					$content = substr($content, 0, 294);
					echo "<p> $content... </p>";
				}
			}
		?>
		</table>
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
				echo ("<td> <a href=\"logout.php\"> Admin ($Name) Logout </a> </td>") ;
				echo ("<td> <a href=\"login_success.php\"> Edit Newsfeed </a> </td>") ;
			} else {
				echo ("<td> <a href=\"login.php\"> Admin Login </a> </td>");
			}
		?>
	</tr> </table>
	<h3> <a href="http://centrallibraryiitindore.blogspot.com/">Follow us on Wordpress </a> </h3>
</div>
</body>
</html>