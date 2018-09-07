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
    if(!isset($_GET['Notice_Id']) || $_GET['Notice_Id'] == NULL){
        echo "<script>window.location = 'report_view_report.php';</script>";
    }else {
        $Notice_Id = $_GET['Notice_Id'];
        $query = "select * from tbl_notice where Notice_Id='$Notice_Id'";
        $getdata = $db->select($query);
        if($getdata){
        	while($delimg = $getdata->fetch_assoc()){
        		$dellink = "notice_files/".$delimg['Notice_File'];
        		unlink($dellink);
        	}
        }

        $delquery = "delete from tbl_notice where Notice_Id='$Notice_Id'";
        $delData = $db->delete($delquery);
        if($delData){
        	echo "<script>alert('Notice is deleted successfully !!');</script>";
        	echo "<script>window.location = 'report_view_notice.php';</script>";
        } else{
        	echo "<script>alert('Notice is not deleted..!!');</script>";
        	echo "<script>window.location = 'report_view_notice.php';</script>";
        }
    }
?>