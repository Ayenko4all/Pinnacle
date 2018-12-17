<?php $title = "Admin login"; ?>
<?php require_once "header.php";?>
  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-user"></i> Administrator</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row text-center">
 <?php if (isset($_GET['error'])) {
            
            echo '<p class=" text-center text-danger">User Not Found</p>';
          }
  ?>
      </div>
    </div>
  </section>

  <!-- LOGIN -->

  <section id="login">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h4>Adim Login</h4>
            </div>
            <div class="card-body">
              <form method="POST">
                <?php login_user();?>
               
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="Login">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 <?php require_once "footer.php";
