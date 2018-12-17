<?php $title = "View Properties"; ?>  
<!-- Haeder -->

<?php require("includes/header.php"); ?>
<!-- Header End Here -->



   <section id="action" class="py-4 mb-4 bg-dark">
    <div class="container">
      <div class="row">

        
        <div class="col-md-6 ml-auto">
          <?php require_once "includes/search.php"; ?>
        </div>
      </div>
    </div>
  </section>



      <!-- Page Content -->
<div class="container">

   <?php 


    $query = query("SELECT * FROM property WHERE property_id=" . escape_string($_GET['viewID']) . "");
    confirm($query);

    while ($row = fetch_array($query)) : 

        $name = escape_string($row['title']);
        $price = escape_string($row['price']);
        $location = escape_string($row['location']);
        $description = escape_string($row['description']);

?>   
<div class="container">
  <div class="col-md-12 pb-3 pt-3 ">

      <!--Row For Image and Short Description-->

      <div class="row">

          <div class="col-md-7 ">
            <div class="row">
            <div class="col-2">
              <div>
                 <img class="img-responsive img-fluid" src="img/person1.jpg"   alt="">
              </div><br>
               
              <div>
                 <img class="img-responsive img-fluid" src="img/person1.jpg"   alt="">
              </div><br>

              <div>
                 <img class="img-responsive img-fluid" src="img/person1.jpg"   alt="">
              </div><br>

              <div>
                 <img class="img-responsive img-fluid" src="img/person1.jpg"   alt="">
              </div>
            </div>

            <div class="col-10">
                <div id="slider3" class="carousel slide mb-5" data-ride="carousel">
          <ol class="carousel-indicators">
            <li class="active" data-target="#slider3" data-slide-to="0"></li>
            <li data-target="#slider3" data-slide-to="1"></li>
            <li data-target="#slider3" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="img/image1.jpg" alt="First Slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/image2.jpg" alt="Second Slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="img/image3.jpg" alt="Third Slide">
            </div>
          </div>
          <a href="#slider3" class="carousel-control-prev" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </a>

          <a href="#slider3" class="carousel-control-next" data-slide="next">
            <span class="carousel-control-next-icon"></span>
          </a>
        </div>
            </div>
           </div>

          </div>

          <div class="col-md-5">

              <div class="thumbnail">
          <div class="">
              <h5>Name: </h5>
              <p class="text-muted"><?=$name;?> </p>
          </div><hr>
          <div>
              <h6>Price:</h6>
              <p class="text-danger"> <?=$price;?></p>
              
          </div><hr>
          <div class="f">
              <h6>Location:</h6>
              <p class="text-muted"><?=$location;?> </p>
          </div><hr>
          <div class="form-inline">
              
              <h6 >Description:</h6>
              <p class="text-muted"><?=$description;?></p>
          </div>


            <!-- MODAL TRIGGER -->
      <button class="btn btn-primary mt-2" data-toggle="modal" data-target="#myModal">Locate Property</button>

      <!-- MODAL -->
      <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Locate Property</h5>
              <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <form class="form-inline  mr-auto card-body" method="post">
              <input type="text" class="form-control mr-2 mb-1" id="username" placeholder="Enter Your Location">
              <input type="text" class="form-control mr-2 mb-1" id="password" placeholder="Enter Property Location">
              
              </form>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-success mb-1">Search</button>
              <button class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <a class=" btn btn-success mt-2" href="">Purchase</a> 

      </div>
  </div>

  <?php endwhile; ?>
    <p></p>
     <!--  <div class="container mt-4">
       <div class="col">
       <div class="card">
       <h5 class="text-primary card-header">Locate Property</h5>
       <form class="form-inline  mr-auto card-body">
             <input type="text" class="form-control mr-2 mb-1" id="username" placeholder="Enter Your Location">
             <input type="text" class="form-control mr-2 mb-1" id="password" placeholder="Enter Property Location">
             <button type="submit" class="btn btn-secondary mb-1">Search</button>
         </form>
     </div>
       </div>
     </div> -->
  </div><!--Row For Image and Short Description-->
  </div>
  </section>

        <section id="posts" class="mt-4 mb-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 pt-3 pb-3 ">
          <div class="">
            <div class="">
              <h5 class="text-primary">Request Property</h5>
            </div>
              <form method="POST" enctype="multipart/form-data" id="proForm" name="proForm" onsubmit="return validate()">
                <P class="bg-danger text-white px-5" style="" id="error"></P>
               <?php request(); ?>
                <div class="form-group">
              <label for="title">Full Name</label>
              <input type="text" name="full_name" class="form-control">
            </div>
            <div class="form-group">
              <label for="title">Email</label>
              <input type="text" name="email" class="form-control">
            </div>
             <div class="form-group">
              <label for="title"> Your Location</label>
              <input type="text" name="your_location" class="form-control">
            </div>
            <div class="form-group">
              <label for="title">Phone Number</label>
              <input type="text" name="phone_number" class="form-control"><span id="phoneloc"></span>
            </div>
            <div class="form-group">
              <label for="title">Gender</label>
              <select class="form-control" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
           <input type="submit" class="btn btn-primary" name="submit" value="Submit">
           <a href="properties.php" class="btn btn-secondary">Cancle</a>

              
        </form>
            
          </div>
        </div>
      </div>
    </div>
</div>
</div>




 

  <!-- CONTACT -->
 <?php require ("contact.php")  ;?>
 <!-- CONTACT END HERE -->

<!-- FOOTER -->
<?php require_once("footer.php");?>
<!-- FOOTER END HERE -->


<script src="js/form.js"> </script> 



 <div class="list-group">
                    <label>By Price</label>
                   <input type="hidden" id="hidden_minimum_price" value="0">
                   <input type="hidden" id="hidden_maximum_price" value="1000000000">
                   <p id="Price_show">1000 - 1000000000</p>
                   <div id="price_range"></div>
                 </div>

                 <div class="list-group">
                   <label>By Category</label>
                   <?php
                   $query = query("SELECT DISTINCT(property_cat_id) FROM property WHERE status = '0' ORDER BY property_id DESC ");
                   confirm($query);
                  
                   ?>  
                   <select  class="list-group-item common_selector">
                    <option>Select</option>
                    <?php
                     while ($rowResult = fetch_array($query)) : ?>
                      <?php
                      $pro = $rowResult['property_cat_id'];
                    $row = query ("SELECT * FROM category WHERE cat_id = '$pro'");
                    $result = fetch_array($row);
                     ?>
                     
                     <option value="<?=$result['cat_id']?>" class="common_selector cat_title"><?=$result['cat_title']?></option>
                     <?php endwhile; ?>
                   </select>
                 
                 </div>

                 <div class="list-group">
                   <label>By State</label>
                   <?php
                   $query = query("SELECT DISTINCT(state) FROM property WHERE status = '0' ORDER BY state DESC ");
                   confirm($query);
                   
                   ?>
                   <select class="list-group-item common_selector" id="statedd" onChange="change_state()">
                    <option>Select</option>
                   <?php while ($result = fetch_array($query)) : 

                    ?>
                    <option value="<?=$result['state']?>" class="common_selector state"><?=$result['state']?></option>
                   <?php endwhile; ?>
                   </select>
                 </div>
                  
                 <div class="list-group">
                   <label>By Location</label>
                  
                   <select class="list-group-item common_selector cities" id="cities">
                      
                      <option class="cities">Select</option>
              
                   </select>
              
                 </div>




<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      ...
    </div>
  </div>
</div>




<div class="container-fluid bg-white">
        <h4>Filter Search</h4>
        <form>
          <div class="form-row">
            <div class="col-md-4 mb-3 bg-white">
              <label for="Categories">Categories</label>
               <?php 
                    $query = query("SELECT DISTINCT property_cat_id FROM property WHERE status = '0' ");
                    confirm($query);
                  ?>
                  <select class="form-control common_selector" >
                    <option>Select</option>
                    <?php while ($row  = fetch_array($query)) : ?>
                      <?php
                        $catID = escape_string($row['property_cat_id']);
                        $cat = query("SELECT * FROM category WHERE cat_id = '$catID' ");
                        $cat_row = fetch_array($cat);
                      ?>
                    
                    <option value="<?=$cat_row['cat_id'];?>" class="common_selector title"><?=$cat_row['cat_title'];?></option>
                  <?php endwhile;?>
                  </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="type">Property Type</label>
                <select class="form-control common_selector">
                    <?php
                      $query = query("SELECT DISTINCT property_type FROM property WHERE status = '0' ORDER BY property_type ");
                      confirm($query);
                    ?>
                    <option>Select</option>
                    <?php while($row = fetch_array($query)) : ?>
                    <option value="<?=$row['property_type'];?>" class="common_selector type"><?=$row['property_type'];?></option>
                  <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-4 mb-3">
              <label for="state">State</label>
               <select class="form-control common_selector" id="statedd" onchange="state_change()">
                    <?php
                      $query = query("SELECT DISTINCT state FROM property WHERE status = '0' ORDER BY state ");
                      confirm($query);
                    ?>
                    <option>Select</option>
                    <?php while($row = fetch_array($query)) : ?>
                    <option value="<?=$row['state'];?>" class="common_selector state"><?=$row['state'];?></option>
                  <?php endwhile; ?>
                  </select>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6 mb-3 bg-white">
              <label for="price">Price</label>
              <input type="hidden" id="hidden_minimum_price" value="0">
              <input type="hidden" id="hidden_maximum_price" value="1000000000">
              <div class="" id="slider" name="slider"></div>
              <p id="price_show" class="text-danger">150,000 -1,000,000,000</p>
            </div>
            <div class="col-md-6 mb-3">
              <label for="Locaation/Cities">Locaation/Cities</label>
              <select class="form-control common_selector" id="location">
                <option>Select</option>
              </select>
            </div>
          </div>
        </form>
      </div>