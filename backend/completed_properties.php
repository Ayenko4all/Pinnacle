<?php $title = "Process Properties"; ?>
<?php require_once "header.php";?>

<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>



       

  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3><i class="fa fa-pencil"></i>Sold And Rent out Properties</h3>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
 

    <div class="container">
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
                $query = query("SELECT DISTINCT property_cat_id FROM property WHERE status = 1 ")
              ?>
              <?php while($row = fetch_array($query)): ?>
                <?php
                  $cat = $row['property_cat_id'];
                  $query2 = query("SELECT * FROM category WHERE cat_id = '$cat' ");
                  $catQ = fetch_array($query2);
                ?>
              <option value=""><?=$catQ['cat_title']?></option>
              <?php endwhile;?>
            </select>
            </div>
          </div>
           <div class="col-md-3">
            <div class="input-group">
             <input type="date" class="form-control mt-1" name="date">
            </div>
          </div>
          <div class="col-md-2">
            <button type="submit" name="submit" class="btn btn-success mt-1">Search</button>
          </div>
        </div>   
      </form>
    </div>
  </section>

  <!-- POSTS -->
  <section id="posts">
    <div class="container table-responsive">
      <table class="footable" data-page-size="5" data-first-text="FIRST" data-next-text="NEXT" data-previous-text="PREVIOUS" data-last-text="LAST"">
        <thead  class="thead-inverse">
          <th></th>
          <th>Title</th>
          <th>Location</th>
          <th>Price</th>
          <th>Category</th>
          <th>sold/Rent Date</th>
        </thead>
      <tbody id="myTable">
        
        <?php status();?>
        
      </tbody>
        <tfoot class="hide-if-no-paging ">
                <td colspan="6">
                <div class="pagination"></div>
              </td>
        </tfoot>
      </table>
    </div>
  </section>

  <?php require_once "footer.php";
