
<?php
session_start();
include'connection.php';
if (array_key_exists("id", $_COOKIE)) {
  $_SESSION['id']=$_COOKIE['id'];
}
if (array_key_exists("id", $_SESSION)) {
  //echo "<p>Logged In!<a href='logout.php'>Log out</a></p>";
}else{
  header("Location:admin.php");
}

$error4="";
//file upload;
if (array_key_exists("submitall", $_POST)) {

  if (!$_POST['date']) {
    $error4.="the date is required <br>";
  }

  if (!$_POST['eventheading']) {
    $error4.= " event details is required <br>";
  }

   if (!$_POST['address']) {
    $error4.= " address is required <br>";
  }

   if (!$_POST['content']) {
    $error4.= "Fill in the event brief <br>";
  }


   /*if (!$_FILES['fileToUpload']['name']) {
  $error1="kindly upload image";
    }*/
    if ($error4 !="") {
      $error4="<b>There was an error:</b> " .$error4;
    }else{
      //check if content and heading already exist

      $eventheading= mysqli_real_escape_string($conn, $_POST['eventheading']);
      $content= mysqli_real_escape_string($conn, $_POST['content']);
      $sql="SELECT id FROM events WHERE title='$eventheading' OR content='$content'";
      $check= mysqli_query($conn, $sql);

      if (mysqli_num_rows($check) > 0) {
        $error4="Event heading or event brief already exist";
        }else{


          if ($_FILES['fileToUpload']['name']) {
                        
                 //image uploading started
                $target_dir = "img/events/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                
                // Check if image file already exists
                if (file_exists($target_file)) {
                    $error4="The image already exist.";
                    $uploadOk = 0;
                }
                // Check the file size
                if ($_FILES["fileToUpload"]["size"] > 2000000) {
                    $error4="Sorry, your file is too large.<br>";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $error4="Sorry, only JPG, JPEG & PNG files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                     $error4="<b>There was an error while uploading image:</b> ". $error4;
                // if everything is ok, try to upload file do next
                } else {

                    //check if file is uploaded
                      if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
                           $error4="There was an error while uploading image ".mysqli_error($conn);
                      }else{

                               $imagename= basename( $_FILES["fileToUpload"]["name"]);
                               $sql="SELECT id FROM display WHERE image='$imagename' LIMIT 1";
                                $resultimage=mysqli_query($conn, $sql);
                                if (mysqli_num_rows($resultimage) > 0) {
                                    $error4=" Image already exist in the database";
                                }else{
                                  $date= mysqli_real_escape_string($conn, $_POST['date']);
                                   $address= mysqli_real_escape_string($conn, $_POST['address']);
                                   $sql="INSERT INTO events (`date`, `title`, `address`, `content`, `image`)
                                   VALUES('$date', '$eventheading', '$address', '$content', '$imagename')";

                                       if (mysqli_query($conn, $sql)) {
                                         $success="you have successfully added an event";
                                       }else{
                                        $error4="Something went wrong, try again letter ". mysqli_error($conn);
                                       }

                                }

                              }

                          }

                    }else{
                                   
                                  
                                   $date= mysqli_real_escape_string($conn, $_POST['date']);
                                   $address= mysqli_real_escape_string($conn, $_POST['address']);
                                   $sql="INSERT INTO events (`date`, `title`, `address`, `content`)
                                  VALUES('$date', '$eventheading', '$address', '$content')";

                                       if (mysqli_query($conn, $sql)) {
                                         $success="you have successfully added an event";
                                       }else{
                                        $error4="Something went wrong, try again letter ". mysqli_error($conn);
                                       }
                        }


              }
            }
          }



        

  

         




/*
      $sql="SELECT id FROM display WHERE title='$heading' OR details='$detail' LIMIT 1";
      $resultheading= mysqli_query($conn, $sql);
      if (mysqli_num_rows($resultheading) > 0) {
        $error1= "<b>Title/news details already exist</b>";
      }else{

                //image uploading started
                $target_dir = "img/uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                
                // Check if image file already exists
                if (file_exists($target_file)) {
                    $error1="The image already exist.";
                    $uploadOk = 0;
                }
                // Check the file size
                if ($_FILES["fileToUpload"]["size"] > 2000000) {
                    $error1="Sorry, your file is too large.<br>";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $error1="Sorry, only JPG, JPEG & PNG files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                     $error1="<b>There was an error while uploading image:</b> ". $error1;
                // if everything is ok, try to upload file do next
                } else {
                        //check if file is uploaded
                      if (!move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
                           $error1="There was an error while uploading image";
                      }else{

                            $imagename= basename( $_FILES["fileToUpload"]["name"]);
                            $sql="SELECT id FROM display WHERE image='$imagename' LIMIT 1";
                                $resultimage=mysqli_query($conn, $sql);
                                if (mysqli_num_rows($resultimage) > 0) {
                                    $error1=" Image already exist in the database";
                                }else{

                                     $sql="INSERT INTO display (image, title, details) 
                                    VALUES ('$imagename', '$heading', '$detail')";

                                    if(mysqli_query($conn, $sql)){
                                      $success="<b>You have successfully created an input</b>";
                                    }else{
                                      $error1="Error occurred during submission". mysqli_error($conn);
                                    }
                                 

                                }

                          }

                    }

             }


        }

}*/
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>POSON Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/colorpicker.css" />
<link rel="stylesheet" href="css/datepicker.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link rel="stylesheet" href="css/bootstrap-wysihtml5.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--top-Header-menu-->
<?php include'topheader.php';?>


<!--sidebar-menu-->
<?php include'sidebar.php';?>
<!--close-left-menu-stats-sidebar-->

<div id="content">



<div id="content-header">
  <div id="breadcrumb"> <a href="admin.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="uploadnews.php" class="tip-bottom">Events Upload</a> </div>
  <h1>Conferences/ Events</h1>
</div>
<div class="container-fluid">
  <hr>
    <div class="row-fluid">
      <div class="span12">
 
<div id="error4">
<?php 

if ($error4 !="") {
    echo'<div class="alert alert-danger" role="alert">'.$error4.'</div>';
}
if (isset($success)) {
echo'<div class="alert alert-success" role="alert">'.$success.'</div>';
}

 ?>
     
 </div>


     
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-upload-alt"></i> </span>
            <h5>Fill in appropriately</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
             <div class="control-group">
                <label class="control-label">Date</label>
                <div class="controls">
                  <input type="date" name="date" placeholder="dd/mm/yyyy" required="required"><br>
                   
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Event Title</label>
                <div class="controls">
                  <input type="text" name="eventheading" required="required"><br>
                   
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Address</label>
                <div class="controls">
                  <input type="text" name="address" required="required"><br>
                   
                </div>
              </div>

               <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="fileToUpload" value="browse image"><span>image upload is optional</span>

                </div>
              </div>
              
          </div>
        </div>
      </div>
    </div>
    

  <div class="row-fluid">
    <div class="widget-box">
      <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
        <h5>Event brief</h5>
      </div>
      <div class="widget-content">
        <div class="control-group">
            <div class="controls">
              <textarea class="textarea_editor span12" rows="6" placeholder="Enter text ..." name="content"></textarea>
            </div>
            <div class="form-actions" style="text-align: center;">
                <input type="submit" value="submit" name="submitall" class="btn btn-success">
              </div>
          </form>
          
        </div>
      </div>
    </div>
  </div>
</div></div>
<!--Footer-part-->
<?php include'adminfooter.php';?>
<!--end-Footer-part--> 
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-colorpicker.js"></script> 
<script src="js/bootstrap-datepicker.js"></script> 
<script src="js/jquery.toggle.buttons.js"></script> 
<script src="js/masked.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.form_common.js"></script> 
<script src="js/wysihtml5-0.3.0.js"></script> 
<script src="js/jquery.peity.min.js"></script> 
<script src="js/bootstrap-wysihtml5.js"></script> 
<script>
	$('.textarea_editor').wysihtml5();
</script>
</body>
</html>
