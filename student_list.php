 <?php 

require_once('connect.php');

include 'head.php';
require_once('header.php');
 ?>
<br>

<?php 
	

 ?>
<div class='container'>
<form class="form-inline" method="post" action="student_list.php">

  <div class="form-group mx-sm-3 mb-2">
   <div class="form-group col-md-3">
      <label for="inputState"></label>
      <select id="inputState" class="form-control" name="course">
      	<option value="all" selected>all</option>

      <?php			$query = "SELECT * FROM course_details";
					$result = mysqli_query($connect,$query); 

					while($row = mysqli_fetch_assoc($result)){ ?>


							<option value="<?php echo $row['course_id'] ?>" selected><?php echo $row['course_id'] ?></option>


		<?php			}


		?>

        
        
      </select>
    </div>
  </div>
  <button type="submit" class="btn btn-secondary mb-2" name="submit">filter</button>
</form>
</div>

<?php if (isset($_POST['submit'])) { ?>
	<div class="table-responsive">
				<table class="table table-bordered">
					 <thead class="thead-dark">
					<tr style="text-align: center;">
						<th width="5%">ID</th>
						<th width="10%">Fist Name</th>
						<th width="10%">Last Name</th>
						<th width="15%">NIC</th>
						<th width="20%">Address</th>
						<th width="15%">Mobile</th>
						<th width="10%">Course</th>
						<th width="5%"></th>
						<th width="5%"></th>
						
					</tr>
				</thead>
					<?php
					if ($_POST['course'] == 'all') {
						$course = $_POST['course'];
						$query = "SELECT * FROM students";
						$result = mysqli_query($connect,$query);
					}else{
						$course = $_POST['course'];
						$query = "SELECT * FROM students WHERE course = '$course' ";
						$result = mysqli_query($connect,$query);


					}
					
					if (mysqli_num_rows($result) > 0) {
						
						while($row = mysqli_fetch_assoc($result))
						{
					?>
					<tr>
						
						<td><?php echo $row["id"]; ?></td>
						<td><?php echo $row["first_name"]; ?></td>
						<td><?php echo $row["last_name"]; ?></td>
						<td ><?php echo $row["nic"]; ?></td>
						<td ><?php echo $row["address"]; ?></td>
						<td ><?php echo $row["mobile_number"]; ?></td>
						<td ><?php echo $row["course"]; ?></td>
						<?php $id=$row['id'];?>
						<td ><a href="modify.php?user=<?php echo $id ;?>">edit</a></td>
						<td ><a href="#">delete</a></td>
						
						
						
					</tr>
					
					<?php
							
						}
					?>
					
					<?php
						
					}else{
							echo '<script>alert("Record not found!!")</script>';
							echo '<script>window.location="student_list.php"</script>';
					
								}
					
					?>
		

				
						
				</table>

			<br>
			</div>
<?php } ?>


<?php mysqli_close($connect); ?>