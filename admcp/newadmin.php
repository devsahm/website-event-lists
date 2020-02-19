
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
if (array_key_exists("submitadmin", $_POST)) {

  if (!$_POST['username']) {
    $error4.="username is required <br>";
  }

  if (!$_POST['password']) {
    $error4.= " Password is required <br>";
  }

    if ($error4 !="") {
      $error4="<b>There was an error:</b> " .$error4;
    }else{
      //check if content and heading already exist
      $username= mysqli_real_escape_string($conn, $_POST['username']);
      $sql="SELECT id FROM logins WHERE username= '".$username."' ";
      $movequery= mysqli_query($conn, $sql);

        if (mysqli_num_rows($movequery) > 0) {
          $error4="Username already in the database";
        }else{
              
                              $sql1="SELECT id FROM logins ORDER BY id DESC LIMIT 1";
                             $runquery=mysqli_query($conn, $sql1);
                            $rows= mysqli_fetch_array($runquery);
                            $id=$rows['id'] + 1;
                              $hashedpassword= md5(md5($id).$_POST['password']);

                              if ($hashedpassword) {
                               $sql="INSERT INTO logins (username, password) 
                                VALUES ('$username', '$hashedpassword')";

                                     if (mysqli_query($conn, $sql)) {
                                       $success="Admin Successfully Added";
                                     }else{

                                      $error4="error occur while trying to add an admin". mysqli_error($conn);
                                     }

                              }


                         }



                  }

      
            }

      

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
  <div id="breadcrumb"> <a href="admin.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="newadmin.php" class="tip-bottom">Add Admin</a> </div>
  <h1>Admin Creation</h1>
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
            <h5>Fill to Create an Admin</h5>
          </div>
          <div class="widget-content nopadding">

            <form class="form-horizontal" method="post" enctype="multipart/form-data">
             <div class="control-group">
                <label class="control-label">Username</label>
                <div class="controls">
                  <input type="text" name="username" placeholder="Username" required="required"><br>
                   
                </div>
              </div>

              <div class="control-group">
                <label class="control-label">Password</label>
                <div class="controls">
                  <input type="password" name="password" required="required"><br>
                   
                </div>
              </div>


              <div class="form-actions" style="text-align: center;">
                <input type="submit" value="submit" name="submitadmin" class="btn btn-success">
              </div>
              </form>

          </div>
        </div>
      </div>
    </div>
    

  <div class="row-fluid">
  
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
