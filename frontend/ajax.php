<?php require_once "includes/db.php"; ?>
<?php
                  

if (isset($_GET['state']) && !empty($_GET['state'])) {
  $state = escape_string($_GET['state']);
  $res = query("SELECT DISTINCT location FROM property WHERE state = '$state' ");
    echo '<option class="common_selector">'; echo 'Select'; echo '</option>';
  while ($row = fetch_array($res)) {
    
    $location = <<<DESIMETER

          <option value="{$row['location']}" class="common_selector cities">{$row['location']}</option>

DESIMETER;
        echo $location;
  }
  
}





?>
<script src="js/form.js"> </script>
