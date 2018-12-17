<?php $title = "View Users"; ?>
<?php require_once "header.php";?>

<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>



  <header id="main-header" class="py-2 bg-warning text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h1><i class="fa fa-users"></i> Users</h1>
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
              <a href="add_user.php" class="btn btn-success"><i class="fa fa-plus"></i> Add User</a>
          </div>
        </div>

        <div class="col-md-6 ml-auto">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-warning">Search</button>
            </span>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php if (isset($_GET['success'])) {
            
            echo '<p class=" text-center text-success  ">Registration Successful</p>';
          }

        if (isset($_GET['error'])) {
            
            echo '<p class=" text-center text-success  ">User Deleted Successful</p>';
          }
?>
  <!-- USERS -->
  <section id="posts">
    <div class="container table-responsive">
    
      <table class="footable" data-page-size="5" data-first-text="FIRST" data-next-text="NEXT" data-previous-text="PREVIOUS" data-last-text="LAST">
              <thead class="thead-inverse">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Date Join</th>
                  <th>Last Seen</th>
                </tr>
              </thead>
              <tbody>
               <?php get_user(); ?>         
              </tbody>
              <tfoot class="hide-if-no-paging ">
                <td colspan="8">
                <div class="pagination"></div>
                </td>
              </tfoot>
      </table>          
    </div>
  </section>

 <?php require_once "footer.php";
