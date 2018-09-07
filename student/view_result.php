<?php include 'inc/header.php';?>
				
<div class="women_main">
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Student Panel - View Results</h2>
					</div>
					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<table class="table">
						  <thead class="thead-dark">
						    <tr style="background-color: #2E3644; color: #fff">
						      <th scope="col">Department</th>
						      <th scope="col">Year</th>
						      <th scope="col">Semister</th>
						      <th scope="col">Type</th>
						      <th scope="col">Name</th>
						      <th scope="col">File</th>
						    </tr>
						  </thead>
						  <tbody>
						<?php 
							$query = "select * from tbl_result";
							$result = $db->select($query);
							if($result != false){
								while($data = $result->fetch_assoc()){
						?>
						    <tr>
						      <td><?php echo $data['Department'];?></td>
						      <td><?php echo $data['Year'];?></td>
						      <td><?php echo $data['Semister'];?></td>
						      <td><?php echo $data['Type'];?></td>
						      <td><?php echo $data['Name'];?></td>
						      <td>
						      	<a href="show_result.php?Result_Id=<?php echo $data['Result_Id'];?>" target="_blank"><img src="images/file.png" height="50px" width="50px"></a>
						      </td>
						    </tr>
						<?php } } ?>
						  </tbody>
						</table>
					</div>
				</div>
<?php include 'inc/footer.php';?>