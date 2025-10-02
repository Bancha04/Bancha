<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>บัญชา  แสนนา</title>
	</head>

	<body>
    <h1>บัญชา  แสนนา </h1>
    <form method="post" action=""> กรอกข้อมูล<input ="text" name="a" autofocus> 
   <input type="submit" name="Submit" value="OK">
  <hr> 
    <?php
	if(isset($_POST['Submit'])){
  		$a = $_POST ['a'];
		
			if ($a =="dog" or $a=="หมา" || $a=="สุนัข"){
				echo "<img src='01.jpg' width ='500' >";
			}
			else if ($a =="cat" or $a=="แมว" || $a=="เหมียว"){
				echo "<img src='02.jpg' width ='500' >";
			}
			else if ($a =="tiger" || $a=="เสีย" || $a=="เสือ"){
				echo "<img src='03.jpg' width ='500' >";
			}
			else{
				echo "กรอกใหม่ค่ะ";
			}
	}
	?>
	</body>
</html>