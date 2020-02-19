<?php
session_start();
if (isset($_GET['id'])) {
	
	$_SESSION['id']=$_GET['id'];
	header('Location:newsdetails.php');

}


if (isset($_SESSION['id'])) {
	$id1=$_SESSION['id'];
	
	$sql=mysqli_query($conn, "SELECT * FROM display WHERE id=$id1 ");

	$row=mysqli_fetch_array($sql);
}
?>