<?php require_once "header.php";?>
<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>



 

<?php 

  

?> 

  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1> Property Name</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-3 mr-auto">
          <a href="properties.php" class="btn btn-light btn-block">
            <i class="fa fa-arrow-left"></i> Back To Properties
          </a>
        </div>
       
        <div class="col-md-3">
          <a href="#" class="btn btn-danger btn-block">
            <i class="fa fa-remove"></i> Delete Property
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
              <h4>Edit Property</h4>
            </div>
            <div class="card-body">
           <form method="POST" enctype="multipart/form-data">
          
                <div class="col-lg-12">
                  
                   <div class="col-lg-12">

                  <div class="row">

                    <?php edit_property_img();?>
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
                 <!--  <input type="submit" name="file" class="btn btn-primary my-2" value="submit file"> -->
                 
                </div>

                </div>

                 <button class="btn btn-success btn-block" name="update_img"><i class="fa fa-check"></i>Save Change </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php require_once "footer.php";
