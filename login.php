<?php
session_start();
$_SESSION['username'] = "poster";
$user = $_SESSION['username'];
echo "login as ".$user;


?>