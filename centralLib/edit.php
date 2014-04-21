<?php
	session_start();
	if(!isset($_SESSION['myusername']) ){
		header("location:index.php");
	}
	
	if (substr($_POST["edit"],0,4) == "Edit"){
		
		$filename = substr($_POST["edit"] ,5 , strlen($_POST["edit"]));
		
		$html = new DOMDocument();
		@$html->loadHTMLFile('./news/'.$filename.'.php');
		$heading = ($html->getElementById('heading')->nodeValue);
		$author = ($html->getElementById('author')->nodeValue);
		$content = ($html->getElementById('content')->nodeValue);
		echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	session_start();
	if(!isset($_SESSION[\'myusername\']) ){
		header("location:index.php");
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> Central Library IIT Indore </title>
	<link rel=\'stylesheet\' type = \'text/css\' href=\'css/main.css\' />
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
		<h2> Edit News Article </h2>
		<form style="margin-left:20px;" method="post" action="templater_edited.php"> 
			<input name="heading" type="text" style="width:900px;" value="'.$heading.'"><br /> 
			<textarea name="content" placeholder="Content" type="text" style="width:900px; height: 600px;" >'.$content.'</textarea> <br />
			<input name="author" type="text" value='.$author.'><br />
			<input name="timestamp_update" type="radio" value="update'.$filename.'"> Update(Current date)
			<input name="timestamp_update" type="radio" value="retain'.$filename.'"> Retain(Older date)
			<input type="submit" value="Edit!">
		</form>
	</div>
</div>   
<div id="footer">
	<table> <tr>
		<td> <a> About </a> </td>
		<td> <a href="librarians.php"> Contact us </a> </td>
		<td> <a> Privacy Statement </a> </td>
		<td> <a href="http://iiti.ac.in"> IIT Indore </a> </td>';
			$Name = $_SESSION['myusername'];
			echo ("<td> <a href=\"logout.php\"> Admin ($Name) Logout </a> </td>") ;
			echo ("<td> <a href=\"login_success.php\"> Edit Newsfeed </a> </td>") ;
	echo'</tr> </table>
	<h3> <a href="http://centrallibraryiitindore.blogspot.com/">Follow us on Wordpress </a> </h3>
</div>    
</body>
</html>';
		} else if (substr($_POST["edit"],0,6) == "Delete") {
		$filename = substr($_POST["edit"] ,7 , strlen($_POST["edit"]));
		$html = new DOMDocument();
		@$html->loadHTMLFile('./news/'.$filename.'.php');
		$heading = ($html->getElementById('heading')->nodeValue);
		echo " <h4> \"$heading\" </h4>";
	
	echo "	<h4> Really Delete?
				<form method=\"post\" action=\"delete.php\">
				<input type=\"radio\" name=\"delete\" value=\"Yes".$filename."\"> Yes
				<input type=\"radio\" name=\"delete\" value=\"No".$filename."\"> No <br />
				<input type=\"submit\" name=\"Submit\" value=\"Proceed\">
				</form> </h4>";
	}
?>
