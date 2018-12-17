<?php $title = "Add Category"; ?>
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
              <h4>Add Category</h4>
            </div>
            <div class="card-body">
              <?php add_category(); ?>
              <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="title">Name</label>
              <input type="text" name="cat_title" class="form-control">
            </div>
           <input type="submit" class="btn btn-primary" name="add_cat" value="Add Category">
           <a href="categories.php" class="btn btn-secondary">Cancle</a>

          </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

 <?php require_once "footer.php";