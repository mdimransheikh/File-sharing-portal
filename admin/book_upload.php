<?php include 'inc/header.php';?>
				
<div class="women_main">
	<!-- start content -->
	<div class="grids">
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
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Books_Id   = $fm->validation($_POST['Books_Id']);
        $Department = $fm->validation($_POST['Department']);
        $Year 	    = $fm->validation($_POST['Year']);
        $Semister   = $fm->validation($_POST['Semister']);
        $Books_Type = $fm->validation($_POST['Books_Type']);
        $Books_Name = $fm->validation($_POST['Books_Name']);
        $Publishers = $fm->validation($_POST['Publishers']);

        $Books_Id   = mysqli_real_escape_string($db->link,$Books_Id);
        $Department = mysqli_real_escape_string($db->link,$Department);
        $Year 	    = mysqli_real_escape_string($db->link,$Year);
        $Semister   = mysqli_real_escape_string($db->link,$Semister);
        $Books_Type = mysqli_real_escape_string($db->link,$Books_Type);
        $Books_Name = mysqli_real_escape_string($db->link,$Books_Name);
        $Publishers = mysqli_real_escape_string($db->link,$Publishers);

        $file_name = $_FILES['Book_File']['name'];
	    $file_temp = $_FILES['Book_File']['tmp_name'];
	    $folder    = "book_files/";

    	move_uploaded_file($file_temp, $folder.$file_name);
        $query = "INSERT INTO tbl_books(Books_Id, Department, Year, Semister, Books_Type, Books_Name, Publishers, Book_File) VALUES('$Books_Id','$Department','$Year','$Semister','$Books_Type','$Books_Name','$Publishers','$file_name')";
        $result = $db->insert($query);
        if($result != false){
            echo "<span class='success'>New Book is uploaded successfully.!!</span>";
        }else{
            echo "<span class='error'>New Book is not uploaded.!!</span>";
        }
    }
?>						
			<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Books ID</label>
					<div class="col-sm-8">
						<input type="text" class="form-control1" id="focusedinput" name="Books_Id">
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
						<option>Select Year</option>
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
						<option>Select Semister</option>
						<option value="first">FIRST</option>
						<option value="second">SECOND</option>
					</select></div>
				</div>

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Books Type</label>
					<div class="col-sm-8">
						<input type="text" class="form-control1" id="focusedinput" name="Books_Type" placeholder="Give the books type">
					</div>
				</div>

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Books Name/Comments</label>
					<div class="col-sm-8">
						<input type="text" class="form-control1" id="focusedinput" name="Books_Name" placeholder="Give the name of the books or comments">
					</div>
				</div>

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">Published by</label>
					<div class="col-sm-8">
						<input type="text" class="form-control1" id="focusedinput" name="Publishers" placeholder="Give the name of the publisher">
					</div>
				</div>

				<div class="form-group">
					<label for="focusedinput" class="col-sm-2 control-label">File Upload</label>
					<div class="col-sm-8">
						<input type="file" class="form-control1" id="focusedinput" name="Book_File" required="">
					</div>
				</div>
				<button type="submit" class="btn btn-default">Upload</button>
			</form>
							</div>
						</div>
					</div>
				</div>

	<!-- end content -->
<?php include 'inc/footer.php';?>