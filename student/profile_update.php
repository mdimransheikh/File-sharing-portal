<?php include 'inc/header.php';?>
				
<div class="women_main">
	<!-- start content -->
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Update Your Profile With Your Personal Information</h2>
					</div>

					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Name  		   = mysqli_real_escape_string($db->link, $_POST['Name']);
        $Department    = mysqli_real_escape_string($db->link, $_POST['Department']);
        $University    = mysqli_real_escape_string($db->link, $_POST['University']);
        $Designation   = mysqli_real_escape_string($db->link, $_POST['Designation']);
        $Website 	   = mysqli_real_escape_string($db->link, $_POST['Website']);

	    $permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['Picture']['name'];
	    $file_size = $_FILES['Picture']['size'];
	    $file_temp = $_FILES['Picture']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "files/".$unique_image;

		if($Name == "" || $Department == "" || $University == "" || $Designation == "" || $Website == ""){
		    echo "<span class='error'>Field must not be empty.!!</span>";
		}elseif ($file_size >1048567) {
		     echo "<span class='error'>Image Size should be less then 1MB!</span>";
		} elseif (in_array($file_ext, $permited) === false) {
		     echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
		} else{

		    move_uploaded_file($file_temp, $uploaded_image);
		    $query = "INSERT INTO tbl_faculty(Name, Department, University, Designation, Website, Picture) VALUES('$Name', '$Department', '$University', '$Designation', '$Website', '$uploaded_image')";
		    $inserted_rows = $db->insert($query);
		    if ($inserted_rows) {
		     echo "<span class='success'>Your profile is updated Successfully.!!</span>";
		    }else {
		     echo "<span class='error'>Profile can not be updated !!</span>";
		    }
	}
}
   ?>
				<form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="Name" placeholder="Enter Your name">
						</div>
					</div>

					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Department</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="Department" placeholder="Enter your Department">
						</div>
					</div>

					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">University</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="University" placeholder="Enter your University">
						</div>
					</div>

					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Designation</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="Designation" placeholder="Enter your Designation">
						</div>
					</div>

					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Website</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="Website" placeholder="For exp: https://www.facebook.com/someone">
						</div>
					</div>

					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Picture</label>
						<div class="col-sm-8">
							<input type="file" class="form-control1" id="focusedinput" name="Picture">
						</div>
					</div>
					<button type="submit" class="btn btn-default">Submit</button>
				</form>
								</div>
						</div>
					</div>
				</div>

	<!-- end content -->
<?php include 'inc/footer.php';?>