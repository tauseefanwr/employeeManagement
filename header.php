<?php include_once 'connection.php';

?>
<!DOCTYPE html>
<html lang="en" 
<?php 
//session_start();
	if(isset($_SESSION['logged_in'])&& $_SESSION['logged_in']==1) {
		echo 'class="app"';
	}else{
		echo 'class="bg-dark"';
	}
?>>
<head>
<style type="text/css">
.error{
color:red;
}
</style>
  <meta charset="utf-8" />
  <title>Angalo Employee | Web Application</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" /> 
  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="css/animate.css" type="text/css" />
  <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="css/font.css" type="text/css" />
  <link rel="stylesheet" href="css/app.css" type="text/css" />
  <link rel="stylesheet" href="js/datepicker/datepicker.css" type="text/css" />
  <!--[if lt IE 9]>
    <script src="js/ie/html5shiv.js"></script>
    <script src="js/ie/respond.min.js"></script>
    <script src="js/ie/excanvas.js"></script>
  <![endif]-->
</head>
