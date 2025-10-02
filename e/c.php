<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>บัญชา  แสนนา</title>
	</head>

	<body>
    
    <form method="post" action=""> กรอกข้อมูล<input ="text" name="a" autofocus> 
   <input type="submit" name="Submit" value="OK">
  <hr> 
    <?php
	if(isset($_POST['Submit'])){
  		$gender = $_POST ['a'];
		if($gender == 1){
			echo "เพศชาย";
			}
		elseif($gender == 2){
			echo "เพศหญิง";
			}
		elseif($gender == 3){
			echo "กาเตย";
			} 
			
		else {echo "กรอกข้อมูลไม่ถูกต้อง";}
	}
	?>
	</body>
</html>