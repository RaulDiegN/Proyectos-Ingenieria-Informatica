<?php  
require_once __DIR__ . '/include/config.php';
session_destroy();
unset($_SESSION);
header("Location:home.php");
?> 