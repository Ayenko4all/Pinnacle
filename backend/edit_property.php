<?php $title = "Edit Properties"; ?>
<?php require_once "header.php";?>
<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>



 

<?php 

if (isset($_POST['update'])) {

  
    $title          = escape_string($_POST['title']);
    $location       = escape_string($_POST['location']);
    $price          = escape_string($_POST['price']);
    $description    = escape_string($_POST['description']);
    $property_cat_id = escape_string($_POST['property_cat_id']);

   



    $update = query("UPDATE property SET title = '$title', location = '$location', price = '$price', description = '$description', property_cat_id = '$property_cat_id'  WHERE property_id = " . escape_string($_GET['updateID']) ." ");
    confirm($update);
    if ($update) {
      
      echo '<p class=" text-center text-success"> PROPERTY UPDATED SUCCESSFULLY!</p>';
    }
    
    

}




if(isset($_GET['updateID'])) {

$query = query("SELECT * FROM property WHERE property_id = " . escape_string($_GET['updateID']) . " ");
confirm($query);

while($row = fetch_array($query)) {

$id             = escape_string($row['property_id']);
$title          = escape_string($row['title']);
$location       = escape_string($row['location']);
$price          = escape_string($row['price']);
$description    = escape_string($row['description']);
$property_cat_id    = escape_string($row['property_cat_id']);
$image1         = escape_string($row['image1']);
$image2         = escape_string($row['image2']);
$image3         = escape_string($row['image3']);
$image4         = escape_string($row['image4']);


    }






}



    

  

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
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" name="title" value="<?=$title;?>">
                </div>
                <div class="form-group">
                  <label for="title">Location</label>
                  <input type="text" class="form-control" name="location" value="<?=$location;?>">
                </div>
                 <div class="form-group">
                  <label for="title">Price</label>
                  <input type="text" class="form-control" name="price" value="<?=$price;?>">
                </div>
                <div class="form-group">
                  <label for="title">Category</label>
                  <select class="form-control" name="property_cat_id">
                     <option value="<?=$property_cat_id;?>"><?=$property_cat_id;?></option>
                    <?php 
                    $get_cat = query("SELECT * FROM category ORDER BY cat_title");
                    while($cat = fetch_array($get_cat)) : ?>
                    <option value="<?=$cat['cat_id'];?>"><?=$cat['cat_title'];?></option>
                    <?php endwhile;?>
                  </select>
                </div>

                <div class="col-lg-12">
                
                  <div class="row">
                    <div class="form-group col-lg-3 col-md-6">
                      <img src="<?=$image1;?>" width="200" height="100" class="img-responsive">
                     
                    </div>
                    <div class="form-group col-lg-3 col-md-6">
                      <img src="<?=$image2;?>" width="200" height="100" class="img-responsive">
                     
                    </div>
                    <div class="form-group col-lg-3 col-md-6">
                      <img src="<?=$image3;?>" width="200" height="100" class="img-responsive">                   
                    </div>
                    <div class="form-group col-lg-3 col-md-6">
                     <img src="<?=$image4;?>" width="200" height="100" class="img-responsive">
                    </div>
                  </div>
                  <a href="edit_image.php?update_img=<?=$id;?>" class="btn btn-primary">Edit image</a>
                </div>

                <div class="form-group">
                  <label for="body">Description</label>
                  <textarea id="mytextarea" name="description" class="form-control"><?=$description;?></textarea>
                </div>
                 <button class="btn btn-success btn-block" name="update"><i class="fa fa-check"></i>Save Change </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      tinymce.init({ selector:'textarea' });
    </script>
  </section>

<?php require_once "footer.php";
