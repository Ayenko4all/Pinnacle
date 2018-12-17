<?php require_once "includes/db.php"; ?>

<?php



if (isset($_POST['action'])) {
  
  $query = "SELECT * FROM property WHERE status = '0'";

  if (isset($_POST['minimum_price'], $_POST['maximum_price']) && !empty($_POST['minimum_price']) && !empty($_POST['maximum_price'])) 
  {
    $query .= "AND price BETWEEN '".$_POST['minimum_price']."' AND '".$_POST['maximum_price']." '";
  }

  if (isset($_POST['title'])) 
  {
    $title_filter = implode("','", $_POST['title']);
    $query .= "AND property_cat_id IN('".$title_filter."')";
  }

  if (isset($_POST['type'])) 
  {
    $type_filter = implode("','", $_POST['type']);
    $query .= "AND property_type IN('".$type_filter."')";
  }

   if (isset($_POST['state'])) 
  {
    $state_filter = implode("','", $_POST['state']);
    $query .= "AND state IN('".$state_filter."')";
  }

  if (isset($_POST['cities'])) 
  {
    $cities_filter = implode("','", $_POST['cities']);
    $query .= "AND location IN('".$cities_filter."')";
  }

  $query = query($query);
  $result = fetch_array($query);
  $total_row = mysqli_num_rows($query);
  if ($total_row > 0) 
  {
    foreach ($query as $row) 
    {
       $image = $row['image1'];
      $output = <<<DELIMETER

        <div class="col-md-4">
          <div class="card border-light thumbnail">
            <div class="card-body">
              <span><img src="../backend/{$image}" alt="" class=" rounded img-responsive details " alt="Responsive image" ></span> 
            </div>
            <div class="card-footer bg-white">
              <h4 class="card-title text-center text-danger">{$row['title']}</h4>
              <p class=" card-text text-center">Price: #{$row['price']}</p>
              <a href="view.php?viewID={$row['property_id']}" class="btn btn-outline-success btn-sm btn-block">More info</a></p>
            </div>
          </div>  
        </div>



        
              
         
DELIMETER;

        echo $output;
    }
    
  }
  else
  {
    echo $output = '<h4 class="text-center text-danger">property not available at the moment!</h4>';
  }
}





?>
                  






