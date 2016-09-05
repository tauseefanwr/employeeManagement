<?php
session_start();
$_SESSION = array();
$_SESSION['sid'] = array();
$_SESSION['logged_in'] = array();
$_SESSION['email'] = array();
session_destroy();
header('Location: index.php');