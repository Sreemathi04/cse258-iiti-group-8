<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title> Central Library IIT Indore </title>
<link rel='stylesheet' type = 'text/css' href='css/main.css' />
</head>
<body>
<div id= "wrap"> 
	<div id="header">
    	<a href="http://www.iiti.ac.in"><img src="css/resources/logo.png" /></a>
        <h1> Central Library </h1>
        <br  />
        <h1> Indian Institute of Technology Indore</h1>
    	<br /> <br />
    </div>
    <br />

    <div id="pinned">
    	<table> <tr>
        <td> <a href="index.php"> Home </a> </td>
      <td> <a href="Search.php"> Search </a> </td>
      <td> <a href="eResources.php"> eResources </a> </td>
      <td> <a href="Librarians.php"> Librarians </a> </td>
      </tr>
        </table>
    </div>

    <div id="contentbox">

        <br />
        <h2> Librarians </h2>
                <p>
				<?php
					$file = fopen("content\librarians.txt", "r") or exit("Unable to open file!");
					while(!feof($file)) {
						echo fgets($file). "<br>";
					}
					fclose($file);
                ?>
                </p>
		</div>
</div>
		 <div id="footer">
          <table> <tr>
           <td> <a> About </a> </td>
           <td> <a href="librarians.php"> Contact us </a> </td>
           <td> <a> Privacy Statement </a> </td>
           <td> <a href="http://iiti.ac.in"> IIT Indore </a> </td>
		   <?php
				session_start();
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