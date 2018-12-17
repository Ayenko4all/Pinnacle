<?php $title = " Admin Dashboard"; ?>
<?php 

require_once "header.php";?>

<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>




 
  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-gear"></i> Dashboard</h1>
         
        </div>
         
      </div>
    </div>
  </header>


<?php 

          if (isset($_GET['success'])) {
            
            echo '<p class=" text-center text-success">WELCOME TO ADMIN PANEL</p>' ;
          }

           ?>

  <!-- POSTS -->
  <section id="posts" class="pt-5">

     <div class="container-fluid">
        <div class="col-lg-12">

        <div class="row">
      
          <div class="col-lg-3 col-md-6">
            <div class="card text-center bg-primary text-white mb-3">
              <div class="card-body">
                <h3>All Properties</h3>
                <h1 class="display-4">
                  <i class="fa fa-pencil"></i> <?php property_count(); ?>
                </h1>
                <a href="" class="btn btn-outline-light btn-sm">View</a>
              </div>
            </div>
          </div>

           <div class="col-lg-3 col-md-6">
              <div class="card text-center bg-light text-success mb-3">
                <div class="card-body">
                  <h3>Runnig Properties</h3>
                  <h1 class="display-4">
                    <i class="fa fa-users"></i> <?php running_count(); ?>
                  </h1>
                  <a href="properties.php" class="btn btn-outline-secondary btn-sm">View</a>
                </div>
              </div>
            </div>

           <div class="col-lg-3 col-md-6">
              <div class="card text-center bg-success text-white mb-3">
                <div class="card-body">
                  <h3>Categories</h3>
                  <h1 class="display-4">
                    <i class="fa fa-folder-open-o"></i> <?php category_count(); ?>
                  </h1>
                  <a href="categories.php" class="btn btn-outline-light btn-sm">View</a>
                </div>
              </div>
            </div>
            
             <div class="col-lg-3 col-md-6">
                <div class="card text-center bg-dark text-white mb-3">
                    <div class="card-body">
                      <h3>Sold/Lease Out Properties</h3>
                      <h1 class="display-4">
                        <i class="fa fa-folder-open-o"></i> <?php sold_count(); ?>
                      </h1>
                      <a href="completed_properties.php" class="btn btn-outline-light btn-sm">View</a>
                    </div>
                </div>   
              </div>



           <div class="col-lg-3 col-md-6">
              <div class="card text-center bg-light text-dark mb-3">
                <div class="card-body">
                  <h3> Think</h3>
                  <h1 class="display-4">
                    <i class="fa fa-users"></i>
                  </h1>
                  <a href="rent.php" class="btn btn-outline-secondary btn-sm">View</a>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">

              <div class="card text-center bg-warning text-white mb-3">
                <div class="card-body">
                  <h3>Users</h3>
                  <h1 class="display-4">
                    <i class="fa fa-users"></i> <?php user_count(); ?>
                  </h1>
                  <a href="user.php" class="btn btn-outline-light btn-sm">View</a>
                </div>
              </div>
            </div>

            <div class="col-lg-3 col-md-6">
              <div class="card text-center bg-light text-secondary mb-3">
                <div class="card-body">
                  <h3>Achieved Properties</h3>
                  <h1 class="display-4">
                    <i class="fa fa-users"></i> <?php pending_count(); ?>
                  </h1>
                  <a href="achieved.php" class="btn btn-outline-secondary btn-sm">View</a>
                </div>
              </div>
            </div> 

            <div class="col-lg-3 col-md-6">
              <div class="card text-center bg-secondary text-white mb-3">
                <div class="card-body">
                  <h3>Requests</h3>
                  <h1 class="display-4">
                    <i class="fa fa-users"></i> <?php request_count(); ?>
                  </h1>
                  <a href="request.php" class="btn btn-outline-light btn-sm">View</a>
                </div>
              </div>
            </div>
      </div>
       </div>
      </div>

    </div>
   

  </section>

 <?php require_once "footer.php";
