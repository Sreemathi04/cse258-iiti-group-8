<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title> Central Library IIT Indore </title>
<link rel='stylesheet' type = 'text/css' href='css/main.css' />

<!--Jquery plugin taken from http://jquery.malsup.com/cycle/ -->
<!--Thanks to the author Mike Alsup (https://github.com/malsup)-->

<script type="text/javascript" src="css/jquery.min.js"></script>
<script type="text/javascript" src="css/jquery.cycle.all.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('.slideshow').cycle({
		fx:     'fade',
		timeout: 2000,
		next:   '#next',
		prev:   '#prev',
	});
});
</script>
<script type="text/javascript">
         var p = 1;
        window.onload = function() {
          var a = document.getElementById("pause");
		  a.onclick = function() {
			  	if (p %2 == 1){
					$('.slideshow').cycle('pause');
					document.getElementById("pausei").src = "css/slideshow/play.png";
					p++;
				} else {
					$('.slideshow').cycle('resume');
					document.getElementById("pausei").src = "css/slideshow/pause.png";
					p++;
				}
			return false;
          }
        }
    </script>

</head>

<body>
	<div id="wrap">
	<div id="header">
    	<img src="css/resources/logo.png" />
        <h1> Central Library </h1>
        <br  />
        <h1> Indian Institute of Technology Indore </h1>
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
    	<div class="slideshow">
        	<img src="css/slideshow/image1.png" />
        	<img src="css/slideshow/image2.png" />
            <img src="css/slideshow/image3.png" />
        	<img src="css/slideshow/image4.png" />
        </div>

        <div class="slidecontrol">
            	<a id="prev" href="#"> <img src="css/slideshow/rewind.png" </a>
                <a id="pause" href="#"> <img src="css/slideshow/pause.png" id="pausei" </a>
                <a id="next" href="#"> <img src="css/slideshow/forward.png"> </a>
        </div>
        <br />
        <h2> About </h2>
                <p>
					<?php
						$file = fopen("content\index.txt", "r") or exit("Unable to open file!");
						while(!feof($file)) {
							echo fgets($file). "<br>";
						}
					fclose($file);
                ?>
                </p>			
				<?php
					$dir = './news';
					$newest_mtime1 = 0;
					$newest_mtime2 = 0;
					$newest_mtime3 = 0;
					$newest_mtime4 = 0;
					$newest_mtime5 = 0;
					$show_file1 = 'BROKEN';
					$show_file2 = 'BROKEN';
					$show_file3 = 'BROKEN';
					$show_file4 = 'BROKEN';
					$show_file5 = 'BROKEN';
					if ($handle = opendir($dir)) {
					 while (false !== ($file = readdir($handle))) {
						if (($file != '.') && ($file != '..')) {
						   $mtime = filemtime("$dir/$file");
						   if($mtime > $newest_mtime1) {
							  $show_file5 = $show_file4;
							  $show_file4 = $show_file3;
							  $show_file3 = $show_file2;
							  $show_file2 = $show_file1;
							  $newest_mtime1 = $mtime;
							  $show_file1 = "$dir/$file";
						   } 
						}
					  }
					}
					closedir($handle);
						echo ('<a href="'.$show_file1.'"> last </a> <br/>');
						echo ('<a href="'.$show_file2.'"> 2nd last </a> <br/>');
						echo ('<a href="'.$show_file3.'"> 3rd last </a> <br/>');
						echo ('<a href="'.$show_file4.'"> 4th last </a> <br/>');
						echo ('<a href="'.$show_file5.'"> 5th last </a> <br/>');
					?>
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