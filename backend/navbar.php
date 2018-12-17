
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){

        $admin = $_SESSION['email'];
        
        ?>
  
      

          <?php
      }

      ?>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
     <a href="../frontend/home.php" class="navbar-brand text-white"><i class="text-secondary" style=" font-weight: bold;">PINNACLE PROPERTY</i></a>
     <?php if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){ ?>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item px-2">
            <a href="index.php" class="nav-link active ">Dashboard</a>
          </li>
          <li class="nav-item px-2">
            <a href="properties.php" class="nav-link ">Properties</a>
          </li>
          <li class="nav-item px-2">
            <a href="categories.php" class="nav-link ">Categories</a>
          </li>
          <li class="nav-item px-2">
            <a href="user.php" class="nav-link ">Users</a> 
          </li>
          <li class="nav-item px-2">
            <a href="request.php" class="nav-link ">Request</a> 
          </li>
           <li class="nav-item px-2">
            <a href="completed_properties.php" class="nav-link ">Sold/Liease Out Properties</a> 
          </li>
          <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
              <img src="<?=$admin['file']?>" width="40" height="30" class="rounded-circle text-success">
                 <i class="text-primary"><?php echo $admin['full_name'] ?></i>
            </a>
            <div class="dropdown-menu">
              <a href="profile.html" class="dropdown-item ">
                <i class="fa fa-user-circle text-white"></i> Profile
              </a>
              <a href="settings.html" class="dropdown-item ">
                <i class="fa fa-gear text-white"></i> Settings
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a href="logout.php" class="nav-link text-white bg-dark">
              <i class="fa fa-user-times text-white"></i> Logout
            </a>
          </li>
        </ul>
    </ul>

   <?php }else{ ?>

       
        <?php }?>
  </div>
</nav>