<?php 
    include 'lib/Session.php';
    Session::checkLogin();
?>

<?php include 'config/config.php'; ?>
<?php include 'lib/Database.php'; ?>
<?php include 'helpers/Format.php'; ?>

<?php
$db = new Database();
$fm = new format();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate"); 
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000"); 
?>

<!DOCTYPE HTML>
<html>
<head>
<title>Login Here</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Gretong Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<script src="js/simpleCart.min.js"> </script>
<script src="js/amcharts.js"></script>  
<script src="js/serial.js"></script>    
<script src="js/light.js"></script> 
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
   <!--pie-chart--->
<script src="js/pie-chart.js" type="text/javascript"></script>
 <script type="text/javascript">

        $(document).ready(function () {
            $('#demo-pie-1').pieChart({
                barColor: '#3bb2d0',
                trackColor: '#eee',
                lineCap: 'round',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-2').pieChart({
                barColor: '#fbb03b',
                trackColor: '#eee',
                lineCap: 'butt',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });

            $('#demo-pie-3').pieChart({
                barColor: '#ed6498',
                trackColor: '#eee',
                lineCap: 'square',
                lineWidth: 8,
                onStep: function (from, to, percent) {
                    $(this.element).find('.pie-value').text(Math.round(percent) + '%');
                }
            });
        });
    </script>
</head> 
<body>
   <div class="page-container">
    <div class="left-content">
       <div class="inner-content">
            <div class="header-section">
                </div>
                <div class="header_bg">
                            <div class="header">
                                <div class="head-t">
                                    <div class="logo">
                                        <a href="index.html"><img src="images/logo.png" class="img-responsive" alt=""> </a>
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                </div>
<div class="women_main">
	<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2 style="text-align: center;">Please Login Here</h2>
					</div>

					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$username = $fm->validation($_POST['Uname']);
		$password = $fm->validation($_POST['Password']);

		$username = mysqli_real_escape_string($db->link, $username);
		$password = mysqli_real_escape_string($db->link, $password);

    	$query = "SELECT * FROM student WHERE Uname='$username' AND Password='$password'";
    	$result = $db->select($query);
    	if($result != false) {
    		$value = mysqli_fetch_array($result);
    		$row = mysqli_num_rows($result);
    		if($row) {
    			Session::set("login", true);
    			Session::set("username", $value['Uname']);
    			echo "<script>window.location = 'index.php';</script>";
    	} else{
    		echo "<span style='color:red;font-size:18px;'>No result found..!!</span>";
    	}
    	} else{
    		echo "<span style='color:red;font-size:18px;'>Username and Password is not matched..!!</span>";
    	}
}
?>
				<form class="form-horizontal" method="post" action="">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Username</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="Uname" placeholder="Please enter your username">
						</div>
					</div>

					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-8">
							<input type="password" class="form-control1" id="focusedinput" name="Password" placeholder="Please enter your password">
						</div>
					</div>
					<button style="margin-left: 180px" type="submit" class="btn btn-default">Login</button>
				</form>
                <h3>Don't have any account? <a href="registration.php">Click here</a></h3>
								</div>
						</div>
					</div>
				</div>
<?php include 'inc/footer.php';?>