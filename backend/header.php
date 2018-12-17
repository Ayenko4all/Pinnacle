
<?php
session_start();
 require ("includes/db.php");
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo "$title";?> </title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap-4.3.1.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/footable.core.css">
  <link rel="stylesheet" type="text/css" href="css/footable.metro.css">
  <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
  <script type="text/javascript">
  	tinymce.init({
    selector: '#mytextarea'
  });
  </script>
</head>
<body>


 <?php require_once "navbar.php";?>
