<?php
require "../includes/db.php";

if (isset($_GET['status'])) {
	$statusID = escape_string($_GET['status']);
	$query = query("UPDATE property SET status = 1 WHERE property_id ='$statusID'");

	if(isset($query)) {
		$date = date("Y-m-d H:i:S");
		query("UPDATE property SET sold_date = '$date' WHERE property_id = '$statusID' ");
	redirect("../properties.php?status");


	} else {

	redirect("../properties.php?status");


	}

	
}








 ?>