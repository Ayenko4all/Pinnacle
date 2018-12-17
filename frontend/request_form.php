 <?php require_once "includes/db.php";?>

<button type="button" class="btn-outline-success form-control" data-toggle="modal" data-target=".bd-example-modal-lg">Property Request Form</button>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      
       <div class="modal-header">
          <h5 class="modal-title">Request Property</h5>
          <button class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
          <form method="POST">
              <?php request(); ?>
            <p class=" text-center text-success"><?php  display_message(); ?></p>
            <div class="form-group">
              <label for="full_name">Full Name</label>
              <input type="text" placeholder="Enter Full name" class="form-control" name="full_name" required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" placeholder="Enter Email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
              <label for="Phone number">Phone Number</label>
              <input type="text" placeholder="Enter Phone No" class="form-control" name="phone_number" required>
            </div>
            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" placeholder="Enter Address" class="form-control" name="your_location" required>
            </div>
            <div class="form-group">
              <label for="gender">Gender</label>
              <select class="form-control" name="gender" required>
                <option value="">select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
            <div class="form-group">
              <input type="submit" name="request" class="form-control btn-outline-success">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>


<script >

function validate() {


  var full_name = document.proForm.full_name.value;
  var email = document.proForm.email.value;
  var your_location = document.proForm.your_location.value;
  var phone_number = document.proForm.phone_number.value;
  var gender = document.proForm.gender.value;
  
  if (full_name == null || full_name == "") {

      error.innerHTML = "Please provide your name";
      return false;
    }

  if (email == null || email == "") {

    error.innerHTML = "Plesae provide your email";
    return false;
  }

  if (your_location == null || your_location == "") {

      error.innerHTML = " Plesae provide your locantion";
      return false;
    }

  if (phone_number == null || phone_number == "") {

    error.innerHTML = "Plesae provide your phone number";
    return false;
  }else{
    return true;
  }

  if (gender == null || gender == "") {

    error.innerHTML = "Plesae provide your gender";
    return false;
  }

  if (isNaN(phone_number)) {

    document.getElementById("phoneloc")
    error.innerHTML = "Phone number must be Numeric value only";
    return false;
  }else{
    return true;
  }



}

 </script> 