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


/***********************Backend Query***************/


function add_admin() {

	global $conn;

	$error = [];

	if (isset($_POST['add_admin'])) {

		$full_name        = escape_string($_POST['full_name']);
		$email            = escape_string($_POST['email']);
		$password         = escape_string($_POST['password']);
		$confirm_password = escape_string($_POST['confirm_password']);
		$permission         = escape_string($_POST['permission']);
		$hashed_password  = password_hash($password, PASSWORD_DEFAULT);
		$id = md5(uniqid(rand(),true));

		$required = array('full_name','email','password','confirm_password');
		foreach($required as $field){
			if ($_POST[$field] == '') {
				$error[] = 'Please fill all filed.';
				break;
			}
		}

	

		//check if email already exist
		$emailQuery = query("SELECT * FROM admin_signup WHERE email = '$email' ");
		confirm($emailQuery);
		$emailCount = mysqli_num_rows($emailQuery);

		if ($emailCount != 0) {

			$error[] = 'Email already exist.';
		}

		if (strlen($password) < 6) {
		$error[] = 'Password must at least be 6 characters.';
		}

		// if password match
		if ($password != $confirm_password) {
		$error[] = 'Password not match.';
		}

		//check if email is valid
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error[] = 'Enter a valid email.';
		}


		$max = 5000000;
		$extension = ['images/jpg','images/jpeg','image/png'];

		if (empty($_FILES['file']['name'])) {
		$error['file'] = "Please choose a file";
		}
		if (!array($_FILES['file']['type'], $extension)) {
		$error['file'] = "invalude file type";
		}
		if ($_FILES['file']['size'] > $max){
		$error['file'] = "File exceeds maximum upload size of 5mb";
		}
		$rnd = rand(000,999);
		$strip_name = str_replace(" ","_",$_FILES['file']['name']);
		$filename = $rnd.$strip_name;
		$imagePath = "uploads/".$filename;
		move_uploaded_file($_FILES['file']['tmp_name'], $imagePath);

		if (!empty($error)) {

			echo displayError($error);
			
		} else {

			
			$query = query("INSERT INTO admin_signup (unique_id,full_name,email,password,file,permission) VALUES ('$id','$full_name','$email','$hashed_password','$imagePath','$permission') ");

			confirm($query);

			if (isset($query)) {
				
				$success = "Added successfully";
				redirect("user.php?success");
			
			}

			
			
		}
	}

}

function login_user() {

	global $conn;
	$error = [];
	if (isset($_POST['submit'])) {

		$email = escape_string($_POST['email']);
		$password = escape_string($_POST['password']);

		$required = array('email', 'password');
		foreach ($required as $field) {
			
			if (empty($_POST[$field])) {
				
				$error[] = "Please enter Email/Password";
				break;
			}
		}

		// check if email exist
				$query = query("SELECT * FROM admin_signup WHERE email = '$email'");
				$row = fetch_array($query);
				$adminCount = mysqli_num_rows($query);
				if ($adminCount < 1) {
					$error[] = 'That email does not exist.';
				}
				if (!password_verify($password, $row['password'])) {
					$error[] = 'Password does not match.';
				}
				//check for error
				if (!empty($error)) {
					echo displayError($error);
				}else{
					//log user in
				$id = $row['id'];	
				$_SESSION['email'] = $row;
				$_SESSION['logged'] = true;
				$date = date("Y-m-d H:i:S");
				query("UPDATE admin_signup SET last_login = '$date' WHERE id = '$id'");
				redirect("index.php?success");
				}

	}

}


function get_user() {

	if (isset($_SESSION['logged']) && $_SESSION['logged'] == true){

       $id = $_SESSION['email'];

	$query = query ("SELECT * FROM admin_signup");

	confirm($query);

	while ($row = fetch_array($query)) {

	$categories_links = <<<DELIMETER
		
		 		<tr>
                  <td><a class="btn btn-danger" href="deletes/delete_user.php?id={$row['id']}"><span class="fa fa-remove"></span></a></td>
                  <td>{$row['full_name']}</td>
                  <td>{$row['email']}</td>
                  <td>{$row['date_join']}</td>
                  <td>{$row['last_login']}</td>
                </tr>  

DELIMETER;
 echo $categories_links;
}					
	
}					

}

function add_property() {

	global $conn;

	$error = [];
	$destination = "";
	$destination2 = "";
	$destination3 = "";
	$destination4 = "";

	if (isset($_POST['add'])) {

		$title = escape_string($_POST['title']);
		$location = escape_string($_POST['location']);
		$description = escape_string($_POST['description']);
		$price = escape_string($_POST['price']);
		$property_cat_id = escape_string($_POST['property_cat_id']);
		$status = 0;
		$featured = 0;
		
		$required = array('title','location','price','description','property_cat_id');
		foreach ($required as $field) {
			if (empty($_POST[$field])) {
				
				$error[] = "Provide all field";
				break;
			}
		}



		$max = 15000000;
		$extension = ['images/jpg','images/jpeg','image/png'];

		if (empty($_FILES['image1']['name'])) {
		$error['image1'] = "Please choose a file";
		}
		if (!array($_FILES['image1']['type'], $extension)) {
		$error['image1'] = "invalude file type";
		}
		if ($_FILES['image1']['size'] > $max){
		$error['image1'] = "File exceeds maximum upload size of 5mb";
		}
		$rnd = rand(000,999);
		$strip_name = str_replace(" ","_",$_FILES['image1']['name']);
		$filename = $rnd.$strip_name;
		$destination = "images/".$filename;
		move_uploaded_file($_FILES['image1']['tmp_name'], $destination);


		$max = 15000000;
		$extension = ['images/jpg','images/jpeg','image/png'];

		if (empty($_FILES['image2']['name'])) {
		$error['image2'] = "Please choose a file";
		}
		if (!array($_FILES['image2']['type'], $extension)) {
		$error['image2'] = "invalude file type";
		}
		if ($_FILES['image2']['size'] > $max){
		$error['image2'] = "File exceeds maximum upload size of 5mb";
		}
		$rnd = rand(000,999);
		$strip_name = str_replace(" ","_",$_FILES['image2']['name']);
		$filename = $rnd.$strip_name;
		$destination2 = "images/".$filename;
		move_uploaded_file($_FILES['image2']['tmp_name'], $destination2);


		$max = 15000000;
		$extension = ['images/jpg','images/jpeg','image/png'];

		if (empty($_FILES['image3']['name'])) {
		$error['image3'] = "Please choose a file";
		}
		if (!array($_FILES['image2']['type'], $extension)) {
		$error['image3'] = "invalude file type";
		}
		if ($_FILES['image3']['size'] > $max){
		$error['image3'] = "File exceeds maximum upload size of 5mb";
		}
		$rnd = rand(000,999);
		$strip_name = str_replace(" ","_",$_FILES['image3']['name']);
		$filename = $rnd.$strip_name;
		$destination3 = "images/".$filename;
		move_uploaded_file($_FILES['image3']['tmp_name'], $destination3);


		$max = 15000000;
		$extension = ['images/jpg','images/jpeg','image/png'];

		if (empty($_FILES['image4']['name'])) {
		$error['image4'] = "Please choose a file";
		}
		if (!array($_FILES['image4']['type'], $extension)) {
		$error['image4'] = "invalude file type";
		}
		if ($_FILES['image4']['size'] > $max){
		$error['image4'] = "File exceeds maximum upload size of 5mb";
		}
		$rnd = rand(000,999);
		$strip_name = str_replace(" ","_",$_FILES['image4']['name']);
		$filename = $rnd.$strip_name;
		$destination4 = "images/".$filename;
		move_uploaded_file($_FILES['image4']['tmp_name'], $destination4);


		if(!empty($error)) {

		echo displayError($error);

		}  else {


			if (!empty($_FILES)) {



				$sql = query("INSERT INTO property(title,location,description,price,property_cat_id,image1,image2,image3,image4,status,featured)VALUES('$title', '$location', '$description', '$price', '$property_cat_id', '$destination','$destination2','$destination3','$destination4','$status','$featured') ");	

				confirm($sql);

				redirect("properties.php?success");
			}
		}
		

	} 
	
			

}

		
		

function properties() {

	if (isset($_POST['search'])) {

		global $conn;

		$title = escape_string($_POST['title']);
		$location = escape_string($_POST['location']);
		$cat_title = escape_string($_POST['cat_title']);

		if ($title != '' || $location != '' || $cat_title != '') {
			$query = query("SELECT * FROM property WHERE title = '$title' AND status = 0 OR location = '$location' AND status = 0 OR property_cat_id = '$cat_title' AND status = 0 ");
			confirm($query);
			if (mysqli_num_rows($query) > 0) {
				
				while ($row = fetch_array($query)) {

				$pro = $row['property_cat_id'];
				$result = query ("SELECT * FROM category WHERE cat_id = '$pro' ");
				$category = fetch_array($result);

				$property = <<<DELIMETER
				<tr>
				<td>
				<a class="btn btn-danger" href="deletes/delete_property.php?id={$row['property_id']}"><span class="fa fa-remove"></span></a>
				<a class="btn btn-success" href="deletes/status.php?status={$row['property_id']}"><span class="fa fa-check"></span></a>
				</td>
                  <td> {$row['title']} </td>
                  <td> {$row['location']} </td>
                  <td> {$row['price']} </td>
                   <td> {$category['cat_title']} </td>
                   <td> {$row['date_uploaded']}</td>
                  <td>
                  <a href="edit_property.php?updateID={$row['property_id']}" class="btn btn-secondary">
                    <i class="fa fa-angle-double-right"></i> Details
                  </a>
                  </td>
                  </tr> 
DELIMETER;
       echo $property;
			}
		}
		else{
			echo $property = "<h4 class='text-danger'>Details Not Found</h4>";
		}
	}	

	} else {


	$query = query("SELECT * FROM property WHERE status = 0 ORDER BY property_id DESC");
	$query2 = query("SELECT cat_title FROM category");

	confirm($query);

	while ($row = fetch_array($query)) {

		$pro = $row['property_cat_id'];
		$result = query ("SELECT * FROM category WHERE cat_id = '$pro' ");
		$category = fetch_array($result);

		$property = <<<DELIMETER
				<tr>
				<td>
				<a class="btn btn-danger" href="deletes/delete_property.php?id={$row['property_id']}"><span class="fa fa-remove"></span></a>
				<a class="btn btn-success" href="deletes/status.php?status={$row['property_id']}"><span class="fa fa-check"></span></a>
				</td>
                  <td> {$row['title']} </td>
                  <td> {$row['location']} </td>
                  <td> {$row['price']} </td>
                   <td> {$category['cat_title']} </td>
                   <td> {$row['date_uploaded']}</td>
                  <td>
                  <a href="edit_property.php?updateID={$row['property_id']}" class="btn btn-secondary">
                    <i class="fa fa-angle-double-right"></i> Details
                  </a>
                  </td>
                  </tr> 
DELIMETER;
       echo $property;
	}

	}
}

function status() {

	global $conn;


	if (isset($_POST['submit'])) {
		
		$title = escape_string($_POST['title']);
		$location = escape_string($_POST['location']);
		$cat_title = escape_string($_POST['cat_title']);

		if ($title != '' || $location != '' || $cat_title = '') {
			$query = query("SELECT * FROM property WHERE title = '$title' AND status = 1 OR location = '$location' AND status = 1 OR property_cat_id = '$cat_title' AND status = 1 ");
			confirm($query);

			if (mysqli_num_rows($query) > 0) {
				
				while ($row = fetch_array($query)) {

		$pro = $row['property_cat_id'];
		$result = query ("SELECT * FROM category WHERE cat_id = '$pro' ");
		$category = fetch_array($result);

		$property = <<<DELIMETER
				<tr>
				<td>
				<a class="btn btn-danger" href="deletes/delete_property.php?id={$row['property_id']}"><span class="fa fa-remove"></span></a>
				<a class="btn btn-warning" href="deletes/restore.php?restore={$row['property_id']}"><span class="fa fa-remove"></span></a>
				</td>
                <td> {$row['title']} </td>
                <td> {$row['location']} </td>
                <td> {$row['price']} </td>
                <td> {$category['cat_title']} </td>
                <td> {$row['sold_date']} </td>

    

DELIMETER;
       echo $property;
	}

		}else{
			
			echo $property = "<h4 class='text-danger'>Detail Not Found</h4>";
		}

		}

	} else { 

	$query = query("SELECT * FROM property WHERE status = 1");
	$query2 = query("SELECT cat_title FROM category");

	confirm($query);

	//$propertyresult = $db->query("SELECT * FROM prod WHERE deleted = 0");

	while ($row = fetch_array($query)) {

		$pro = $row['property_cat_id'];
		$result = query ("SELECT * FROM category WHERE cat_id = '$pro' ");
		$category = fetch_array($result);

		$property = <<<DELIMETER
				<tr>
				<td>
				<a class="btn btn-danger" href="deletes/delete_property.php?id={$row['property_id']}"><span class="fa fa-remove"></span></a>
				<a class="btn btn-warning" href="deletes/restore.php?restore={$row['property_id']}"><span class="fa fa-remove"></span></a>
				</td>
                <td> {$row['title']} </td>
                <td> {$row['location']} </td>
                <td> {$row['price']} </td>
                <td> {$category['cat_title']} </td>
                <td> {$row['sold_date']} </td>

    

DELIMETER;
       echo $property;
	}

}

}


function edit_property_img() {


	if (isset($_POST['update_img'])) {


			$max = 15000000;
		$extension = ['images/jpg','images/jpeg','image/png','image/gif'];

		if (empty($_FILES['image1']['name'])) {
		$error['image1'] = "Please choose a file";
		}
		if (!array($_FILES['image1']['type'], $extension)) {
		$error['image1'] = "invalude file type";
		}
		if ($_FILES['image1']['size'] > $max){
		$error['image1'] = "File exceeds maximum upload size of 5mb";
		}
		$rnd = rand(000,999);
		$strip_name = str_replace(" ","_",$_FILES['image1']['name']);
		$filename = $rnd.$strip_name;
		$destination = "images/".$filename;
		move_uploaded_file($_FILES['image1']['tmp_name'], $destination);


		$max = 15000000;
		$extension = ['images/jpg','images/jpeg','image/png','image/gif'];

		if (empty($_FILES['image2']['name'])) {
		$error['image2'] = "Please choose a file";
		}
		if (!array($_FILES['image2']['type'], $extension)) {
		$error['image2'] = "invalude file type";
		}
		if ($_FILES['image2']['size'] > $max){
		$error['image2'] = "File exceeds maximum upload size of 5mb";
		}
		$rnd = rand(000,999);
		$strip_name = str_replace(" ","_",$_FILES['image2']['name']);
		$filename = $rnd.$strip_name;
		$destination2 = "images/".$filename;
		move_uploaded_file($_FILES['image2']['tmp_name'], $destination2);


		$max = 15000000;
		$extension = ['images/jpg','images/jpeg','image/png','image/gif'];

		if (empty($_FILES['image3']['name'])) {
		$error['image3'] = "Please choose a file";
		}
		if (!array($_FILES['image2']['type'], $extension)) {
		$error['image3'] = "invalude file type";
		}
		if ($_FILES['image3']['size'] > $max){
		$error['image3'] = "File exceeds maximum upload size of 5mb";
		}
		$rnd = rand(000,999);
		$strip_name = str_replace(" ","_",$_FILES['image3']['name']);
		$filename = $rnd.$strip_name;
		$destination3 = "images/".$filename;
		move_uploaded_file($_FILES['image3']['tmp_name'], $destination3);


		$max = 15000000;
		$extension = ['images/jpg','images/jpeg','image/png','image/gif'];

		if (empty($_FILES['image4']['name'])) {
		$error['image4'] = "Please choose a file";
		}
		if (!array($_FILES['image4']['type'], $extension)) {
		$error['image4'] = "invalude file type";
		}
		if ($_FILES['image4']['size'] > $max){
		$error['image4'] = "File exceeds maximum upload size of 5mb";
		}
		$rnd = rand(000,999);
		$strip_name = str_replace(" ","_",$_FILES['image4']['name']);
		$filename = $rnd.$strip_name;
		$destination4 = "images/".$filename;
		move_uploaded_file($_FILES['image4']['tmp_name'], $destination4);
  			
		if(!empty($error)) {

			echo displayError($error);

		}  else {

		    $update_img = query("UPDATE property SET image1 = '$destination', image2 = '$destination2', image3 = '$destination3', image4 = '$destination4'  WHERE property_id = " . escape_string($_GET['update_img']) ." ");
		    confirm($update_img);
		   redirect("properties.php");
		   set_message("image updated successfully");
    	}

	}


}



function delete_property() {

	if ($_GET['delete']) {
		
		$delete_id = escape_string($_GET['delete']);

		$pro_delete = query("DELETE FROM property WHERE property_id ='$delete_id' ");
		confirm($pro_delete);
		redirect("categories.php?error");
	}
}


function add_category () {

	if (isset($_POST['add_cat'])) {

		$cat_title = escape_string($_POST['cat_title']);

		if (empty($cat_title)) {
			
			$error[] = "category is required";
		}

		if (!empty($error)) {
			
			echo displayError($error);
		} else {

			$insert = query("INSERT INTO category(cat_title) VALUES('$cat_title') ");
			confirm($insert);
			redirect("categories.php?success");

		}

	}

}


function category() {

	global $conn;

	$query = query("SELECT * FROM category");

	confirm($query);

	while ($row = fetch_array($query)) {

		$category = <<<DELIMETER

				<tr>
                 <td><a class="btn btn-danger" href="deletes/delete_category.php?id={$row['cat_id']}"><span class="fa fa-remove"></span></a></td>
                  <td>{$row['cat_title']}</td>
                  <td><a href="edit_category.php?catID={$row['cat_id']}" class="btn btn-secondary">
                    <i class="fa fa-angle-double-right"></i> Details
                  </a></td>
                </tr>


DELIMETER;
       echo $category;
	}

}

function update_cat() {

	if (isset($_POST['update_cat'])) {

		$cat_title = escape_string($_POST['cat_title']);

		if (empty($cat_title)) {
			
			$error[] = "category is required";
		}

		if (!empty($error)) {
			
			echo displayError($error);
		} else {

			$insert = query("UPDATE category SET cat_title = '$cat_title' WHERE cat_id =" . escape_string($_GET['catID']) ."");
			confirm($insert);
			redirect("categories.php?update");

		}

	}

}


/*function delete_cat() {

	if (isset($_GET['deleteID'])) {
		
		$deleteID = escape_string($_GET['deleteID']);

		 $query = query("SELECT * FROM category WHERE cat_id =".escape_string($_GET['deleteID'])." ");
    	$delete = fetch_array($query);

		$cat_delete = query("DELETE FROM category WHERE cat_id ='$deleteID' ");
		confirm($cat_delete);
		redirect("categories.php?error");

	}
}
*/

function request_property() {

	global $conn;

	if (isset($_POST['search'])) {

		global $conn;

		$name = escape_string($_POST['name']);
		$email = escape_string($_POST['email']);
		$phone_number = escape_string($_POST['phone_number']);
		$date = escape_string($_POST['date']);
		$date = strtotime($date);
		$date = date("Y-m-d, H:i:s", $date);

		if ($name != '' || $email != '' || $phone_number != '' || $data = '') {
			$query = query("SELECT * FROM request WHERE full_name = '$name' OR email = '$email' OR phone_number = '$phone_number' OR request_date = '$date' ");
			confirm($query);
			if (mysqli_num_rows($query) > 0) {
				
				while ($row = fetch_array($query) ) {
				$r = $row['property_id'];
				$result = query("SELECT * FROM property WHERE property_id = '$r' ");
				$property = fetch_array($result);

				$pro = $row['cat_id'];
				$result = query ("SELECT * FROM category WHERE cat_id = '$pro' ");
				$category = fetch_array($result);
				$request = <<<DELIMETER

			<tr>
			   <td></td>
		       <td> {$row['full_name']} </td>
		       <td> {$row['email']} </td>
		       <td> {$row['your_location']} </td>
		       <td> {$row['phone_number']} </td>
		       <td> {$property['title']} -At- {$property['location']} </td>
		       <td> {$category['cat_title']} </td>
		       <td> {$row['request_date']} </td>
		       <td> {$row['status']} </td>
	      </tr>

DELIMETER;
	echo $request;
				}
			}
			else
			{
				echo $request = "<h4 class='text-danger'>Details Not Found</h4>";
			}
		}

	} else {

	$query = query("SELECT * FROM request ORDER BY request_id DESC");

	confirm($query);

	while ($row = fetch_array($query) ) {
		$r = $row['property_id'];
		$result = query("SELECT * FROM property WHERE property_id = '$r' ");
		$property = fetch_array($result);

		$pro = $row['cat_id'];
		$result = query ("SELECT * FROM category WHERE cat_id = '$pro' ");
		$category = fetch_array($result);
		$request = <<<DELIMETER

			<tr>
			   <td></td>
		       <td> {$row['full_name']} </td>
		       <td> {$row['email']} </td>
		       <td> {$row['your_location']} </td>
		       <td> {$row['phone_number']} </td>
		       <td> {$property['title']} -At- {$property['location']} </td>
		       <td> {$category['cat_title']} </td>
		       <td> {$row['request_date']} </td>
		       <td> {$row['status']} </td>
	      </tr>

DELIMETER;
	echo $request;
	}

}

}






 function property_count() {

		global $conn;

		$result = query("SELECT * FROM property");
		confirm($result);
		$row = mysqli_num_rows($result);
		if (isset($row)) {
			
			echo $row;
		}

}

function user_count() {

		global $conn;

		$result = query("SELECT * FROM admin_signup");
		confirm($result);
		$row = mysqli_num_rows($result);
		if (isset($row)) {
			
			echo $row;
		}
}


function category_count() {

		global $conn;

		$result = query("SELECT * FROM category");
		confirm($result);
		$row = mysqli_num_rows($result);
		if (isset($row)) {
			
			echo $row;
		}
}

function request_count() {

		global $conn;

		$result = query("SELECT * FROM request");
		confirm($result);
		$row = mysqli_num_rows($result);
		if (isset($row)) {
			
			echo $row;
		}
}

function sold_count() {

		global $conn;

		$result = query("SELECT * FROM property WHERE status = 1");
		confirm($result);
		$row = mysqli_num_rows($result);
		if (isset($row)) {
			
			echo $row;
		}
}


function running_count() {

		global $conn;

		$result = query("SELECT * FROM property WHERE status = 0");
		confirm($result);
		$row = mysqli_num_rows($result);
		if (isset($row)) {
			
			echo $row;
		}
}

function rent_count() {

		
}

function pending_count() {


}



function search_property() {

	if (isset($_POST['search'])) {
		
		$valueToSearch = escape_string($_POST['valueToSearch']);
		$query = query("SELECT * FROM `property` WHERE CONCAT( `property_id`, `title`, `location`, `price`, `property_cat_id`, `date_uploaded`)LIKE'%".$valueToSearch."%");


	}
}

/*************Backend end here*************/





?>