<?php
session_start();
include'pagination.php';
include"connection.php";
$sql="SELECT * FROM `display` ORDER BY 	id DESC $limit";
$show=mysqli_query($conn,$sql);
//$sql="SELECT * FROM display ORDER BY datecreated ASC LIMIT 4 ";
//$show=mysqli_query($conn, $sql);

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

<!-- Mirrored from html.crunchpress.com/falah/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Aug 2018 13:39:31 GMT -->
<head>
<meta charset="utf-8">
<meta name="description" content="">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Psycho-Oncology Society of Nigeria (POSON)</title>

<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
<link href="assets/css/fancybox.min.css" rel="stylesheet">
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

<link rel="stylesheet" href="assets/css/revolution/settings.css">

<link rel="stylesheet" href="assets/css/revolution/layers.css">

<link rel="stylesheet" href="assets/css/revolution/navigation.css"> 

		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<script src="ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
		<script src="maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!--[if lt IE 9]-->
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	      <script src="js/bootstrap.min.js"></script>
	    <!--[endif]-->
</head>
<body>

<!--<div class="cp-wrapper">-->

<?php include'header.php'; ?>
<section>

<!-- Carousel -->	
<div id="theme-carousel" class="carousel slide" data-ride="carousel">
	<!-- Indicators -->
	<ol class="carousel-indicators">
		<li data-target="#theme-carousel" data-slide-to="0" class="active"></li>
		<li data-target="#theme-carousel" data-slide-to="1"></li>
		<!--<li data-target="#theme-carousel" data-slide-to="2"></li>-->
        
	</ol>
	<!-- Wrapper for slides -->
	<div class="carousel-inner" role="listbox" id="home">
		<div class="item active">
			<img src="assets/images/resources/slider-img-01.jpg" alt="carousel1" style="width:100%" />
			<div class="carousel-caption">
				<h1 style="color:white; margin-bottom:30%; text-shadow:none; max-width: 100%;">Psycho-Oncology Society of Nigeria </h1>
			</div>
		</div>
		<div class="item">
			<img src="assets/images/resources/slider-img-02.jpg" alt="carousel2" style="width:100%" />
			<div class="carousel-caption">
			<div style="color:white; margin-bottom:30%; text-shadow:none; margin-left:60%;">
				<h1 style="color:white; font-size: 60px;">POSON</h1>
				<p style="color:#687606; font-size: 20px;">Psycho-oncology Society of Nigeria</p>
				</div>

			</div>
		</div>
       <!-- <div class="item">
            <img src="assets/images/resources/slider-img-02.jpg" alt="carousel2" style="width:100%" />
            <div class="carousel-caption">
            
            </div>
        </div>-->
            <!--<div class="item">
            <img src="images/carousel7.jpeg" alt="carousel2" style="width:100%" />
            <div class="carousel-caption">
                <h1>World of Innovation</h1>
            </div>
		<div class="item">
			<img src="images/carousel10.jpeg" alt="carousel3" style="width:100%">
			<div class="carousel-caption">
			</div>
		</div>-->
	</div>
	<!-- Controls -->
	<a class="left carousel-control" href="#theme-carousel" role="button" data-slide="prev">
        <div class="carousel-control-arrow">&#8249;</div>
	</a>
	<a class="right carousel-control" href="#theme-carousel" role="button" data-slide="next">
        <div class="carousel-control-arrow">&#8250;</div>
	</a>
</div>
<div class="clearfix hidden-xs" style="width:100%; height:50px;"></div>

</section>

<div class="cp-main-content">

<section class="cp-donation-section cp-donation-section_home">
<div class="container">

<div class="cp-donation-inner">
<div class="row justify-content-end">
<div class="col-lg-5 col-md-12 col-sm-12">

<div class="donation-inner">
<h4>Our Cardinal <strong class="th-color">OBJECTIVE</strong></h4>
</div>
</div>
<div class="col-lg-6 col-md-12 col-sm-12">

<div class="donation-info-outer">
<p>This is to offer psychosocial services to cancer patients and their caregivers in Nigeria and other African countries.  Also, the organization seeks to provide a training ground to further the work of Psycho-Oncology in Nigeria, to conduct research in the area of Psycho-Oncology, to act as patients advocate and to raise funds to assist patients when necessary.</p>

<div class="cp-progressbar-outer">
<!--<div class="cp-progressbar-inner">
<div class="progress-bar" role="progressbar" style="width: 56%;"><span class="percentage">56%</span></div>
</div>-->

<!--<ul class="cp-progress-info-list">
<li class="progress-text">TIME REMAIN: <span class="th-color">397 Days Left</span></li>
<li class="progress-text">RAISED: <span class="th-color">$472,183</span></li>
<li class="progress-text">GOAL: <span class="th-color">$685,200</span></li>
<li class="progress-text">DONATORS: <span class="th-color">14 Donors</span></li>
</ul>
<a href="donors.html" title="" class="cp-btn-style">Donate Now</a>-->
</div>
</div>
</div>
</div>
</div>
</div>
</section>


<section class="cp-blog-section pd-tb100">
<div style="width: 95%; margin: auto;">
<div class="container">
<div class="cp-heading-outer" style="text-align: center;">
<span class="th-color">Our Latest Updates </span>
<h1>News & Updates</h1>
<p>Feel free to check out for our news and updates</p>
</div>
<div class="row">
<?php
while($row=mysqli_fetch_array($show)) {
	


?>
<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">

<div class="cp-blog-item">
<figure class="cp-thumb">
<img src="admcp/img/uploads/<?php echo $row['image'];?>" alt="" style="width: 100%; height: 240px;">
</figure>
<div class="cp-text">
<h5><?php echo $row['title'];?></h5>

<p>
	
	<?php 

$string= $row['details'];
$id = $row['id'];
	//strip tag to avoid breaking any html
$stringstrip=strip_tags($string);
if (strlen($stringstrip) > 60) {
	//truncate string
	$stringcut= substr($stringstrip, 0, 60);
	$endpoint=strrpos($stringcut, ' ');
	//if string doesn't contain any space then it will cut without word basis
	$stringview= $endpoint? substr($stringcut, 0, $endpoint):substr($stringcut, 0);

	echo $stringview. "...<a href='newsdetails.php?id=$id'>Read More</a>";
				
}else{
	echo $string;
}

;?>
</p>
<div class="bottom-holder bottom-line">
<ul class="meta-listed">
<li><i class="fa fa-clock-o" aria-hidden="true"></i>
<?php

 $dateuploaded=$row['datecreated'];
 $time_ago= strtotime($dateuploaded);
 echo timeAgo($time_ago);

?></li>
</ul>
</div>
</div>
</div>
</div>
<?php
}
?>

 
<div class="cp-pagination-row mb-50 text-center">
<nav class="cp-pagination-listed">
<ul class="pagination justify-content-center">
<?php echo $paginationCtrls; ?>

</ul>
</nav>
</div>
</div>
</div>
</section>

<section class="cp-event-section pd-tb100">
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">

<div class="cp-heading-outer cp-heading-outer_v2">
<span class="th-color">Events and Conferences</span>
<h1>Our Next Events</h1>
<p>Check out for our upcoming events</p>
</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
<div class="right-holder">
<a href="eventlist.php" title="" class="btn-more"><i class="fa fa-plus" aria-hidden="true"></i></a>
<a href="eventlist.php" class="cp-btn-style cp-btn-style_v2">View More Events</a>
</div>
</div>
</div>

<?php 
$sql="SELECT * FROM events ORDER BY id DESC LIMIT 1";
$runquery= mysqli_query($conn, $sql);
while ($tablevent=mysqli_fetch_array($runquery)) {

?>
<ul class="cp-event-listed">
<li class="event-list-item">
<div class="row">
<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
<div class="event-inner-info">

<span class="date-box">
 	<?php 
 $newdate = $tablevent['date']; 
 $day = date('d', strtotime($newdate));
 $month = date('M', strtotime($newdate));
 $year = date('Y', strtotime($newdate));
 ?>
<strong><?php echo $day; ?></strong>
 <span class="th-color">
 	<?php 
	echo $month.", ". $year;
	 ?>
	
</span>
</span>
<div class="cp-text">
<h5><?php echo $tablevent['title']; ?></h5>
<ul class="meta-listed">
<!--<li><i class="fa fa-user" aria-hidden="true"></i>Smith Alvin</li>-->
<li><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $tablevent['address']; ?></li>
</ul>
</div>
</div>
</div>
<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
<?php 
$id2= $tablevent['id'];
?>
<div class="cp-countdown-holder">
<?php echo "<a href='eventdetails.php?id=$id2' class='cp-btn-style'>Learn More</a>";  ?>
<!--<div class="cp-countdown"></div>-->
</div>
</div>
</div>
</li>
</ul>
<?php
}
?>
</div>
</section>

<section class="cp-blog-section pd-tb100">
</section>



<?php include'footer.php';?>
</div>


<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery-migrate-1.4.1.min.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<!--<script src="assets/js/jquery.countdown-plugin.js"></script>
<script src="assets/js/jquery.countdown.js"></script>-->
<script src="assets/js/fast-select.min.js"></script>
<script src="assets/js/fancybox.min.js"></script>
<script src="assets/js/styleswitcher.js"></script>
<script src="assets/js/perfect-scrollbar.min.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/revolution/jquery.themepunch.tools.min.js"></script>
<script src="assets/js/revolution/jquery.themepunch.revolution.min.js"></script>

<script src="assets/js/revolution/extensions/revolution.extension.actions.min.js"></script>
<script src="assets/js/revolution/extensions/revolution.extension.carousel.min.js"></script>
<script src="assets/js/revolution/extensions/revolution.extension.kenburn.min.js"></script>
<script src="assets/js/revolution/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="assets/js/revolution/extensions/revolution.extension.migration.min.js"></script>
<script src="assets/js/revolution/extensions/revolution.extension.navigation.min.js"></script>
<script src="assets/js/revolution/extensions/revolution.extension.parallax.min.js"></script>
<script src="assets/js/revolution/extensions/revolution.extension.slideanims.min.js"></script>
<script src="assets/js/revolution/extensions/revolution.extension.video.min.js"></script>
<script src="assets/js/revolution/revolution-init.js"></script>
</body>

<!-- Mirrored from html.crunchpress.com/falah/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 31 Aug 2018 13:41:57 GMT -->
</html>