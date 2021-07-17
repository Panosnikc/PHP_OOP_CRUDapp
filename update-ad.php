<?php

// Get the id of the property to update
$id = isset($_GET['property_id']) ? $_GET['property_id'] : die("ERROR: missing id.");

// Inlcude DB and objects/Classes
include_once 'config/Database.php';
include_once 'objects/Property.php';
include_once 'objects/PropertyType.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instatiate property & propertyType objects
$property = new Property($db);
$propertyType = new PropertyType($db);

// Set ID property of propertys/property to be edited
$property->property_id = $id; 

// Read the details of the propertys/product
$property->readSingle();

// Set page title
$page_title = "Update ad";
// Include header
include_once 'header_layout.php';

// Create a button that return back to index.php 
echo "<div class='right-button-margin' style=''>";
    echo "<a href='index.php' class='btn btn-outline-primary '>Home</a>";
echo "</div>";

// If the form was submitted
// Check if isset $_POST triggered & Processing form data when form is submitted
if($_POST) {

    $property->title = $_POST['title'];
    $property->description = $_POST['description'];
    $property->price = $_POST['price'];
    $property->postcode = $_POST['postcode'];
    $property->city = $_POST['city'];
    $property->rooms_number = $_POST['rooms_number'];
    $property->available_from = $_POST['available_from'];
    $property->image = $_POST['image'];
    $property->property_type_id = $_POST['property_type_id'];

    if($property->updatePost()) {
        echo "<div class='alert alert-success alert-dismissable'>";
            echo "Product was updated.";
        echo "</div>";
    } else{
        echo "<div class='alert alert-danger alert-dismissable'>";
            echo "Unable to update product.";
        echo "</div>";
    }
}
?>
<!-- Read single post/product form -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?property_id={$id}"); ?>" method="post">
  <div class="table-responsive">
    <table class="table table-hover table-bordered">
      <tr>
        <td>Title</td>
        <td><input type="text" name="title" class="form-control" value="<?php echo $property->title; ?>" /></td>
      </tr>
      <tr>
        <td>Description</td>
        <td>
		  <textarea name="description" class="form-control" rows="5" id="" value='<?php echo $property->description; ?>'  ><?php echo $property->description; ?></textarea>
        </td>
      </tr>
      <tr>
        <td>Price</td>
        <td><input type="text" name="price" class="form-control" value="<?php echo $property->price; ?>" /></td>
      </tr>
      <tr>
        <td>Post code</td>
        <td><input type="text" name="postcode" class="form-control" value="<?php echo $property->postcode; ?>" /></td>
      </tr>
      <tr>
        <td>City</td>
        <td><input type="text" name="city" class="form-control" value="<?php echo $property->city; ?>" /></td>
      </tr>
      <tr>
        <td>Number of rooms</td>
        <td><input type="text" name="rooms_number" class="form-control" value="<?php echo $property->rooms_number; ?>" /></td>
      </tr>
      <tr>
        <td>Available from</td>
        <td><input type="date" name="available_from" class="form-control" value="<?php echo $property->available_from; ?>" /></td>
      </tr>
      <tr>
        <td>Property type</td>
		
        <!-- The following code will list the categories in a drop-down. -->
        <td>
          <?php
          $stmt = $propertyType->read();

          // Put them in a select drop-down 
          echo "<select class='form-control' name='property_type_id'>";
            echo "<option>Please select...</option>";
            while($row_propertyType = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $property_type_id = $row_propertyType['property_type_id'];
              $property_type_name = $row_propertyType['name'];

              // Current categorory of the property/product must be selected
              if($property->property_type_id == $property_type_id) {
                echo "<option value='$property_type_id' selected >";
              } else{ 
                echo "<option value='$property_type_id'>";
              }
              echo "$property_type_name</option>";
            }
            echo "</select>";
          ?>
        </td>
      </tr>

      <tr>
        <td>Photo</td>
        <td><input type="text" name="image" class="form-control" value="<?php echo $property->image; ?>" /></td>
      </tr>

      <tr>
        <td></td>
        <td>
          <button type="submit" class="btn btn-success">Update</button>
		  <a href="index.php" class="btn btn-danger" >Cancel</a>
        </td>
      </tr>
    </table>
  </div>
</form>

<?php
// Include footer
include_once 'footer_layout.php';

?>