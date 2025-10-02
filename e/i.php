<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>บัญชา  แสนนา</title>
	</head>

	<body>
    <h1>บัญชา  แสนนา </h1>
    <form method="post" action=""> กรอกแม่สูตรคูณ<input type="number" min="2" name="a" autofocus> 
   <input type="submit" name="Submit" value="OK">
  <hr> 
    <?php
	if(isset($_POST['Submit'])){
  		$m = $_POST ['a'];
		
		for ($i=1; $i<=12; $i++){
			$c = $m*$i; 
			echo number_format ($m, 0)." x ".$i." = ".number_format($c,0)."<br>";
			//echo "$m x". $i. "= $c <br>";
			} 
			
	}
	?>
	</body>
</html>