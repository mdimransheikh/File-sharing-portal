<?php include 'inc/header.php';?>
				
<div class="women_main">
	<!-- start content -->
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Faculty Pannel - Result Uploading</h2>
					</div>

					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Result_Id   = $fm->validation($_POST['Result_Id']);
        $Department  = $fm->validation($_POST['Department']);
        $Year   	 = $fm->validation($_POST['Year']);
        $Semister 	 = $fm->validation($_POST['Semister']);
        $Type 		 = $fm->validation($_POST['Type']);
        $Name 		 = $fm->validation($_POST['Name']);

        $Result_Id   = mysqli_real_escape_string($db->link, $Result_Id);
        $Department  = mysqli_real_escape_string($db->link, $Department);
        $Year    	 = mysqli_real_escape_string($db->link, $Year);
        $Semister 	 = mysqli_real_escape_string($db->link, $Semister);
        $Type 		 = mysqli_real_escape_string($db->link, $Type);
        $Name 		 = mysqli_real_escape_string($db->link, $Name);

        $file_name = $_FILES['Result_File']['name'];
	    $file_temp = $_FILES['Result_File']['tmp_name'];
	    $folder    = "result_files/";

    	move_uploaded_file($file_temp, $folder.$file_name);
        $query = "INSERT INTO tbl_result(Result_Id, Department, Year, Semister, Type, Name, Result_File) VALUES('$Result_Id','$Department','$Year','$Semister','$Type','$Name','$file_name')";
        $result = $db->insert($query);
        if($result != false){
            echo "<span class='success'>New Result is Uploaded successfully.!!</span>";
        }else{
            echo "<span class='error'>New Result is not uploaded.!!</span>";
        }
    }
?>
			<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Result ID</label>
					<div class="col-sm-8">
						<input type="text" class="form-control1" id="focusedinput" name="Result_Id" placeholder="Give the result id">
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
					<label for="selector1" class="col-sm-2 control-label">Year</label>
					<div class="col-sm-8"><select name="Year" id="selector1" class="form-control1">
						<option value="first">Select Year</option>
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
						<option value="first">Select Semister</option>
						<option value="first">FIRST</option>
						<option value="second">SECOND</option>
					</select></div>
				</div>

				<div class="form-group">
					<label for="selector1" class="col-sm-2 control-label">Exam Type</label>
					<div class="col-sm-8"><select name="Type" id="selector1" class="form-control1">
						<option>Select Exam Type</option>
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
						<input type="text" class="form-control1" id="focusedinput" name="Name" placeholder="Give the result name">
					</div>
				</div>

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">File Upload</label>
					<div class="col-sm-8">
						<input type="file" class="form-control1" id="focusedinput" name="Result_File">
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