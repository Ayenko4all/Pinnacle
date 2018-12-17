<?php
require "../includes/db.php";
if(isset($_GET['id'])) {


$query = query("DELETE FROM property WHERE property_id = " . escape_string($_GET['id']) . " ");
confirm($query);


redirect("../properties.php?error");


} else {

redirect("../properties.php?error");


}






 ?>