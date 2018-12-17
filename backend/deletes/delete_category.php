<?php
require "../includes/db.php";
if(isset($_GET['id'])) {


$query = query("DELETE FROM category WHERE cat_id = " . escape_string($_GET['id']) . " ");
confirm($query);


redirect("../categories.php?error");


} else {

redirect("../categories.php?error");


}






 ?>