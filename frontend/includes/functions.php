<?php


// Helper function


function displayError($error){
    $display = '<ul class="bg-light">';
    foreach ($error as $error) {
        $display .= '<p class="text-danger">'.$error.'</p>';
    }
    $display .= '</ul>';
    return $display;

}



function display_image($picture) {

global $upload_directory;

return $upload_directory  .  $picture;



}


function set_message($msg){

if(!empty($msg)) {

$_SESSION['message'] = $msg;

} else {

$msg = "";


    }


}


function display_message() {

    if(isset($_SESSION['message'])) {

        echo $_SESSION['message'];
        unset($_SESSION['message']);

    }
}



function redirect($location) {

	header("location: $location");

}


function query($sql) {

	global $conn;

	return mysqli_query($conn, $sql);
}


function confirm($result) {

	if(!$result) {

		die("QUERY FALIED" . mysqli_erro($conn, $result));
	}
}


function escape_string($string) {

	global $conn;

	return mysqli_real_escape_string($conn, $string);
}

function fetch_array($result) {

  return mysqli_fetch_array($result);
}

/*
function properties() {


	global $conn;

	$query = query("SELECT * FROM property WHERE status = 0");
	confirm($query);

	while ($row = fetch_array($query)) {

    $image = $row['image1'];

		$property = <<<DELIMETER

        <div class="col-md-4 thumbnail">
          <div class="card text-center border-light">
            <div class="card-body thumbnail img-fluid">
              <h5 class="text-dark"> {$row['title']} </h5>
              <img src="../backend/{$image} "  class="img-responsive img-fluid" />
              <p class="text-muted">location: {$row['location']} </p>
               <p class="text-danger">Price: {$row['price']} </p>
               <p>
                <a href="view.php?viewID={$row['property_id']}" class="btn btn-outline-info">View More</a></p>
            </div>
          </div><br>
        </div>
   			
   			
DELIMETER;
        echo $property;
	}
}*/



function all_properties() {


  global $conn;

  $query = query("SELECT * FROM property WHERE status = 0");
  confirm($query);

  while ($row = fetch_array($query)) {

    $image = $row['image1'];

    $property = <<<DELIMETER

        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
                <img src="../backend/{$image}" alt="" class="img-fluid mb-1">
                <h3>{$row['title']}</h3>
                <p class=" text-center text-danger">Price: {$row['price']}</p>
                <div class="d-flex flex-row justify-content-center">
                   <a href="view.php?viewID={$row['property_id']}" class="btn btn-outline-info">View More</a></p>
                </div>
            </div>
          </div>
        </div>
        
        
DELIMETER;
        echo $property;
  }
}


function view_property() {

  if (isset($_Get['viewID'])) {
    
    $viewID = escape_string($_Get['viewID']);

    $query = query("SELECT * FROM property WHERE property_id = '$viewID' ");
    confirm($query);

    while ($row = fetch_array($query)) {

      $title = $row['title'];
      $image = $row['location'];
      $image = $row['price'];
      $image = $row['description'];
      $image1 = $row['image1'];
      $image2 = $row['image2'];
      $image3 = $row['image3'];
      $image4 = $row['image4'];

      $view = <<<DELIMETER

              

                  <div class="col-md-7">
                     <img class="img-responsive img-fluid" src=""   alt="">

                  </div>

                  <div class="col-md-5">

                      <div class="">
                       

                  <div class="caption-full">
                      <h5>Javascript Course:{$title} </h5>
                      <hr>
                      <h6 class="">Price: {$price} </h6>
                      <hr>
                  <div class="ratings">
                   
                      <h6>Location: {$location} </h6>

                  </div>
                      <hr>
                  <h6>Description: {$description} </h6>
              
 

DELIMETER;
      echo $view;

    }
  }

}


function request() {

  if (isset($_GET['viewID']) && isset($_POST['request'])) {

    

    $property_id = escape_string($_GET['viewID']);
    $full_name = escape_string($_POST['full_name']);
    $email = escape_string($_POST['email']);
    $your_location = escape_string($_POST['your_location']);
    $phone_number = escape_string($_POST['phone_number']);
    $gender = escape_string($_POST['gender']);

    $cat = query("SELECT * FROM property  WHERE property_id = '$property_id' ORDER BY property_id  ");
    $row = fetch_array($cat);

    $cat_id = $row['property_cat_id'];


   $query  = query("INSERT INTO request (full_name,email,your_location,phone_number,gender,property_id,cat_id) VALUES ('$full_name','$email','$your_location','$phone_number','$gender','$property_id','$cat_id') ");
    confirm($query);

    if ($query) {
      set_message("Your request was submitted");
    } else {

       set_message("Request not submitted");
    }

  }

}


function sales() {


  global $conn;

  $query = query("SELECT * FROM property WHERE property_cat_id = 1 AND status = 0");
  confirm($query);

  while ($row = fetch_array($query)) {

    $image = $row['image1'];

    $property = <<<DELIMETER

        <div class="col-md-3">
          <div class="card text-center border-light">
            <div class="card-body">
              <h3 class="text-primary"> {$row['title']} </h3>
              <img src="../backend/{$image} " class="img-fluid" />
              <p class="text-muted">location: {$row['location']} </p>
               <p class="text-danger">price: {$row['price']} </p>
               <p>
                <a href="view.php?viewID={$row['property_id']}" class="btn btn-success">View More</a></p>
            </div>
          </div>
        </div>
        
        
DELIMETER;
        echo $property;
  }
}

function lease() {


  global $conn;

  $query = query("SELECT * FROM property WHERE property_cat_id = 9 AND status = 0");
  confirm($query);

  while ($row = fetch_array($query)) {

    $image = $row['image1'];

    $property = <<<DELIMETER

        <div class="col-md-3">
          <div class="card text-center border-light">
            <div class="card-body">
              <h3 class="text-primary"> {$row['title']} </h3>
              <img src="../backend/{$image} " class="img-fluid" />
              <p class="text-muted">location: {$row['location']} </p>
               <p class="text-danger">price: {$row['price']} </p>
               <p>
                <a href="view.php?viewID={$row['property_id']}" class="btn btn-success">View More</a></p>
            </div>
          </div>
        </div>
        
        
DELIMETER;
        echo $property;
  }
}


function location_finder() {

  if (isset($_POST['search'])) {
    
    $org = $_POST['org'];
    $des = $_POST['des'];

   $finder = <<<DELIMETER
      <div class="container">
        <iframe 
          width="1100"
          height="600"
          frameborder="0" style="border:0" 
          src="https://www.google.com/maps/embed/v1/derictions?key=ApiKeyHere&origin={$org}&destination={$des}">  
        </iframe>
      </div

DELIMETER;
   echo $finder;
  }

}








?>