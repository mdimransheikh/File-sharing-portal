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
    if(!isset($_GET['delStudent_Id']) || $_GET['delStudent_Id'] == NULL){
        echo "<script>window.location = 'report_view_books.php';</script>";
    }else {
        $delStudent_Id = $_GET['delStudent_Id'];
        $delquery = "delete from student where Id='$delStudent_Id'";
        $delData = $db->delete($delquery);
        if($delData){
        	echo "<script>alert('Student is deleted successfully !!');</script>";
        	echo "<script>window.location = 'manage_view_student.php';</script>";
        } else{
        	echo "<script>alert('Something went wrong..!!');</script>";
        	echo "<script>window.location = 'manage_view_student.php';</script>";
        }
    }
?>