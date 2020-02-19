<?php
session_start();
include"connection.php";


?>

<!doctype html>
<html>

<!-- Mirrored from html.crunchpress.com/falah/event.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Aug 2018 13:45:02 GMT -->
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Psycho-onchology Society of Nigeria</title>

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

<?php include'header.php' ?>

<section class="cp-inner-banner-section">
<div class="container">

<div class="cp-breadcrumb-outer">
<div class="row">
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

<div class="cp-inner-banner-info">
<h1>Upcoming Events</h1>
<p>Lists of Upcoming Events</p>
</div>
</div>
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="index.php">Home</a>
</li>
<li class="breadcrumb-item active">Upcoming Events</li>
</ol>
</div>
</div>
</div>
</div>
</section>

<div class="cp-main-content">

<section class="cp-event-section cp-event-section_v2 pd-tb100">
<div class="container">

<ul class="cp-event-listed">
	<?php
$sql="SELECT * FROM events ORDER BY id DESC";
$create= mysqli_query($conn, $sql);
while ($rowtable= mysqli_fetch_array($create)) {


?>
<li class="event-list-item">
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
<div class="event-inner-info">
<?php 
 $newdate = $rowtable['date']; 
 $day = date('d', strtotime($newdate));
 $month = date('M', strtotime($newdate));
 $year = date('Y', strtotime($newdate));
 ?>
<span class="date-box">
<strong><?php echo $day; ?></strong>
<span class="th-color"><?php echo $month.", ". $year;?></span>
</span>
<div class="cp-text">
<h5><?php echo $rowtable['title'];?></h5>
<ul class="meta-listed">
<!--<li><i class="fa fa-user" aria-hidden="true"></i>Smith Alvin</li>-->
<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $rowtable['address'];?></li>
</ul>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">

<div class="cp-countdown-holder">
	<?php
     $id=$rowtable['id'];
	  ?>
<?php echo "<a href='eventdetails.php?id=$id' class='cp-btn-style'>Learn More</a>"; ?>
</div>
</div>
</div>
</li>
<?php
}
?>
</ul>

<!--<div class="cp-pagination-row text-center">
<nav class="cp-pagination-listed">
<ul class="pagination justify-content-center">
<li class="page-item"><a class="page-link" href="#">Prev</a></li>
<li class="page-item"><a class="page-link" href="#">1</a></li>
<li class="page-item"><a class="page-link" href="#">2</a></li>
<li class="page-item"><a class="page-link" href="#">3</a></li>
<li class="page-item"><a class="page-link" href="#">4</a></li>
<li class="page-item"><a class="page-link" href="#">Next</a></li>
</ul>
</nav>
</div>-->
</div>



</section>
</div>

<?php include'footer.php' ?>
</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-migrate-1.4.1.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<!--<script src="assets/js/jquery.countdown-plugin.js"></script>
<script src="assets/js/jquery.countdown.js"></script>-->
<script src="assets/js/fast-select.min.js"></script>
<script src="assets/js/styleswitcher.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from html.crunchpress.com/falah/event.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Aug 2018 13:45:03 GMT -->
</html>