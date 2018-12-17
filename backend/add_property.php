<?php $title = "Add Property"; ?>
<?php require_once "header.php";?>
<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>


<?php 
$get_cat = query("SELECT * FROM category ORDER BY cat_title");

?>


 <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        
      </div>
    </div>
  </section>

  <!-- LOGIN -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Add Property</h4>
            </div>

            <div class="card-body">
              <form method="POST" enctype="multipart/form-data">
                <?php add_property();?>
                <div class="form-group">
              <label for="title">Title</label>
              <input type="text" name="title" class="form-control">
            </div>
             <div class="form-group">
              <label for="title">Location</label>
              <input type="text" name="location" class="form-control">
            </div>
            <div class="form-group">
              <label for="title">Price</label>
              <input type="text" name="price" class="form-control">
            </div>
            <div class="form-group">
              <label for="category">Category</label>
              <select class="form-control" name="property_cat_id">
                <option value=""></option>
                <?php while($cat = fetch_array($get_cat)) : ?>
                <option value="<?=$cat['cat_id'];?>"><?=$cat['cat_title'];?></option>
              <?php endwhile;?>
              </select>
            </div>
            <div class="col-lg-12">

                  <div class="row">
                    <div class="form-group col-lg-3 col-md-6">
                      <label for="file">Image Upload</label>
                      <input type="file" class="form-control-file" name="image1">
                      <small class="form-text text-muted">Max Size 5mb</small>
                    </div>
                    <div class="form-group col-lg-3 col-md-6">
                      <label for="file">Image Upload</label>
                      <input type="file" class="form-control-file" name="image2">
                      <small class="form-text text-muted">Max Size 5mb</small>
                    </div>
                    <div class="form-group col-lg-3 col-md-6">
                      <label for="file">Image Upload</label>
                      <input type="file" class="form-control-file" name="image3">
                      <small class="form-text text-muted">Max Size 5mb</small>
                    </div>
                    <div class="form-group col-lg-3 col-md-6">
                      <label for="file">Image Upload</label>
                      <input type="file" class="form-control-file" name="image4">
                      <small class="form-text text-muted">Max Size 5mb</small>
                    </div>
                  </div>
                </div>
            <div class="form-group">
              <label for="body">Description</label>
              <textarea name="description" rows="10" cols=""  class="form-control" id="mytextarea"></textarea>
            </div>

           <input type="submit" class="btn btn-primary" name="add" value="Add Property">
           <a href="properties.php" class="btn btn-secondary">Cancle</a>

                  
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

 <?php require_once "footer.php";


    
