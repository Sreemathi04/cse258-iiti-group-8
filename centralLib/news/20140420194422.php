<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title> Central Library IIT Indore </title>
<link rel='stylesheet' type = 'text/css' href='../css/main.css' />
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
      <td> <a href="../eResources.php"> eResources </a> </td>
      <td> <a href="../Librarians.php"> Librarians </a> </td>
      </tr>
        </table>
  </div>
  <div id="contentbox">
        <br />
        
		<h2>phj</h2>
		
		<h3>19:44:22 20/04/2014</h3>
		
		<p>likes</p>
		
		<h4>i</h4>
		
		</div>
 
</div>   

<div id="footer">
          <table> <tr>
           <td> <a> About </a> </td>
           <td> <a href="../librarians.php"> Contact us </a> </td>
           <td> <a> Privacy Statement </a> </td>
           <td> <a href="http://iiti.ac.in"> IIT Indore </a> </td>
		    <td> <?php
				session_start();
				if(isset($_SESSION['myusername']) ){
					echo ("<a href=../\"logout.php\"> Admin Logout </a>") ;
				} else {
					echo ("<a href=../\"login.php\"> Admin Login </a>");
				}
			?>  </td>
           </tr> </table>
           <h3> <a href="http://centrallibraryiitindore.blogspot.com/">Follow us on Wordpress </a> </h3>
</div>
        
</body>
</html>