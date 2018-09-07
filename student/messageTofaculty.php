<?php include 'inc/header.php';?>
				
<div class="women_main">
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Student Panel -  Message To Faculty</h2>
					</div>
					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    	$username = Session::get('username'); 
        $message  = mysqli_real_escape_string($db->link, $_POST['message']);

        $file_name = $_FILES['message_file']['name'];
	    $file_temp = $_FILES['message_file']['tmp_name'];
	    $folder    = "message_files/";

    	move_uploaded_file($file_temp, $folder.$file_name);
	    $query = "INSERT INTO tbl_message(username, message, message_file) VALUES('$username', '$message', '$file_name')";
	    $inserted_rows = $db->insert($query);
	    if ($inserted_rows != false) {
	     echo "<span class='success'>Your message is sent successfully.!!</span>";
	    }else {
	     echo "<span class='error'>Something went wrong !!</span>";
	    }
	}
?>
				<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-8">
							<textarea name="message" cols="90" rows="10" required=""></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">File</label>
						<div class="col-sm-8">
							<input type="file" name="message_file" class="form-control1" id="focusedinput">
						</div>
					</div>
					<button style="margin-left: 190px;" type="submit" class="btn btn-default">Send Message</button>
				</form>
					</div>
				</div>
<?php include 'inc/footer.php';?>