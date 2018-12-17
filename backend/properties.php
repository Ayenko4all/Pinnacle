<?php $title = "View Properties"; ?>
<?php require_once "header.php";?>
<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>
  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3><i class="fa fa-pencil"></i> Properties</h3>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
 

    <div class="container">
      <div class="row">
        
        <div class="col-md-2 ml-auto">
          <div class="input-group">
            <a href="add_property.php" class="btn btn-success mt-1"><i class="fa fa-plus"></i> Add Property</a>
          </div>
        </div>

        <div class="col-md-10 ml-auto">  
           
       <form method="post">
        <div class="row">
          <div class="col-md-2">
            <div class="input-group">
             <input type="text" class="form-control mt-1" name="title" placeholder=" Enter Title" >
            </div>
          </div>
          <div class="col-md-2">
            <div class="input-group">
             <input type="text" class="form-control mt-1" name="location" placeholder=" Enter location" >
            </div>
          </div>
          <div class="col-md-3">
            <div class="input-group">
            <select name="cat_title" class="form-control mt-1">
              <option>Select Category</option>
              <?php
                $query = query("SELECT DISTINCT property_cat_id FROM property WHERE status = '0'");
              ?>
             <?php while($row = fetch_array($query)) : ?>
              <?php 
              $res =  $row['property_cat_id'];
              $get_cat = query("SELECT * FROM category WHERE cat_id = '$res' ORDER BY cat_title");
              $cat = fetch_array($get_cat);
              ?>
                <option value="<?=$cat['cat_id'];?>"><?=$cat['cat_title'];?></option>
              <?php endwhile;?>
            </select>
            </div>
          </div>
           <div class="col-md-3">
            <div class="input-group">
             <input type="date" class="form-control mt-1" name="date" id="myInput">
            </div>
          </div>
          <div class="col-md-2">
            <button type="submit" name="search" class="btn btn-success mt-1">Search</button>
          </div>
          
        </div>   
      </form>
        </div>  
      </div>
    </div>
  </section>

      <?php 

          if (isset($_GET['success'])) {
            
            echo '<p class=" text-center text-success">PROPERTY ADDED SUCCESSFULLY!</p>';
          }

          if (isset($_GET['error'])) {
            
            echo '<p class=" text-center text-danger">PROPERTY DELETED SUCCESSFULLY!</p>';
          }




        //for featured
        /*if (isset($_GET['featured'])) {
          $featured_id = (int)$_GET['id'];
          $featured = escape_string($_GET['featured']);
          $featuredQuery = $db->query( "UPDATE property SET featured = '$featured' WHERE property_id = '$featured_id' ");
          header('location: product.php');
        }*/
        ?>



  <!-- POSTS -->
  <section >
    
     <div class="container table-responsive">

    <table class="footable" data-page-size="5" data-first-text="FIRST" data-next-text="NEXT" data-previous-text="PREVIOUS" data-last-text="LAST">
      
      <thead>
        <tr>
                  <th>Action</th>
                  <th>Title</th>
                  <th>Location</th>
                  <th>Price</th>
                  <th>Category</th>
                  <th>Date</th>
                  <th>Show</th>
        </tr>
      </thead>
      <tbody id="myTable">
        <?php properties(); ?>
      </tbody>
      <tfoot class="hide-if-no-paging ">
          <td colspan="7">
          <div class="pagination"></div>
        </td>
        
      </tfoot>
    </table>
    

  </div>
 <div class="clearfix"></div>
  </section> 
   
</body>

   
  <?php require_once "footer.php";
