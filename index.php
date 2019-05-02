<!DOCTYPE html>
<html>
<head>
	<title>ICT Institute</title>
	<?php include 'head.php'; ?>
	
</head>
<body>
	
  <!-- Content here :) -->




<?php 
		if (isset($_GET['page'])) {
			switch ($_GET['page']) {
				
				case 'registration':
					include 'registration.php';
					break;
				case 'course':
					include 'course-registration.php';
					break;
				case 'attendance':
					include 'attendance-course.php';
					break;
				case 'payment':
					include 'payment.php';
					break;
				case 'finance':
					include 'finance.php';
					break;
				default:
					# code...
					break;
			}
		}else{
			include 'menu.php';

		}
 ?>

 <?php include 'footer.php';?>



</body>
</html>

