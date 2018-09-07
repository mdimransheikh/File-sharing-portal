<?php include 'inc/header.php';?>

<?php 
    if(!isset($_GET['Result_Id']) || $_GET['Result_Id'] == NULL){
        echo "<script>window.location = 'report_view_result.php';</script>";
    }else{
        $Result_Id = $_GET['Result_Id'];
    }
?>
				
<div class="women_main">
	<!-- start content -->
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Faculty Pannel - Result Uploading</h2>
					</div>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Department  = $fm->validation($_POST['Department']);
        $Year   	 = $fm->validation($_POST['Year']);
        $Semister 	 = $fm->validation($_POST['Semister']);
        $Type 		 = $fm->validation($_POST['Type']);
        $Name 		 = $fm->validation($_POST['Name']);

        $Department  = mysqli_real_escape_string($db->link, $Department);
        $Year    	 = mysqli_real_escape_string($db->link, $Year);
        $Semister 	 = mysqli_real_escape_string($db->link, $Semister);
        $Type 		 = mysqli_real_escape_string($db->link, $Type);
        $Name 		 = mysqli_real_escape_string($db->link, $Name);

        $target = "files/";
		$target = $target . basename( $_FILES['Result_File']['name']);
		$Result_File=basename( $_FILES['Result_File']['name']);

            if(empty($Department) || empty($Year) || empty($Semister) || empty($Type) || empty($Name)){
                echo "<span class='error'>Field must not be empty..!!</span>";
            } else{
            	move_uploaded_file($_FILES['Result_File']['tmp_name'], $target);
                
                $query = "UPDATE tbl_result
                			SET
                			Department    = '$Department',
			                Year  = '$Year',
			                Semister   = '$Semister',
			                Type = '$Type',
			                Name   = '$Name',
			                Result_File = '$Result_File'
			                WHERE Result_Id = '$Result_Id'";
                $result = $db->update($query);
                if($result != false){
                    echo "<span class='success'>New Result is updated successfully.!!</span>";
                }else{
                    echo "<span class='error'>New Result is not updated.!!</span>";
                }
            }
        }
?>
					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
						<?php 
				           $query = "SELECT * FROM tbl_result WHERE Result_Id='$Result_Id'";
				            $getdata = $db->select($query);
				                while($result = $getdata->fetch_assoc()){
				        ?>

									<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">

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
											<label for="selector1" class="col-sm-2 control-label">Year</label>
											<div class="col-sm-8"><select name="Year" id="selector1" class="form-control1">
												<option value="<?php echo $result['Year'];?>"><?php echo $result['Year'];?></option>
												<option value="first">FIRST</option>
												<option value="second">SECOND</option>
												<option value="third">THIRD</option>
												<option value="forth">FORTH</option>
												<option value="masters">MASTERS</option>
											</select></div>
										</div>

										<div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Semister</label>
											<div class="col-sm-8"><select name="Semister" id="selector1" class="form-control1">
												<option value="<?php echo $result['Semister'];?>"><?php echo $result['Semister'];?></option>
												<option value="first">FIRST</option>
												<option value="second">SECOND</option>
											</select></div>
										</div>

										<div class="form-group">
											<label for="selector1" class="col-sm-2 control-label">Exam Type</label>
											<div class="col-sm-8"><select name="Type" id="selector1" class="form-control1">
												<option value="<?php echo $result['Type'];?>"><?php echo $result['Type'];?></option>
												<option value="ct">Class Test</option>
												<option value="semester">Semester</option>
												<option value="yearly">Yearly</option>
												<option value="lab">Lab</option>
												<option value="others">Others</option>
											</select></div>
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">Result Name/Comments</label>
											<div class="col-sm-8">
												<input type="text" class="form-control1" id="focusedinput" value="<?php echo $result['Name'];?>" name="Name" placeholder="Give the result name">
											</div>
										</div>

										<div class="form-group">
											<label for="focusedinput" class="col-sm-2 control-label">File Upload</label>
											<div class="col-sm-8">
												<input type="file" class="form-control1" id="focusedinput" name="Result_File" required="">
											</div>
										</div>
										<button type="submit" class="btn btn-default">Update</button>
									</form>
							<?php } ?>
								</div>
						</div>
					</div>
				</div>

	<!-- end content -->
<?php include 'inc/footer.php';?>