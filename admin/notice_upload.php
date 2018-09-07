<?php include 'inc/header.php';?>
				
<div class="women_main">
	<!-- start content -->
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Faculty Pannel - Notice Uploading</h2>
					</div>

					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Notice_Id   = $fm->validation($_POST['Notice_Id']);
        $Department  = $fm->validation($_POST['Department']);
        $Topics 	 = $fm->validation($_POST['Topics']);
        $Notice_Name = $fm->validation($_POST['Notice_Name']);

        $Notice_Id   = mysqli_real_escape_string($db->link, $Notice_Id);
        $Department  = mysqli_real_escape_string($db->link, $Department);
        $Topics 	 = mysqli_real_escape_string($db->link, $Topics);
        $Notice_Name = mysqli_real_escape_string($db->link, $Notice_Name);

        $file_name = $_FILES['Notice_File']['name'];
	    $file_temp = $_FILES['Notice_File']['tmp_name'];
	    $folder    = "notice_files/";

    	move_uploaded_file($file_temp, $folder.$file_name);
        $query = "INSERT INTO tbl_notice(Notice_Id, Department, Topics, Notice_Name, Notice_File) VALUES('$Notice_Id','$Department','$Topics','$Notice_Name','$file_name')";
        $result = $db->insert($query);
        if($result != false){
            echo "<span class='success'>New Notice is uploaded successfully.!!</span>";
        }else{
            echo "<span class='error'>New Notice is not uploaded.!!</span>";
        }
    }
?>
			<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Notice ID</label>
					<div class="col-sm-8">
						<input type="text" class="form-control1" id="focusedinput" name="Notice_Id" placeholder="Give the notice ID">
					</div>
				</div>

				<div class="form-group">
					<label for="selector1" class="col-sm-2 control-label">Department</label>
					<div class="col-sm-8"><select name="Department" id="selector1" class="form-control1">
						<option>Select Department</option>
						<option value="cse">CSE</option>
						<option value="pme">PME</option>
						<option value="ipe">IPE</option>
						<option value="bme">BME</option>
						<option value="acc">ACC</option>
					</select></div>
				</div>

				<div class="form-group">
					<label for="selector1" class="col-sm-2 control-label">Topic</label>
					<div class="col-sm-8"><select name="Topics" id="selector1" class="form-control1">
						<option>Select Topic</option>
						<option value="exam">Exam</option>
						<option value="result">Result</option>
						<option value="time table">Time Table</option>
						<option value="vacation">Vacation</option>
						<option value="others">Others</option>
					</select></div>
				</div>

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Notice Name/Comments</label>
					<div class="col-sm-8">
						<input type="text" class="form-control1" id="focusedinput" name="Notice_Name" placeholder="Give the notice name">
					</div>
				</div>

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">File Upload</label>
					<div class="col-sm-8">
						<input type="file" class="form-control1" id="focusedinput" name="Notice_File">
					</div>
				</div>
				<button style="margin-left: 180px" type="submit" class="btn btn-default">Upload</button>
			</form>
								</div>
						</div>
					</div>
				</div>

	<!-- end content -->
<?php include 'inc/footer.php';?>