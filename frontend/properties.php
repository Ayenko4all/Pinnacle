<?php $title = "Properties"; ?>  

<!-- Haeder -->
<?php require("includes/header.php"); ?>
<!-- Header End Here -->

   <section id="boxes" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4 ">
          <div class=" p-4 border-light">
           
             
            <div class="card-body bg-white">
               <div>
                  <h4 class="">Filter search</h4>
               </div>
               <form method="post"> 
                
                <div class="form-group">
                  <label>Price</label>
                  <input type="hidden" id="hidden_minimum_price" value="0">
                  <input type="hidden" id="hidden_maximum_price" value="1000000000">
                  <p id="price_show" class="text-danger">150,000 -1,000,000,000</p>
                  <div class="" id="slider" name="slider"></div>
                </div>

                <div class="form-group">
                  <?php 
                    $query = query("SELECT DISTINCT property_cat_id FROM property WHERE status = '0' ");
                    confirm($query);
                  ?>
                  <label>Categories</label>
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

                <div class="form-group">
                  <label>Propert Type</label>
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

                <div class="form-group">
                  <label>State</label>
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

                <div class="form-group">
                  <label>Cities/Location</label>
                  <select class="form-control common_selector" id="location">
                    <option>Select</option>
                  </select>
                </div>
                
               </form> 
            </div>
          </div>
        </div><br><br>
        <br><br><div class="col-md-8">
          <div class=" p-4 border-light mt-">
            <div class="row filter_data">
            
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </section>

 
 <a href="#" id="scroll" style="display: none;"><span></span></a>

<!-- FOOTER -->
<?php require_once("footer.php");?>
<!-- FOOTER END HERE -->

<script src="js/form.js"> </script> 
