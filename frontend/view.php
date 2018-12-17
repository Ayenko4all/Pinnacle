<?php $title = "View Properties"; ?>  
<!-- Haeder -->

<?php require("includes/header.php"); ?>
<!-- Header End Here -->



 


<section class="py-5 mt-5">
  <div class="container">
    <?php

    
      
      $viewID = escape_string($_GET['viewID']);
      $query = query("SELECT * FROM property WHERE property_id = ".escape_string($_GET['viewID'])." ");
      confirm($query);

      while ($row = fetch_array($query)) : 

        $name = escape_string($row['title']);
        $price = escape_string($row['price']);
        $location = escape_string($row['location']);
        $description = escape_string($row['description']);
        $image1 = escape_string($row['image1']);
        $image2 = escape_string($row['image2']);
        $image3 = escape_string($row['image3']);
        $image4 = escape_string($row['image4']);


    


    ?>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-7">
          <div id="slider3" class="carousel slide mb-5" alt="Responsive image" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block"  src="../backend/<?=$image1?>" alt="First Slide Responsive image">
            </div>
            <div class="carousel-item">
              <img class="d-block"  src="../backend/<?=$image2?>" alt="Second Slide Responsive image">
            </div>
            <div class="carousel-item">
              <img class="d-block"  src="../backend/<?=$image3?>" alt="Third Slide Responsive image">
            </div>
            <div class="carousel-item">
              <img class="d-block"  src="../backend/<?=$image4?>" alt="Fouth Slide Responsive image">
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
          
        <div class="col-md-5">
      
            <div class="">
              <h5>Title: </h5>
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
            <div class="">
              <h6 >Description:</h6>
              <p class="text-muted"><?=$description;?></p>
            </div>
        </div>  
      </div>
    </div>
    <?php endwhile;?>  
  </div>
</section>


<section id="" class=" mb-4" >
    <div class="container">
      <div class="row">
        <div class="col-md-6 "> 
          
          <form method="POST" action="sales.php">
           
            <label>Origin</label>
            <input type="text" name="org" placeholder="Enter Origin" class="form-control">
            <label>Destination</label>
            <input type="text" name="des" placeholder="Enter Destination" class="form-control">
            <button class="btn-outline-danger form-control mt-2" name="search">Google Location Finder</button>
          </form>
        </div>
        <div class="col-md-6 mt-4">
         <?php require_once "request_form.php"; ?>
        </div>
      </div>
    </div>
  </section>






<a href="#" id="scroll" style="display: none;"><span></span></a>

 



<!-- FOOTER -->
<?php require_once("footer.php");?>
<!-- FOOTER END HERE -->


<script src="js/form.js"> </script> 