<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php $db = new Database(); ?>

<?php 
    if(!isset($_GET['Books_Id']) || $_GET['Books_Id'] == NULL){
        echo "<script>window.location = 'report_view_books.php';</script>";
    }else{
        $Books_Id = $_GET['Books_Id'];
        $query = "SELECT * FROM tbl_books WHERE Books_Id='$Books_Id'";
		$result = $db->select($query);
		if($result != false) {
			$value = mysqli_fetch_array($result);
			$filename = "../admin/book_files/".$value['Book_File'];

			header("Content-type: application/pdf");
			readfile($filename);
			exit;
		}
    }

?>