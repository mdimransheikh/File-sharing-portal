<?php include 'inc/header.php';?>

<?php 
    if(!isset($_GET['Books_Id']) || $_GET['Books_Id'] == NULL){
        header("Location:postlist.php");
    }else{
        $Books_Id = $_GET['Books_Id'];
    }
?>
				
<div class="women_main">
	<div class="grids">

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

        $target = "files/";
		$target = $target . basename( $_FILES['Book_File']['name']);
		$Book_File=basename( $_FILES['Book_File']['name']);

            if(empty($Books_Id) || empty($Department) || empty($Year) || empty($Semister) || empty($Books_Type) || empty($Books_Name) || empty($Publishers) || empty($Book_File)){
                echo "<span class='error'>Field must not be empty..!!</span>";
            } else{
            	move_uploaded_file($_FILES['Book_File']['tmp_name'], $target);
                $query = "UPDATE tbl_books 
                			SET
                			Department    = '$Department',
			                Year  = '$Year',
			                Semister   = '$Semister',
			                Books_Type = '$Books_Type',
			                Books_Name   = '$Books_Name',
			                Publishers = '$Publishers',
			                Book_File = '$Book_File'
			                WHERE Books_Id = '$Books_Id'";
                $result = $db->update($query);
                if($result != false){
                    echo "<span class='success'>Book is updated successfully.!!</span>";
                }else{
                    echo "<span class='error'>Book is not updated.!!</span>";
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
				            $query = "SELECT * FROM tbl_books WHERE Books_Id='$Books_Id'";
				            $getdata = $db->select($query);
				                while($result = $getdata->fetch_assoc()){
				        ?>
									
						<form class="form-horizontal" method="post" action="" enctype="multipart/form-data">

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Books ID</label>
								<div class="col-sm-8">
									<input type="text" value="<?php echo $result['Books_Id'];?>" class="form-control1" id="focusedinput" name="Books_Id">
								</div>
							</div>

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
								<label for="focusedinput" class="col-sm-2 control-label">Books Type</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" id="focusedinput" value="<?php echo $result['Books_Type'];?>" name="Books_Type" placeholder="Give the books type">
								</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Books Name/Comments</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" id="focusedinput" value="<?php echo $result['Books_Name'];?>" name="Books_Name" placeholder="Give the name of the books or comments">
								</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">Published by</label>
								<div class="col-sm-8">
									<input type="text" class="form-control1" id="focusedinput" value="<?php echo $result['Publishers'];?>" name="Publishers" placeholder="Give the name of the publisher">
								</div>
							</div>

							<div class="form-group">
								<label for="focusedinput" class="col-sm-2 control-label">File Upload</label>
								<div class="col-sm-8">
									<input type="file" class="form-control1" id="focusedinput" name="Book_File" required="">
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