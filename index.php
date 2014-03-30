<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title> Central Library IIT Indore </title>
<link rel='stylesheet' type = 'text/css' href='css/main.css' />
<!--Jquery plugin taken from http://jquery.malsup.com/cycle/ -->
<!--Special Thanks to the author Mike Alsup(https://github.com/malsup) for providing an opensource JQuery plugin for slideshow-->
<!-- include jQuery library -->
<script type="text/javascript" src="css/jquery.min.js"></script>
<!-- include Cycle plugin -->
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
	<div id="header">
    	<img src="css/resources/logo.png" />
        <h1> Central Library </h1>
        <br  />
        <h1> Indian Institute of Technology Indore<h1>
    	<br /> <br />
    </div>
    <br />

    <div id="pinned">
    	<table> <tr>
        <td> <a > Home </a> </td>
    	<td> <a > Search </a> </td>
    	<td> <a > eResources </a> </td>
    	<td> <a > Librarians </a> </td>
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
        <h2> Heading </h2>
        <!--
		<p> content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content content </p>
        -->
                <p>
		<?php
			$file = fopen("content\index.txt", "r") or exit("Unable to open file!");
			while(!feof($file))
                        {
                        echo "<pre><p>", fgets($file), "</p></pre>";
                        }
                        fclose($file);
                ?>
                </p>
		</div>

		<div id="footer">
        	<table> <tr>
           <td> <a> About</a> </td>
           <td> <a> Contact us</a> </td>
           <td> <a> Privacy Statement</a> </td>
           <td> <a> IIT Indore</a> </td>
           </tr> </table>
           <h3> Follow us on Wordpress </h3>
        </div>
</body>
</html>