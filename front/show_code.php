<?php 
session_start();
include_once 'inc/vcode.php';
$_SESSION['vcode']=vcode();
?>