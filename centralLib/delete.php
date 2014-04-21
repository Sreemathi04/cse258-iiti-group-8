<?PHP
	session_start();
	if(!isset($_SESSION['myusername']) ){
		header("location:index.php");
	}
	if (substr($_POST["delete"],0,3) == "Yes"){
		$file = substr($_POST["delete"],3 , strlen($_POST["delete"]) );
		unlink('./news/'.$file.'.php');
	} else if (substr($_POST["delete"],0,2) == "No"){
		header("location:index.php");
	}
?>