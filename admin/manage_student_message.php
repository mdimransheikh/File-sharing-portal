<?php include 'inc/header.php';?>
				
<div class="women_main">
	<!-- start content -->
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Faculty Panel - Student Message Control</h2>
					</div>

					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<table class="table">
						  <thead class="thead-dark">
						    <tr style="background-color: #2E3644; color: #fff">					<th scope="col">Student ID</th>
						      <th scope="col">Name</th>
						      <th scope="col">Message</th>
						      <th scope="col">Date</th>
						      <th scope="col">File</th>
						      <th scope="col">Action</th>
						    </tr>
						  </thead>
						  <tbody>
					<?php 
						$query = "SELECT tbl_message.*, student.* FROM tbl_message 
									INNER JOIN student
									ON tbl_message.username = student.Uname";
						$result = $db->select($query);
						if($result != false){
							while($data = $result->fetch_assoc()){
					?>
						    <tr>
						      <td><?php echo $data['roll_num']; ?></td>
						      <td><?php echo $data['Name']; ?></td>
						      <td><?php echo $data['message']; ?></td>
						      <td><?php echo $data['message_time']; ?></td>
						      <td style="width: 20%">
						  	      <a href="show_message.php?id=<?php echo $data['id'];?>" target="_blank"><img src="images/file.png" alt="image" height="50px" width:"50px" /></a>
						  		</td>
						       <td> 
								<a onclick="return confirm('Are you sure want to delete!');" href="delete_message.php?delMessage_Id=<?php echo $data['id']; ?>">Delete</a>					
							  </td>
						    </tr>
					<?php } } ?>
						  </tbody>
						</table>

					</div>
				</div>

	<!-- end content -->
<?php include 'inc/footer.php';?>