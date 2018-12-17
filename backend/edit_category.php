<?php require_once "header.php";?>

<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>
<?php


  if(isset($_GET['catID'])) {

    $catID = escape_string($_GET['catID']);
    $query = query("SELECT * FROM category WHERE cat_id = '$catID'");
    confirm($query);
       

  }

?>

  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1> Category Name</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mr-auto">
          <a href="categories.php" class="btn btn-light btn-block">
            <i class="fa fa-arrow-left"></i> Back To category
          </a>
        </div>
        
        <div class="col-md-3">
          <?php //delete_cat();?>
            <a href="" class="btn btn-danger btn-block">
            <i class="fa fa-remove"></i> Delete Category
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- POSTS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Edit Category</h4>
            </div>
            <div class="card-body">
              <?php update_cat(); ?>
              <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="title">Category</label>
                  <?php while($row = fetch_array($query)): ?>
                  <input type="text" class="form-control" name="cat_title" value="<?=$row['cat_title']?>">
                <?php endwhile;?>
                </div>
                <button class="btn btn-success btn-block" name="update_cat"><i class="fa fa-check"></i>Save Change </button>
                  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php require_once "footer.php";