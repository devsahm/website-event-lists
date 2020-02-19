<?php
session_start();
if (array_key_exists("id", $_COOKIE)) {
  $_SESSION['id']=$_COOKIE['id'];
}
if (array_key_exists("id", $_SESSION)) {
  //echo "<p>Logged In!<a href='logout.php'>Log out</a></p>";
}else{
  header("Location:admin.php");
}
include"connection.php";
$sql="SELECT * FROM contacts";
$show=mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>POSON Admin</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="css/uniform.css" />
<link rel="stylesheet" href="css/select2.css" />
<link rel="stylesheet" href="css/matrix-style.css" />
<link rel="stylesheet" href="css/matrix-media.css" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>

<!--Header-part-->

<!--close-Header-part--> 

<!--top-Header-menu-->
<?php include'topheader.php'; ?>

<!--start-top-serch-->
<!--<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>-->
<!--close-top-serch--> 

<!--sidebar-menu-->
<?php include'sidebar.php'; ?> 
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="admin.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> <a href="#" class="current">View Messages</a> </div>
    <h1>Messages</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i></span>
            <h5>Messages sent from the landing page</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr style="font-size:15px">
                  <th>NAME</th>
                  <th>EMAIL</th>
                  <th>MESSAGE</th>
                </tr>
              </thead>
              <tbody>
                         <?php
              while ($row=mysqli_fetch_array($show)) {
              
                            ?>
                <tr class="odd gradeX">
                  <td><?php echo $row['Name'] ;?></td>
                  <td><?php echo $row['Email'] ;?></td>
                  <td><?php echo $row['Message'] ;?></td>
                </tr>
                <?php
                }
               ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Footer-part-->
<?php include'adminfooter.php'; ?>
<!--end-Footer-part-->
<!--<script type="text/javascript">
  
  function DeleteFile(id){

    if (confirm("Are you sure")) {
      //your deletion code
      window.location.href='delete.php?id='+id;
    }
    return false;
  }

</script>-->
<script src="js/jquery.min.js"></script> 
<script src="js/jquery.ui.custom.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/jquery.uniform.js"></script> 
<script src="js/select2.min.js"></script> 
<script src="js/jquery.dataTables.min.js"></script> 
<script src="js/matrix.js"></script> 
<script src="js/matrix.tables.js"></script>
</body>
</html>
