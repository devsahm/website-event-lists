
<?php 
session_start();
include"connection.php";

if (array_key_exists('id', $_GET)) {
	$id2=$_GET['id'];
}






function timeAgo($time_ago){
$cur_time 	= time();
$time_elapsed 	= $cur_time - $time_ago;
$seconds = $time_elapsed ;
$minutes = round($time_elapsed / 60 );
$hours 	= round($time_elapsed / 3600);
$days 	= round($time_elapsed / 86400 );
$weeks = round($time_elapsed / 604800);
$months = round($time_elapsed / 2600640 );
$years 	= round($time_elapsed / 31207680 );
// Seconds
if($seconds <= 60){
	echo "$seconds seconds ago";
}
//Minutes
else if($minutes <=60){
	if($minutes==1){
		echo "one minute ago";
	}
	else{
		echo "$minutes minutes ago";
	}
}
//Hours
else if($hours <=24){
	if($hours==1){
		echo "an hour ago";
	}else{
		echo "$hours hours ago";
	}
}
//Days
else if($days <= 7){
	if($days==1){
		echo "yesterday";
	}else{
		echo "$days days ago";
	}
}
//Weeks
else if($weeks <= 4.3){
	if($weeks==1){
		echo "a week ago";
	}else{
		echo "$weeks weeks ago";
	}
}
//Months
else if($months <=12){
	if($months==1){
		echo "a month ago";
	}else{
		echo "$months months ago";
	}
}
//Years
else{
	if($years==1){
		echo "one year ago";
	}else{
		echo "$years years ago";
	}
}
}



?>
<!doctype html>
<html>

<!-- Mirrored from html.crunchpress.com/falah/event-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Aug 2018 13:45:06 GMT -->
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
<?php include'header.php'; ?>


<section class="cp-inner-banner-section">
<div class="container">

<div class="cp-breadcrumb-outer">
<div class="row">
<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">

<div class="cp-inner-banner-info">
<h1>Event Detail</h1>
<p>Information about our upcoming event</p>
</div>
</div>
<div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="index.php">Home</a>
</li>
<li class="breadcrumb-item active">Event Detail</li>
</ol>
</div>
</div>
</div>
</div>
</section>

<div class="cp-main-content">

<section class="cp-blog-section cp-blog-detail-section pd-tb100">
<div class="container">
<div class="row">
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">

<div class="cp-blog-detail-inner cp-event-detail-inner">
<?php
$sql="SELECT * FROM events WHERE id='$id2' ";
$create= mysqli_query($conn, $sql);
$rowtable= mysqli_fetch_array($create);
?>
<div class="cp-blog-item cp-blog-item_v2">
<figure class="cp-thumb">
<img src="admcp/img/events/<?php echo $rowtable['image'];?>" alt="">
<figcaption class="cp-caption">

<div class="cp-countdown-holder">
<div class="cp-countdown"></div>
</div>
</figcaption>
</figure>

<div class="cp-text">
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
<ul class="meta-listed">
<li><i class="fa fa-clock-o" aria-hidden="true">
	</i>
	<?php

 $dateuploaded=$rowtable['datepost'];
 $time_ago= strtotime($dateuploaded);
 echo timeAgo($time_ago);

?>
</li>
</ul>
<div class="cp-top">
<h4><?php echo $rowtable['title']; ?></h4>
</div>
<ul class="meta-listed">
<!--<li><i class="fa fa-user" aria-hidden="true"></i>Smith Alvin</li>-->
<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $rowtable['address']; ?></li>
</ul>
</div>
</div>

</div>
</div>
<p><?php echo $rowtable['content']; ?></p>




</div>
</div>
<div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">


<aside class="cp-asidebar-outer">
<div class="widget widget-recentpost">
<h4>Recent News</h4>
<ul class="cp-recent-listed">
	<?php
$sql="SELECT * FROM `display` ORDER BY id DESC LIMIT 4";
$show=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($show)) {

?>
<li class="recent-list">
<div class="sm-thumb">
<img src="admcp/img/uploads/<?php echo $row['image'];?>"  alt="">
</div>
<div class="cp-text">
	<?php
	 $id= $row['id'];
	 $view=$row["title"];
	 ?>
 <?php echo "<h6><a href='newsdetails.php?id=$id'>".$view. "</a></h6>"; ?>
<ul class="meta-listed">
<li>
<i class="fa fa-calendar" aria-hidden="true"></i>
<?php

 $dateuploaded=$row['datecreated'];
 $time_ago= strtotime($dateuploaded);
 echo timeAgo($time_ago);

?>
</li>
</ul>
</div>
</li>
<?php 
}
?>
</ul>

</div>

</aside>
</div>
</div>
</div>


</section>
</div>

 <?php include'footer.php'; ?>
</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-migrate-1.4.1.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.countdown-plugin.js"></script>
<!--<script src="assets/js/jquery.countdown.js"></script>
<script src="assets/js/fast-select.min.js"></script>-->
<script src="assets/js/map2.js"></script>
<script src="https://maps.googleapis.com/maps/api/js"></script>
<script src="assets/js/styleswitcher.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>

<!-- Mirrored from html.crunchpress.com/falah/event-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Aug 2018 13:45:08 GMT -->
</html>