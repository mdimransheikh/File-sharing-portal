<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php $db = new Database(); ?>

<?php 
    if(!isset($_GET['Result_Id']) || $_GET['Result_Id'] == NULL){
        echo "<script>window.location = 'report_view_books.php';</script>";
    }else{
        $Result_Id = $_GET['Result_Id'];
        $query = "SELECT * FROM tbl_result WHERE Result_Id='$Result_Id'";
		$result = $db->select($query);
		if($result != false) {
			$value = mysqli_fetch_array($result);
			$filename = "../admin/result_files/".$value['Result_File'];

			// Let the browser know that a PDF file is coming.
			header("Content-type: application/pdf");
			header("Content-Length: " . filesize($filename));

			// Send the file to the browser.
			readfile($filename);
			exit;
			}
    }

?>