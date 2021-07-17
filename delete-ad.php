<?php

// Declare var $id and intitilize it with property_id if exist
$id = isset($_GET['property_id']) ? $_GET['property_id'] : die("ERROR: missing id. property id");
  

    // Include DB & objects
    include_once "config/Database.php";
    include_once "objects/Property.php";

    // Instantiate DB & connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate post 
    $property = new Property($db);

    // Set ID to update
    $property->property_id = $_GET['property_id'];
 	//echo "<h2>" . $property->property_id . "</h2>";

    // Delete record from table
  if(isset($_GET['property_id']) && !empty($_GET['property_id'])) {
    $deleteId = $_GET['property_id'];
    $property->deleteRecord($deleteId);
  }


// Set page title
$page_title = "Delete ad";
// Include header
include_once 'header_layout.php';

?>

<!-- Read single property/product form -->
<!-- <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?property_id={$id}"); ?>" method="post"> -->
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
      
      <tr>
        <td><p>Are you sure you want to delete this record?</p><br><p></td>
        <td>
          <button type="submit" class="btn btn-danger">Delete</button>
          <!-- <a href="index.php" class="btn btn-primary" >Cancel</a> -->
                  
          <a href="delete-ad.php?property_id=<?php echo $property_id?>" style="color:red" onclick="confirm('Are you sure want to delete this record')">
              <i class="fa fa-trash" aria-hidden="true"></i>
            delete</a>         
        
        </td>
      </tr>

    </table>
  </div>
<!-- </form> -->

<?php
// Include footer
include_once 'footer_layout.php';

?>
