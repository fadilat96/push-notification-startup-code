<?php
require 'Connection.php';
$token = $_GET['token'];

$query = "INSERT INTO users(Token) Values ('$token') ON DUPLICATE KEY UPDATE Token = '$token'; ";
mysqli_query($con,$query);

mysqli_close($con);







?>
