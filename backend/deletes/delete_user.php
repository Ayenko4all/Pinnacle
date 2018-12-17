<?php
require "../includes/db.php";
if(isset($_GET['id'])) {


$query = query("DELETE FROM admin_signup WHERE id = " . escape_string($_GET['id']) . " ");
confirm($query);


redirect("../user.php?error");


} else {

redirect("../user.php?error");


}






 ?>