<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ธิดาทิพย์ ฤกใหญ่ (เนย)</title>
</head>

<body>
<h1>แสดงข้อมูลคณะ -- ธิดาทิพย์ ฤกใหญ่ (เนย)</h1>
<hr>
<?php
	include("connectdb.php");
	$sql = "SELECT * FROM faculty";
	$rs = mysqli_query($conn,$sql);
	while ($data = mysqli_fetch_array($rs)){
		echo $data["f_id"]."<br>";
		echo $data["f_name"]."<hr>";	
		
	}
	
	mysqli_close($conn);
?>
</body>
</html>