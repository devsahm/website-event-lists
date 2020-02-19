<?php
$servername="localhost";
$username="root";
$password="";
$mydb="drdiji";
$_POST['password'] = 'mywebsite';
$conn=mysqli_connect($servername, $username, $password, $mydb);
$id = 1;
$hashed =md5(md5($id).$_POST['password']);
        	$sql="UPDATE login SET password='".$hashed."' WHERE id= 1 LIMIT 1 ";
        	if (mysqli_query($conn, $sql)) {
        		echo "successfully ";
        		echo "<br>" . $hashed ."<br>";
        	}else{
        		echo "error".mysqli_error($conn);
        	}
        	?>