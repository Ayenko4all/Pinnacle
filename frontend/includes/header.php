
<?php require("db.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo "$title";?></title>
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap-4.3.1.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/jquery-ui.css">
  <style type="text/css">
    #loading {

      text-align: center;
      background: url('loader.gif') no-repeat center;
      height: 150px;
    }
  </style>
</head>
<body id="home">
  <nav class="navbar navbar-expand-md navbar-light fixed-top py-4">
    <div class="container">
      <a href="#home" class="navbar-brand">
        <img src="img/mlogo.png" width="50" height="50" alt=""><h4 class="d-inline align-middle text-secondary" style=" font-weight: bold;">PINNACLE PROPERTIES</h4>
      </a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href="home.php" class="nav-link">Home</a>
          </li>
           <li class="nav-item">
            <a href="properties.php" class="nav-link">Properties</a>
          </li>
          <li class="nav-item">
            <a href="about.php" class="nav-link">About</a>
          </li>
          
          <li class="nav-item">
            <a href="contact.php" class="nav-link">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  