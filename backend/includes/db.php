<?php


$conn = mysqli_connect("localhost", "root", "", "pinnacle_properties");

if (mysqli_connect_errno()) {
	echo 'not connected with following error: '. mysqli_connect_error();
	die();
}


require ("function.php");

?>