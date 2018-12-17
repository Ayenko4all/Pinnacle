<?php $title = "View Requests"; ?>
<?php require_once "header.php";?>

<?php if (!isset($_SESSION['email'])) {redirect("login.php");}?>



       

  <header id="main-header" class="py-2 bg-primary text-white">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3><i class="fa fa-pencil"></i> Properties Request</h3>
        </div>
      </div>
    </div>
  </header>

  <!-- ACTIONS -->
  <section id="action" class="py-4 mb-4 bg-light">
    <div class="container">
        <div class="input-group">
          <h5>Search table by filter</h5>
        </div>
      </div>
    <div class="container">
      
      <form method="post">
        <div class="row">
           
          <div class="col-md-2">
            <div class="input-group">
             <input type="text" class="form-control" name="name" placeholder=" Enter Name" >
            </div>
          </div>
          <div class="col-md-2">
            <div class="input-group">
             <input type="email" class="form-control" name="email" placeholder=" Enter Email" >
            </div>
          </div>
          <div class="col-md-2">
            <div class="input-group">
             <input type="text" class="form-control" name="phone_number" placeholder=" Enter phone_no" >
            </div>
          </div>
           <div class="col-md-2">
            <div class="input-group">
             <input type="date" class="form-control" name="date" id="myInput">
            </div>
          </div>
          <div class="col-md-3">
            <button type="submit" name="search" class="btn btn-success">Search</button>
          </div>
          
        </div>   
      </form>
       
      
    </div>
  </section>

  <!-- POSTS -->
  <section >
    <div class="container table-responsive">
       
      <table class="footable" data-page-size="5" data-first-text="FIRST" data-next-text="NEXT" data-previous-text="PREVIOUS" data-last-text="LAST"">
        <thead  class="">
          <th>N/A</th>
          <th>Name</th>
          <th>Email</th>
          <th>Your Location</th>
          <th>Phone no</th>
          <th>Property</th>
          <th>Cat_name</th>
          <th>Request Date</th>
          <th>Status</th>
        </thead>
        <tbody> 
            <?php request_property();?>
        </tbody id="myTable">
         <tfoot class="hide-if-no-paging ">
          <td colspan="9">
          <div class="pagination"></div>
        </td>
        </tfoot>
      </table>
    </div>      
  </section>

  
  <?php require_once "footer.php";?>

<script src="myscript.js"></script>