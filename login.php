<?php
session_start();
$_SESSION['username'] = "user";
$user = $_SESSION['username'];
echo "login as ".$user;


?>