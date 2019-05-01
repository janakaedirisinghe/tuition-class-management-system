<?php 

require_once('connect.php');
include 'header.php';

 ?>


 

<?php 
	if (isset($_POST['submit'])) {
		$id;
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$nic = $_POST['nic'];
		$address = $_POST['address'];
		$mobile_number = $_POST['mobile_number'];
		$course = $_POST['course'];
	

		$query = "SELECT * FROM students WHERE nic = '$nic' ";
		$result = mysqli_query($connect,$query);
		if (mysqli_num_rows($result) != 1) {
						$query1 = "INSERT INTO students (first_name,last_name,nic,address,mobile_number,course) VALUES ('$fname','$lname','$nic','$address','$mobile_number','$course')";
					$result1 = mysqli_query($connect,$query1);

					$query2 = "SELECT id FROM students ORDER BY id DESC LIMIT 1";
					$result2 = mysqli_query($connect,$query2); 
					if (mysqli_num_rows($result2) == 0) {
						$id=0;
					}else{
							$row = mysqli_fetch_assoc($result2);
							$id = $row['id']  ;

					}
					

					$query3 = "INSERT INTO course (id,course_id) VALUES ('$id','$course')";
					$result3 = mysqli_query($connect,$query3);

					$query4 = "INSERT INTO payment (id,course_id) VALUES ('$id','$course') ";
					$result4 = mysqli_query($connect,$query4);


					if ($result1 && $result2 && $result3 && $result4) {
						echo '<script>alert("Registration succsessful")</script>';
						echo '<script>window.location="index.php"</script>';
					}
		}else{
						echo '<script>alert("NIC number already added!")</script>';
						echo '<script>window.location="index.php?page=registration"</script>';
		}

		

		
	}

 ?>
<br>
	<div class="container">
  <!-- Content here -->

	<form method="POST" action="registration.php">

  <div class="form-group">
    <label for="exampleInputEmail1">First Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Details" name="fname" required>   
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Last Name</label>
    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter Details" name="lname" required>
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">NIC Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Details" name="nic" required>   
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Details" name="address" required>    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Mobile Number</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Details" name="mobile_number" required >   
  </div>
  <div class="form-group col-md-3">
      <label for="inputState">Course</label>
      <select id="inputState" class="form-control" name="course">

      <?php			$query = "SELECT * FROM course_details";
					$result = mysqli_query($connect,$query); 
					while($row = mysqli_fetch_assoc($result)){ ?>


							<option value="<?php echo $row['course_id'] ?>" selected><?php echo $row['course_id'] ?></option>


		<?php			}


		?>

        
        
      </select>
    </div>
 
  
  <button type="submit" class="btn btn-secondary" name="submit">Submit</button>
</form>
 </div>
<?php mysqli_close($connect); ?>