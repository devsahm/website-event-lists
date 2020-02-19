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
$sql="SELECT * FROM events ORDER BY id DESC";
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
    <div id="breadcrumb"> <a href="admin.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>Home</a> <a href="eventview.php" class="current">View Uploads</a> </div>
    <h1>Uploads</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
        <?php
          if (isset($_SESSION['failedmsg'])) {
            echo $_SESSION['failedmsg'];
            unset($_SESSION['failedmsg']);
          }
          if (isset($_SESSION['successmsg'])) {
            echo $_SESSION['successmsg'];
            unset($_SESSION['successmsg']);
          }
        ?>
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i></span>
            <h5>Upoaded Events</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr style="font-size:15px">
                  <th>EVENT DATE</th>
                  <th>IMAGE</th>
                  <th>TITLE</th>
                  <th>ADDRESS</th>
                  <th>DELETE POST</th>
                </tr>
              </thead>
              <tbody>
                         <?php
              while ($row=mysqli_fetch_assoc($show)) {
              
                            ?>
                <tr class="odd gradeX">
                  <td><?php echo $row['date'] ;?></td>
                  <td><?php echo $row['image'] ;?></td>
                  <td><?php echo $row['title'] ;?></td>
                  <td><?php echo $row['address'] ;?></td>
                  <form action="eventdelete.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                  <td><input type="submit" name="submit" value="Delete" class="btn btn-danger"></td>
                  </form>
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
