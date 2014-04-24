<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<?php
	session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml">
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
    	<td> <a href="newsfeed.php"> News </a> </td>
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
            	<a id="prev" href="#"> <img src="css/slideshow/rewind.png"> </a>
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
        <h2> News feed </h2>				
				<?php
					$files = glob("news/*"); 
					$files = array_combine($files, array_map("basename", $files));
					arsort($files);
					$files = array_keys($files); 	
					$html = new DOMDocument();
					for ($counter = 0; $counter < count($files) && $counter < 5 ; $counter++){
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