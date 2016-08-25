<?php 
include 'header.php';
$email = $_REQUEST['email'];
$pass = $_REQUEST['password'];

$sql = 'select * from user where email_id = "'.$email.'"';

$result = $conn->query($sql);
 while($row = $result->fetch_assoc()) {
        if(count($row)){
        	if(md5($pass)==$row['password']){
        		session_start();
        		$_SESSION['sid']=session_id();
        		$_SESSION['logged_in'] = '1';
        		$_SESSION['email'] = $row['email_id'];
        		
        		header('Location: employeeList.php');
        	}else{
        		header('Location: index.php?login=0&error=1');
        	}
        }
    }
?>
