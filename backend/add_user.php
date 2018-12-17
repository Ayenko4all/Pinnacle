<?php $title = "Add User"; ?>
<?php require_once "header.php";?>
<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>





 <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">

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
              <h4>Add User</h4>
            </div>
            <?php add_admin() ;?>
            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                 <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="full_name" class="form-control">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control">
                </div>
                <div class="form-group">
                  <label for="name">Password</label>
                  <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                  <label for="name">Confirm Password</label>
                  <input type="password" name="confirm_password" class="form-control">
                </div>
                <div class="form-group">
                  <label for="file">Image Upload</label>
                  <input type="file" class="form-control-file" name="file">
                  <small class="form-text text-muted">Max Size 5mb</small>
                </div>
                 <div class="form-group">
                  <select class="form-control" name="permission">
                    <option value="fulladmin">FULL Admin</option>
                    <option value="admin">Admin</option>
                  </select>
                </div>
               <input type="submit" class="btn btn-primary" name="add_admin" value="Add Admin">
               <a href="user.php" class="btn btn-secondary">Cancle</a>

          </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php require_once "footer.php";