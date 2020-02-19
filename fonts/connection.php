<?php
$servername="localhost";
$username="posononl_oga";
$password="Damisa@2018";
$mydb="posononl_Db";
$conn=mysqli_connect($servername, $username, $password, $mydb);
if (!$conn) {
die("connection error".mysqli_connect_error());
}
$error="";
?>