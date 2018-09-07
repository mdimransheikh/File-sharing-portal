<?php include 'inc/header.php';?>
				
<div class="women_main">
	<!-- start content -->
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Your Profile Description</h2>
					</div>

					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<?php 
							$Name = Session::get('username');
				            $query = "SELECT * FROM tbl_faculty WHERE Name='$Name'";
				            $getdata = $db->select($query);
				                while($result = $getdata->fetch_assoc()){
				        ?>

						<div style="text-align: center;">
							<img src="images/<?php echo $result['Picture'];?>" alt="image" height="300px" width="400px">
							<h2>Name : <?php echo $result['Name'];?></h2>
							<h4>Department : <?php echo $result['Department'];?></h4>
							<h4>University : <?php echo $result['University'];?></h4>
							<h4>Email : <?php echo $result['Email'];?></h4>
							<h3>Website : <a href=""><?php echo $result['Website'];?></a></h3>
						</div>
					<?php } ?>
				</div>

	<!-- end content -->
<?php include 'inc/footer.php';?>