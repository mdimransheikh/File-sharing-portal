<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php $db = new Database(); ?>

<?php 
    if(!isset($_GET['id']) || $_GET['id'] == NULL){
        echo "<script>window.location = 'discussion.php';</script>";
    }else{
        $id = $_GET['id'];
        $query = "SELECT * FROM tbl_sdiscussion WHERE id='$id'";
		$result = $db->select($query);
		if($result != false) {
			$value = mysqli_fetch_array($result);
			$filename = "discussion_files/".$value['File'];

			// Let the browser know that a PDF file is coming.
			header("Content-type: application/pdf");
			header("Content-Length: " . filesize($filename));

			// Send the file to the browser.
			readfile($filename);
			exit;
		}
    }

?>