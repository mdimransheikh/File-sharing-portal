<?php include 'inc/header.php';?>
				
<div class="women_main">
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Faculty Panel - Student Control</h2>
					</div>

					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<table class="table">
						  <thead class="thead-dark">
						    <tr style="background-color: #2E3644; color: #fff">
						      <th scope="col">Student ID</th>
						      <th scope="col">Name</th>
						      <th scope="col">Username</th>
						      <th scope="col">Email</th>
						      <th scope="col">Department</th>
						      <th scope="col">University</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
				<?php 
					$query = "select * from student";
					$result = $db->select($query);
					if($result != false){
						while($data = $result->fetch_assoc()){
				?>
						    <tr>
						      <td><?php echo $data['roll_num'];?></td>
						      <td><?php echo $data['Name'];?></td>
						      <td><?php echo $data['Uname'];?></td>
						      <td><?php echo $data['Email'];?></td>
						      <td><?php echo $data['Subject'];?></td>
						      <td><?php echo $data['University'];?></td>
						      <td>
								<a onclick="return confirm('Are you sure want to remove this student!');" href="delete_student.php?delStudent_Id=<?php echo $data['Id']; ?>">Delete</a>					
							  </td>
						    </tr>
				<?php } } ?>
						  </tbody>
						</table>

					</div>
				</div>
<?php include 'inc/footer.php';?>