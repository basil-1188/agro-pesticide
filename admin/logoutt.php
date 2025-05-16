<?php
session_start();
unset($_SESSION['cut']);
header("location:adminlogin.php")
?>