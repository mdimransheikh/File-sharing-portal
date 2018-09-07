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
						<h2 style="text-align: center;">Registration From Here</h2>
					</div>

					<div class="panel panel-widget forms-panel">
						<div class="progressbar-heading general-heading">
						</div>
						<div class="forms">
								<h3 class="title1"></h3>
								<div class="form-three widget-shadow">
<?php 
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$roll_num   = $fm->validation($_POST['roll_num']);
		$Name       = $fm->validation($_POST['Name']);
        $Uname      = $fm->validation($_POST['Uname']);
        $password   = $fm->validation($_POST['Password']);
        $Repass     = $fm->validation($_POST['Repass']);
        $Email      = $fm->validation($_POST['Email']);
        $Subject    = $fm->validation($_POST['Subject']);
        $University = $fm->validation($_POST['University']);

		$roll_num   = mysqli_real_escape_string($db->link, $roll_num);
		$Name       = mysqli_real_escape_string($db->link, $Name);
        $Uname      = mysqli_real_escape_string($db->link, $Uname);
        $password   = mysqli_real_escape_string($db->link, $password);
        $Repass     = mysqli_real_escape_string($db->link, $Repass);
        $Email      = mysqli_real_escape_string($db->link, $Email);
        $Subject    = mysqli_real_escape_string($db->link, $Subject);
        $University = mysqli_real_escape_string($db->link, $University);

        if(empty($roll_num) || empty($Name) || empty($Uname) || empty($password) || empty($Repass) || empty($Email) || empty($Subject) || empty($University)){
                echo "<span class='error'>Field must not be empty..!!</span>";
        } else{
            if ($password !== $Repass) {
                echo "<span style='color:red;font-size:18px;'>Password is not matched !!</span>";
            }else{
            $query = "INSERT INTO student(roll_num,Name,Uname,password,Repass,Email,Subject,University) VALUES('$roll_num','$Name','$Uname','$password','$Repass','$Email','$Subject','$University')";
            $result = $db->insert($query);
            if($result != false) {
                echo "<span style='color:green;font-size:18px;'>You have successfully registered !!</span>";
                echo "<script>window.location = 'login.php';</script>";
            } else{
                echo "<span style='color:red;font-size:18px;'>Something went wrong !!</span>";
            }
            }
        }
    }
?>
				<form class="form-horizontal" method="POST" action="">
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Roll No.</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="roll_num" placeholder="Please enter your roll number">
						</div>
					</div>
					<div class="form-group">
						<label for="focusedinput" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control1" id="focusedinput" name="Name" placeholder="Please enter your name">
						</div>
					</div>
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
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Confirm Password</label>
                        <div class="col-sm-8">
                            <input type="password" class="form-control1" id="focusedinput" name="Repass" placeholder="Please enter your password again">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-8">
                            <input type="email" class="form-control1" id="focusedinput" name="Email" placeholder="Please enter your email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="selector1" class="col-sm-2 control-label">Department</label>
                        <div class="col-sm-8"><select name="Subject" id="selector1" class="form-control1">
                            <option>Select Department</option>
                            <option value="cse">CSE</option>
                            <option value="pme">PME</option>
                            <option value="ipe">IPE</option>
                            <option value="bme">BME</option>
                            <option value="acc">ACC</option>
                        </select></div>
                    </div>
                    <div class="form-group">
                        <label for="focusedinput" class="col-sm-2 control-label">University</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control1" id="focusedinput" name="University" placeholder="Please enter your University">
                        </div>
                    </div>
					<button style="margin-left: 180px" type="submit" class="btn btn-default">Registration</button>
				</form>
                <h3>ALready have an account? <a href="login.php">Login Here</a></h3>
						    </div>
						</div>
					</div>
				</div>
<?php include 'inc/footer.php';?>