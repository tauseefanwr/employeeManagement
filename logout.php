<?php
$_SESSION = array();
$_SESSION['sid']= array();
session_destroy();
header('Location: index.php');