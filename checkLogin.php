<?php
if(isset($_SESSION['sid']) ){
	if($_SESSION['sid']!=session_id() && $_SESSION['logged_in']!='1'){
		header('Location: index.php');
	}
}else{
	header('Location: index.php');
}