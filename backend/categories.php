<?php $title = "View Categories"; ?>
<?php require_once "header.php";?>

<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>




  <header id="main-header" class="py-2 bg-success text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-folder"></i> Categories</h1>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
      <div class="row">

         <div class="col-md-6 ml-auto">
          <div class="input-group">
               <a href="add_category.php" class="btn btn-success"><i class="fa fa-plus"></i> Add Category</a>
          </div>
        </div>
        <div class="col-md-6 ml-auto">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-success">Search</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php 

          if (isset($_GET['success'])) {
            
            echo '<p class=" text-center text-success">CATEGORY ADDED SUCCESSFULLY!</p>';
          }
          if (isset($_GET['update'])) {
            
            echo '<p class=" text-center text-success">CATEGORY UPDATED SUCCESSFULLY!</p>';
          }
          if (isset($_GET['error'])) {
            
            echo '<p class=" text-center text-danger">CATEGORY DELETED SUCCESSFULLY!</p>';
          }

           ?>
  <!-- CATEGORIES -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>Categories</h4>
            </div>
            <div class="table-responsive">
              <table class="footable" data-page-size="5" data-first-text="FIRST" data-next-text="NEXT" data-previous-text="PREVIOUS" data-last-text="LAST">
                <thead class="thead-inverse">
                  <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php category();?>
                </tbody>
                <tfoot class="hide-if-no-paging ">
                  <td colspan="3">
                    <div class="pagination"></div>
                  </td>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php require_once "footer.php";
