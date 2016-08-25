<?php
session_start();
if(isset($_SESSION['sid']) ){
	if($_SESSION['sid']!=session_id())
		header('Location: index.php');
}
include 'header.php';

if(isset($_REQUEST['emp_id'])){
	$emp_id = $_REQUEST['emp_id'];
	$sql = "delete from employee where emp_id = ".$emp_id." ";
	$msg = "employee has been delete successfully";
}
if ($conn->query($sql) === TRUE){
	header('Location: employeeList.php?msg='.$msg.'');
}

?>