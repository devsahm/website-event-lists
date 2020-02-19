<?php
session_start();
include'connection.php';
if (isset($_POST['submit']) && $_POST['submit'] == "Delete") {
	var_dump($_POST);
	$id = $_POST['id'];
$checkarticle =  mysqli_query($conn, "SELECT * FROM display WHERE id = $id");
	if (mysqli_num_rows($checkarticle) != 1) {
		$_SESSION['failedmsg'] = "<p class=alert alert-danger> Article does not exist</p>";
	} else{
	$imagerow = mysqli_fetch_array($checkarticle);
	$image = $imagerow['image']; //delete the article
	$deletearticle = mysqli_query($conn, "DELETE FROM display WHERE id= $id ");
	if (mysqli_num_rows($deletearticle) == 0) {
	$target_dir = "img/uploads/";
    $target_file = $target_dir . $image;
	unlink($target_file);
	$_SESSION['successmsg'] = "<p class='alert alert-success'> Article was successfully deleted</p>";
	header("Location: viewuploads.php");
	exit();
	} else {
	$_SESSION['failedmsg'] = "<p class='alert alert-warning'> Article was not deleted</p>";
	header("Location: tables.php");
	}

	}
	exit();
}
