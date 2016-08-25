<?php
session_start();
if(isset($_SESSION['sid']) ){
	if($_SESSION['sid']!=session_id())
		header('Location: index.php');
}
include 'header.php';
if(isset($_POST['emp_first_name']))
$f_name = $_POST['emp_first_name'];
if(isset($_POST['emp_last_name']))
$l_name = $_POST['emp_last_name'];
if(isset($_POST['emp_email']))
$emp_email = $_POST['emp_email'];
if(isset($_POST['emp_dob']))
$emp_dob = $_POST['emp_dob'];
if(isset($_POST['emp_job_title']))
$emp_job = $_POST['emp_job_title'];
if(isset($_POST['emp_salary']))
$emp_salary = $_POST['emp_salary'];
if(isset($_POST['emp_id'])){
	$emp_id = $_POST['emp_id'];
	$sql = "update employee set emp_first_name='".$f_name."', emp_last_name='".$l_name."', emp_dob='".$emp_dob."',emp_email='".$emp_email."',job_title='".$emp_job."',salary=".$emp_salary." where emp_id = ".$emp_id." ";
	$msg = "employee has been updated successfully";
	$location = "employeeList";
}else{
	$sql = "insert into employee (emp_first_name, emp_last_name, emp_dob,emp_email,job_title,salary)
		VALUES ('$f_name', '$l_name','$emp_dob','$emp_email','$emp_job',$emp_salary)";
	$msg = "employee has been added successfully";
	$location = "add";
}
if ($conn->query($sql) === TRUE){
	header('Location: '.$location.'.php?msg='.$msg.'');
}else{
	header('Location: '.$location.'.php?msg=something went wrong');
}

?>