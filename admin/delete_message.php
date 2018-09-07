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
    if(!isset($_GET['delMessage_Id']) || $_GET['delMessage_Id'] == NULL){
        echo "<script>window.location = 'manage_student_message.php';</script>";
    }else {
        $delMessage_Id = $_GET['delMessage_Id'];
        $delquery = "delete from tbl_message where id='$delMessage_Id'";
        $delData = $db->delete($delquery);
        if($delData){
        	echo "<script>alert('Message is deleted successfully !!');</script>";
        	echo "<script>window.location = 'manage_student_message.php';</script>";
        } else{
        	echo "<script>alert('Message is not deleted..!!');</script>";
        	echo "<script>window.location = 'manage_student_message.php';</script>";
        }
    }
?>