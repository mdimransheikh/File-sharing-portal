<?php include 'inc/header.php';?>

<?php 
    if(!isset($_GET['Notice_Id']) || $_GET['Notice_Id'] == NULL){
        echo "<script>window.location = 'report_view_notice.php';</script>";
    }else{
        $Notice_Id = $_GET['Notice_Id'];
    }
?>
				
<div class="women_main">
	<div class="grids">

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Department  = $fm->validation($_POST['Department']);
        $Topics 	 = $fm->validation($_POST['Topics']);
        $Notice_Name = $fm->validation($_POST['Notice_Name']);

        $Department  = mysqli_real_escape_string($db->link, $Department);
        $Topics 	 = mysqli_real_escape_string($db->link, $Topics);
        $Notice_Name = mysqli_real_escape_string($db->link, $Notice_Name);

        $target = "files/";
		$target = $target . basename( $_FILES['Notice_File']['name']);
		$Notice_File=basename( $_FILES['Notice_File']['name']);

            if(empty($Department) || empty($Topics) || empty($Notice_Name)){
                echo "<span class='error'>Field must not be empty..!!</span>";
            } else{
            	move_uploaded_file($_FILES['Notice_File']['tmp_name'], $target);
                $query = "UPDATE tbl_notice
                			SET
			                Department  = '$Department',
			                Topics   = '$Topics',
			                Notice_Name = '$Notice_Name',
			                Notice_File = '$Notice_File'
			                WHERE Notice_Id = '$Notice_Id'";
                $result = $db->update($query);
                if($result != false){
                    echo "<span class='success'>Notice is updated successfully.!!</span>";
                }else{
                    echo "<span class='error'>Notice is not updated.!!</span>";
                }
            }
        }
?>
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Faculty Pannel - Books Uploading</h2>
					</div>

					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
						<?php 
				           $query = "SELECT * FROM tbl_notice WHERE Notice_Id='$Notice_Id'";
				            $getdata = $db->select($query);
				                while($result = $getdata->fetch_assoc()){
				        ?>
									
						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

							<div class="form-group">
								<label for="selector1" class="col-sm-2 control-label">Department</label>
								<div class="col-sm-8"><select name="Department" id="selector1" class="form-control1">
									<option value="<?php echo $result['Department'];?>"><?php echo $result['Department'];?></option>
									<option value="cse">CSE</option>
									<option value="pme">PME</option>
									<option value="ipe">IPE</option>
									<option value="bme">BME</option>
									<option value="acc">ACC</option>
								</select></div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Topics</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" id="focusedinput" value="<?php echo $result['Topics'];?>" name="Topics" placeholder="Give the name of the books or comments">
								</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Topics name</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" id="focusedinput" value="<?php echo $result['Notice_Name'];?>" name="Notice_Name" placeholder="Give the name of the publisher">
								</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">File Upload</label>
								<div class="col-sm-8">
									<input type="file" class="form-control1" id="focusedinput" name="Notice_File" required="">
								</div>
							</div>
							<button type="submit" class="btn btn-default">Submit</button>
						</form>
					<?php } ?>
								</div>
						</div>
					</div>
				</div>
<?php include 'inc/footer.php';?>