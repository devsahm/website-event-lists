<?php

{

        $sql="SELECT id FROM logins WHERE username='".mysqli_real_escape_string($conn, $_POST['username'])."' LIMIT 1 ";
        $result=mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) != 1) {
        	echo "invalid username";
        }else{

        	$sql="UPDATE logins SET password='".md5(md5(mysqli_insert_id($conn)).$_POST['password'])."' WHERE id= 1 LIMIT 1 ";
        	if (mysqli_query($conn, $sql)) {
        		echo "successfully";
        	}else{
        		echo "error".mysqli_error($conn);
        	}
        }
       
        }






{

     










                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
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
                // if everything is ok, try to upload file
                } else {

                        if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                           echo "Sorry, there was an error uploading your file.";

                           } else {
                       
                             $imagename= basename( $_FILES["fileToUpload"]["name"]);
                             $heading= mysqli_real_escape_string($conn, $_POST['heading']);
                             $detail= mysqli_real_escape_string($conn, $_POST['detail']);
                                $sql="SELECT id FROM display WHERE title='$heading' OR image='$imagename' LIMIT 1";
                                $result=mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0) {
                                    echo " already exist in the database";
                                }else{

                                    $sql="INSERT INTO display (image, title, details) 
                                    VALUES ('$imagename', '$heading', '$detail')";

                                    if(mysqli_query($conn, $sql)){
                                        echo "you have successfully created an input";
                                    }else{
                                        echo"there was an error".mysqli_error($conn);
                                    }
                                }






                    }

                   
                }



        


?>