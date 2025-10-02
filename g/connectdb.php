<meta charset="utf-8">
<?php
	$host = "localhost" ;
	$user = "root" ;
	$pwd = "Mbs12345" ;
	$dbname = "msu_bancha" ;
	$conn = mysqli_connect($host, $user, $pwd, $dbname) ;
	mysqli_query($conn, "SET NAMES utf8")
	?>