<?php include 'inc/header.php';?>

<script>
$(document).ready(function() {
	  
	  pageScroll();
	  $("#contain").mouseover(function() {
	    clearTimeout(my_time);
	  }).mouseout(function() {
	    pageScroll();
	  });
	  
	  getWidthHeader('table_fixed','table_scroll');
	  
	});

	var my_time;
	function pageScroll() {
		var objDiv = document.getElementById("contain");
	  objDiv.scrollTop = objDiv.scrollTop + 1;  
	  if ((objDiv.scrollTop + 100) == objDiv.scrollHeight) {
	    objDiv.scrollTop = 0;
	  }
	  my_time = setTimeout('pageScroll()', 25);
	}

	function getWidthHeader(id_header, id_scroll) {
	  var colCount = 0;
	  $('#' + id_scroll + ' tr:nth-child(1) td').each(function () {
	    if ($(this).attr('colspan')) {
	      colCount += +$(this).attr('colspan');
	    } else {
	      colCount++;
	    }
	  });
	  
	  for(var i = 1; i <= colCount; i++) {
	    var th_width = $('#' + id_scroll + ' > tbody > tr:first-child > td:nth-child(' + i + ')').width();
	    $('#' + id_header + ' > thead th:nth-child(' + i + ')').css('width',th_width + 'px');
	  }
	}
</script>
				
<div class="women_main">
	<div class="grids">
					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-12">
						<table class="table" border="0" id="table_fixed">
						    <thead class="thead-dark">
						      <tr>      
						        <th style="width: 20%">Published By</th>
						        <th style="width: 40%">Message</th>
						        <th style="width: 20%">File</th>
						        <th style="width: 10%">Time</th>
						      </tr>
						    </thead>
						</table>
						<div id="contain" style="max-height: 300px; overflow-y: scroll;">  
						  	<table border="0" id="table_scroll">
						<?php 
							$query = "select * from tbl_discussion";
							$result = $db->select($query);
							if($result != false){
								while($data = $result->fetch_assoc()){
						?>
						  		<tr>
						  			<td style="width: 20%"><?php echo $data['messageby'];?></td>
						  			<td style="width: 40%"><?php echo $data['Message'];?></td>
						  			<td style="width: 20%">
						  				<?php if ($data['File']) { ?>
						  					<a href="show_discussion.php?id=<?php echo $data['id'];?>" target="_blank"><img src="images/file.png" alt="image" height="50px" width:"50px" /></a>
						  				<?php }else {echo "-----------";} ?>
						  			</td>
						  			<td style="width: 10%"><?php echo $data['pub_date'];?></td>
						  		</tr>
						 <?php } } ?>
							</table>
						</div>
					</div>
				</div>
			</form>

<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Message  = $fm->validation($_POST['Message']);
        $messageby = Session::get('username');
        $Message   = mysqli_real_escape_string($db->link, $Message);

	    $file_name = $_FILES['File']['name'];
	    $file_temp = $_FILES['File']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_file = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_file = "files/".$unique_file;

        $file_name = $_FILES['File']['name'];
	    $file_temp = $_FILES['File']['tmp_name'];
	    $folder    = "discussion_files/";

    	move_uploaded_file($file_temp, $folder.$file_name);
        $query = "INSERT INTO tbl_discussion(messageby, Message, File) 
        		  VALUES('$messageby','$Message','$file_name')";
        $result = $db->insert($query);
        if($result != false){
            //echo "<span class='success'>You messaged to the discussions</span>";
        }else{
            echo "<span class='error'>Something went wrong.!!</span>";
        }
    }
?>

			<form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-sm-12">
						<table>
							<tr style="padding: 5px">
								<td style="width: 20%"><div class="form-group">
										<label for="focusedinput" class="col-sm-10 control-label" style="margin-right: 5px;">Say something:</label>
									</div>
								</td>
								<td style="width: 30%"><div class="form-group">
										<div class="col-sm-8">
											<textarea rows="3" cols="50" name="Message"></textarea>		
										</div>
									</div>
								</td>
								<td style="width: 20%">
									<label for="focusedinput" class="col-sm-12 control-label">Add file:</label>
								</td>
								<td style="width: 30%">
									<div class="form-group">
										<div class="col-sm-8">
											<input type="file" class="form-control1" id="focusedinput" name="File">
										</div>
									</div>
								</td>
								<td><button type="submit" class="btn btn-default">Submit</button></td>
							</tr>
						</table>
					</div>
				</div>
			</form>
								</div>
						</div>
					</div>
				</div>
<?php include 'inc/footer.php';?>