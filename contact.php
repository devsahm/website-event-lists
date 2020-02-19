<?php
//Setting of variable
include'connection.php';
$Name= $Email= $Comment="";
$Err="";
if (array_key_exists("submitForm", $_POST)) {
  if (empty($_POST['name'])) {
    $Err="Name is required";
    }
   if (empty($_POST['email'])) {
    $Err="Email is required";
   }
   if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
    $EmailErr="Email is invalid";
   }
   
   if (empty($_POST['message'])) {
     $Err="Input your message";
   }
 

 if ($Err!="") {
   $Err="Error is found: ".$Err;
 }else{
      
      $Name=input($_POST['name']);
      $Email=input($_POST['email']);
      $Message=input($_POST['message']);

			$sql="SELECT id FROM contacts WHERE Email='$Email' ";
			$action= mysqli_query($conn, $sql);
			if (mysqli_num_rows($action) > 0) {
				$Err="Email already exist";
			}else{
			$sql="INSERT INTO contacts (Name, Email, Message)
			VALUES('$Name', '$Email', '$Message')";

			if (mysqli_query($conn, $sql)) {
				$success3="You have Successfully Submitted";
			}else{
				$Err="Something went wrong, try again" .mysqli_error($conn);
			}
		}

			

          
 }
  
           

}
 //setting the input variable
    function input($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
  }

           
?>


<!doctype html>
<html>

<!-- Mirrored from html.crunchpress.com/falah/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Aug 2018 13:46:12 GMT -->
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Psycho-Oncology Society of Nigeria (POSON) </title>

<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="assets/css/owl.carousel.css" rel="stylesheet">
<link href="assets/css/animate.css" rel="stylesheet">
<link href="assets/css/fast-select.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">
<link href="assets/css/theme-color.css" rel="stylesheet" title="color">
<link href="assets/css/theme-color_v2.css" rel="alternate stylesheet" title="color2">
<link href="assets/css/theme-color_v3.css" rel="alternate stylesheet" title="color3">
<link href="assets/css/theme-color_v4.css" rel="alternate stylesheet" title="color4">
<link href="assets/css/theme-color_v5.css" rel="alternate stylesheet" title="color5">

<!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
</head>
<body>

<div class="cp-wrapper">
<?php include'header.php';?>

<section class="cp-inner-banner-section">
<div class="container">

<div class="cp-breadcrumb-outer">
<div class="row">
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

<div class="cp-inner-banner-info">
<h1>Contact Us</h1>
<p>You can always contact us anytime and anyday.</p>
</div>
</div>
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="index.php">Home</a>
</li>
<li class="breadcrumb-item active">Contact Us</li>
</ol>
</div>
</div>
</div>
</div>
</section>
<div class="cp-get-in-touch-row pd-tb100">
<div class="container">
<div class="row">
<div class="col-lg-7 col-md-12 col-sm-12 col-xs-12">

<div class="cp-comments-outer">

<div class="cp-heading-outer">
<h2>Get In Touch</h2>
<p>Note: All fields are required </p>
</div>

<form class="cp-comments-form cp-contact-form" method="POST">
<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
<?php 
if ($Err!="") {
	echo '<div class="btn btn-danger" style="padding:15px; width:100%; text-align:center">'.$Err.'</div>';
}

if (isset($success3)) {
	echo '<div class="btn btn-success" style="padding:15px; width:100%; text-align:center">'.$success3.'</div>' ;
}


?>

<div class="inner-holder">
<input type="text" name="name" placeholder="Full Name" required="required">
</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="inner-holder">
<input type="email" name="email" placeholder="Email" required="required">
</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">

<div class="inner-holder">
<textarea name="message" cols="30" rows="10" placeholder="Message" required="required"></textarea>
</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12">
<div class="inner-holder text-right">
<button class="cp-btn-style btn-submit" type="submit" name="submitForm">Contact Now</button>
</div>
</div>
</div>
</form>
</div>
</div>
<div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">

<div class="widget widget-contact">

<div class="cp-heading-outer">
<h2>Contact Us</h2>
<p>The Psycho-Oncology Society of Nigeria (POSON) was registered with the Corporate Affairs Commission (CAC) in Nigeria on the 24th of April, 2009. You can always contact us</p>
</div>
<ul class="contact-info-listed contact-info-listed_v2">
<li>
<span class="icon-box">
<i class="fa fa-paper-plane" aria-hidden="true"></i>
</span>
<p>Address of the head office <br>Nigeria</p>
</li>
<li>
<span class="icon-box"><i class="fa fa-phone" aria-hidden="true"></i></span>
<p>
<span>Phone : <a href="tel:+4412345678">+234 802 328 8194</a></span>
<span>Fax : <a href="fax:+0061012345678">+23412345678S</a></span>
</p>
</li>
<li>
<span class="icon-box"><i class="fa fa-envelope" aria-hidden="true"></i></span>
<p>
<span><a href="the.needs%40skype.html"><span class="__cf_email__" data-cfemail="413529246f2f2424253201322a3831246f222e2c">[email&#160;protected]</span></a></span>
<span><a href="http://html.crunchpress.com/cdn-cgi/l/email-protection#95f6fafbe1f4f6e1d5e1fdf0fbf0f0f1e6bbf6faf8"><span class="__cf_email__" data-cfemail="264549485247455266524e4348434342550845494b">[email&#160;protected]</span></a></span>
</p>
</li>
</ul>

<div class="cp-social-outer_v2">
<span>Follow Us:</span>

<ul class="cp-social-links cp-social-links_v3">
<li><a href="#" title="Google Plus" data-toggle="tooltip" data-placement="top" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
<li><a href="#" title="Twitter" data-toggle="tooltip" data-placement="top" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
<li><a href="#" title="Linkedin" data-toggle="tooltip" data-placement="top" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
<li><a href="#" title="Facebook" data-toggle="tooltip" data-placement="top" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
<li><a href="#" title="Pinterest" data-toggle="tooltip" data-placement="top" target="_blank"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
<li><a href="#" title="Youtube" data-toggle="tooltip" data-placement="top" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
</ul>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
</div>
<?php include'footer.php';?>



<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-migrate-1.4.1.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.countdown-plugin.js"></script>
<script src="assets/js/jquery.countdown.js"></script>
<script src="assets/js/fast-select.min.js"></script>
<script src="assets/js/map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="assets/js/styleswitcher.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from html.crunchpress.com/falah/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Aug 2018 13:46:14 GMT -->
</html>