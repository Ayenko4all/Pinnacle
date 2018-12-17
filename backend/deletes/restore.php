<?php
require "../includes/db.php";

if (isset($_GET['restore'])) {
	$restoreID = escape_string($_GET['restore']);
	$query = query("UPDATE property SET status = 0 WHERE property_id ='$restoreID'");

	if(isset($query)) {
	redirect("../properties.php?status");


	} else {

	redirect("../properties.php?status");


	}

	
}








 ?>