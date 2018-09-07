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
    if(!isset($_GET['Result_Id']) || $_GET['Result_Id'] == NULL){
        echo "<script>window.location = 'report_view_result.php';</script>";
    }else {
        $Result_Id = $_GET['Result_Id'];
        $query = "select * from tbl_result where Result_Id='$Result_Id'";
        $getdata = $db->select($query);
        if($getdata){
        	while($delimg = $getdata->fetch_assoc()){
        		$dellink = "result_files/".$delimg['Result_File'];
        		unlink($dellink);
        	}
        }

        $delquery = "delete from tbl_result where Result_Id='$Result_Id'";
        $delData = $db->delete($delquery);
        if($delData){
        	echo "<script>alert('Result is deleted successfully !!');</script>";
        	echo "<script>window.location = 'report_view_result.php';</script>";
        } else{
        	echo "<script>alert('Result is not deleted..!!');</script>";
        	echo "<script>window.location = 'report_view_result.php';</script>";
        }
    }
?>