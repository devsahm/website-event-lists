<?php
session_start();
include'connection.php';
/*if(isset($_SESSION['id'])) {
    echo $_SESSION['id'];
}else{
    header("Location:admin.php");
}*/

if (array_key_exists("id", $_COOKIE)) {
	$_SESSION['id']=$_COOKIE['id'];
}
if (array_key_exists("id", $_SESSION)) {
	echo "<p>Logged In!<a href='logout.php'>Log out</a></p>";
}else{
	header("Location:admin.php");
}

 $error1="";
//file upload;
if (array_key_exists("submitall", $_POST)) {

	if (!$_POST['heading']) {
		$error1="the title is reqired";
	}

	if (!$_POST['detail']) {
		$error1= " details this is required";
	}

   if (!$_FILES['fileToUpload']['name']) {
	$error1="upload image";
    }
    if ($error1 !="") {
    	echo $error1;
    }else{
    	//check if title and details already exist
        $detail= mysqli_real_escape_string($conn, $_POST['detail']);
    	$heading= mysqli_real_escape_string($conn, $_POST['heading']);
    	$sql="SELECT id FROM display WHERE title='$heading' OR details='$detail' LIMIT 1";
    	$resultheading= mysqli_query($conn, $sql);
    	if (mysqli_num_rows($resultheading) > 0) {
    		echo "title/details already exist";
    	}else{

                //image uploading started
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                
                // Check if image file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check the file size
                if ($_FILES["fileToUpload"]["size"] > 1000000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file do next
                } else {
                        //check if file is uploaded
                      if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
                           echo "there was an error while uploading";
                      }else{

                            $imagename= basename( $_FILES["fileToUpload"]["name"]);
                            $sql="SELECT id FROM display WHERE image='$imagename' LIMIT 1";
                                $resultimage=mysqli_query($conn, $sql);
                                if (mysqli_num_rows($resultimage) > 0) {
                                    echo " image already exist in the database";
                                }else{

                                     $sql="INSERT INTO display (image, title, details) 
                                    VALUES ('$imagename', '$heading', '$detail')";

                                    if(mysqli_query($conn, $sql)){
                                        echo "you have successfully created an input";
                                    }else{
                                    	echo "error occurred during submition". mysqli_error($conn);
                                    }
                                 

                                }

                          }

                    }

    	       }


        }

}
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<!--upload image-->
<form method="post" enctype="multipart/form-data">
<label><h3>Upload Image</h3></label>
<input type="file" name="fileToUpload">
<label><h3>Conference heading</h3></label>
<input type="text" name="heading">
<label><h3>Conference article</h3></label>
	<textarea name="detail"></textarea>
	<br>
<input type="submit" name="submitall" value="submit">

</form>
</body>
</html>