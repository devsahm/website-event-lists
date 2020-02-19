<?php
session_start();
include'connection.php';

if (array_key_exists("submit", $_POST)) {
    
    if (!$_POST['username']) {
        $error="username must not be empty";
    }

    if (!$_POST['password']) {
        $error="password is required";
    }

    if ($error !="") {
        echo $error;
    }else{
            $sql="SELECT id FROM logins WHERE username='".mysqli_real_escape_string($conn, $_POST['username'])."' ";
            $username = mysqli_query($conn, $sql);
            if ($username) {
                if (mysqli_num_rows($username) > 0 ) {
                    $usernamerow = mysqli_fetch_array($username);
                    $id = $usernamerow['id'];
                    $hashedpassword= md5(md5($usernamerow['id']).$_POST['password']);
                    $sql= "SELECT * FROM logins WHERE username='".mysqli_real_escape_string($conn, $_POST['username'])."' AND password='". $hashedpassword."' ";
                    $loginsql=mysqli_query($conn, $sql);
                    if ($loginsql) {
                        if (mysqli_num_rows($loginsql) > 0) {
                            $_SESSION['id']=$usernamerow['id'];
                            setcookie("id", $usernamerow['id'], time() + 60*60);
                            header("Location:admin.php");
                        } else {
                            $error="Password and Username does not match";
                        }
                    } else {echo "error".mysqli_error($conn);}
                } else {
                    $error="User not found";
                }
            } else {echo mysqli_error($conn);}
    }
}
  
?>

<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>POSON Admin</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/matrix-login.css" />
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">
        <div id="error">
<?php 

if ($error !="") {
    echo'<div class="alert alert-danger" role="alert"><b>'.$error.'</b></div>';
}
 ?>
     
 </div>            
            <form id="loginform" class="form-vertical" method="post">
				 <div class="control-group normal_text"> <h3><img src="img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text" placeholder="Username" name="username" required="required" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" placeholder="Password" name="password" required="required"/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <!--<span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Lost password?</a></span>-->
                    <span class="pull-right"><input type="submit" value="Login" name="submit" class="btn btn-success"></span>
                </div>
            </form>
            <!--<form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a password.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><a class="btn btn-info"/>Reecover</a></span>
                </div>
            </form>
        </div>-->
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
