<?php require_once "header.php";?>





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

  <!-- USERS -->
  <section id="posts">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h4>All Users</h4>
            </div>
      
            <table class="table table-striped">
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
                    
              </tbody>
            </table>

            <nav class="ml-4">
              <ul class="pagination">
                <li class="page-item disabled"><a href="#" class="page-link">Previous</a></li>
                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </section>



   <section id="boxes" class="py-5">
    <div class="container">
      <div class="row">
        <?php properties_out(); ?>
       
      </div>
    </div>
  </section>
 

 <?php require_once "footer.php";
