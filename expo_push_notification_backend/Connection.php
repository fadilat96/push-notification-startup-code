<?php
$con=mysqli_connect("localhost","root","","pushnotdb");
//For Arabic language
#mysqli_query($con, 'SET NAMES "utf8" COLLATE "utf8_general_ci"' );
// Check connection
if($con){
	// echo "connection success";

}
else {
	echo "connection failed";
}
  ?>
