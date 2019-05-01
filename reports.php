 <?php 


include 'head.php';
include 'header.php';

 ?>
 <?php

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'librarymanagement';

$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if (mysqli_connect_errno()) {
	die('database connect failed'.mysqli_connect_error());
	echo "error";
}else{
	//echo  "connect successful ";
}

?>


 <?php 
if (isset($_POST['submit'])) {
	$date_time = $_POST['date_time'];
	$color = $_POST['color'];
	$query = "SELECT * FROM issue WHERE Issue_Date = '$date_time' ";
	$result = mysqli_query($connect,$query);
	if (mysqli_num_rows($result) > 0 ) {
		while ($row = mysqli_fetch_assoc($result)) {
		echo $row['Issue_Date'];
}
	}else{
		echo 'no records';
		echo $date_time;
		echo $color;

	}


}

  ?>
<!--
  <?php 
if (isset($_POST['submit'])) {
	$date_time =$_POST['date_time'];
	$query = "INSERT INTO test (date_time) values ($date_time)";
	$result = mysqli_query($connect,$query);
	echo $date_time;
}
   ?>
-->
<!DOCTYPE html>
<html>
<head>
	<title>reports</title>
</head>
<body>
<form method="post" action="reports.php">
	<input type="date" name="date_time">
	<input type="file" name="color">
	<input type="submit" name="submit" value="submit">
</form>

</body>
</html>