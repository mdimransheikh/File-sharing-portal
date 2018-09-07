<?php 
    include 'lib/Session.php';
    Session::checkSession();
?>

<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>

<?php
$db = new Database();
?>

<?php 
    if(!isset($_GET['delBooks_Id']) || $_GET['delBooks_Id'] == NULL){
        echo "<script>window.location = 'report_view_books.php';</script>";
    }else {
        $delBooks_Id = $_GET['delBooks_Id'];
        $query = "select * from tbl_books where Books_Id='$delBooks_Id'";
        $getdata = $db->select($query);
        if($getdata){
        	while($delimg = $getdata->fetch_assoc()){
        		$dellink = "book_files/".$delimg['Book_File'];
        		unlink($dellink);
        	}
        }

        $delquery = "delete from tbl_books where Books_Id='$delBooks_Id'";
        $delData = $db->delete($delquery);
        if($delData){
        	echo "<script>alert('Book is deleted successfully !!');</script>";
        	echo "<script>window.location = 'report_view_books.php';</script>";
        } else{
        	echo "<script>alert('Book is not deleted..!!');</script>";
        	echo "<script>window.location = 'report_view_books.php';</script>";
        }
    }
?>