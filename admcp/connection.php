<?php
$servername="localhost";
$username="root";
$password="";
$mydb="poson";
$conn=mysqli_connect($servername, $username, $password, $mydb);
if (!$conn) {
die("connection error".mysqli_connect_error());
}
$error="";
?>