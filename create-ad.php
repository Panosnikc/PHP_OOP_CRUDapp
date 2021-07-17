<?php
// Inlcude DB and objects files/Classes (where can be DB connect, class User, Class Category etc.)
include_once "config/Database.php";
include_once "objects/Property.php";
include_once "objects/PropertyType.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate Products/property & Category objects
$property = new Property($db);
$propertyType = new PropertyType($db);

// Set page title and include header_layout.php
$page_title = "Create ad";
include_once "header_layout.php";

// Create a button that send us to index.php
echo "<div class='right-button-margin' style=''>";
    echo "<a href='index.php' class='btn btn-outline-primary '>Home</a>";
echo "</div>";



?>
<?php

// Define variables and initialize with empty values
$title_err = $description_err = $postcode_err = $city_err = $rooms_num_err = $available_err = $price_err = $property_type_err = "";
 
// Processing form data when form is submitted
if($_POST) { 

    // Set product/property property values
    if (empty($property->title = $_POST['title'])) {
        $title_err = "The Title can't be empty.";
    } else {
        $property->title = htmlspecialchars(strip_tags(trim($_POST['title'])));
    }

    if (empty($property->description = $_POST['description'])) {
        $description_err = "The Description can't be empty.";
    } else {
        $property->description = htmlspecialchars(strip_tags(trim($_POST['description'])));
    }


    if (empty($property->postcode = $_POST['postcode'])) {
        $postcode_err = "The Post code can't be empty.";
    } else {
        $property->postcode = htmlspecialchars(strip_tags(trim($_POST['postcode'])));
    }

    // The number of rooms can be empty
    $property->rooms_number = $_POST['rooms_number'];

    if (empty($property->city = $_POST['city'])) {
        $city_err = "The City code be empty.";
    } else {
        $property->city = htmlspecialchars(strip_tags(trim($_POST['city'])));
    }

    if (empty($property->available_from = $_POST['available_from'])) {
        $available_err = "The Available Date can't be empty.";
    } else {
        $property->available_from = htmlspecialchars(strip_tags(trim($_POST['available_from'])));
    }

    // Validate price
    if(empty(trim($property->price = $_POST['price']))) {
        $price_err = "Please enter the items price.";
    } else{
        $property->price = $_POST['price'];
    }
    //$property->price = $_POST['price'];

    // Validate type of property
    if(empty($property->property_type_id = $_POST['property_type_id'])) {
        $property_type_err = "The Property type can't be empty.";
    } else {
        $property->property_type_id = htmlspecialchars(strip_tags(trim($_POST['property_type_id'])));  
    }

      if(empty($price_err) && empty($title_err) && empty($description_err) && empty($postcode_err) && empty($city_err) && empty($available_err) && empty($property_type_err)) {
        // create the product/property
        if($property->create()) {
            echo "<div class='alert alert-success'>Product was created.</div>";
        // if unable to create the product, tell the user
        } else{
            echo "<div class='alert alert-danger'>Unable to create product.</div>";
        }
      }
    }

?>

<!-- Create product html form ++ -->
<!-- HTML form for creating a product/property -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
  <div class="table-responsive">
    <table class="table table-hover tablebordered">

        <tr>
            <td>Title</td>
            <td>
                <input type='text' name='title' class='form-control' value='<?php echo $property->title; ?>'  />
                <span class="help-block text-danger" id=""><?php echo $title_err;?></span>
            </td>
        </tr>
        <tr>
            <td>Description</td>
            <td>
                <textarea name="description" class="form-control" rows="5" id="" value='<?php echo $property->description; ?>'  ></textarea>
                <span class="help-block text-danger" id=""><?php echo $description_err;?></span>
            </td>

        </tr>

        <tr>
            <td>Post code</td>
            <td>
              <input type='text' name='postcode' class='form-control' style='text-transform: uppercase;' value='<?php echo $property->postcode; ?>' maxlenght="7"  />
              <span class="help-block text-danger" id=""><?php echo $postcode_err;?></span>
            </td>

        </tr>

        <tr>
            <td>City</td>
            <td>
                <input type='text' name='city' class='form-control' value='<?php echo $property->city; ?>'  />
                <span class="help-block text-danger" id=""><?php echo $city_err;?></span>
            </td>
        </tr>

        <tr>
            <td>Number of Rooms</td>
                <td><input type='number' name='rooms_number' class='form-control' value='<?php echo $property->rooms_number; ?>'  required />
                <span class="help-block text-danger" id=""><?php echo $rooms_num_err;?></span>
            </td>
      
        </tr>
        
        <tr>
            <td>Available from</td>
            <td>
                <input type='date' name='available_from' class='form-control' value='<?php echo $property->available_from; ?>'  />
                <span class="help-block text-danger" id=""><?php echo $available_err;?></span>
            </td>
        </tr>

        <tr>
            <td>Price</td> 
            <td><input type="number" name='price' class='form-control' step="1" value='<?php echo $property->price; ?>'  />
                <span class="help-block text-danger" id=""><?php echo $price_err;?></span>
            </td>
        </tr>

                <tr>
                    <td>Property Type</td>
                <td>    <?php
        // read the product categories from the database
        $stmt = $propertyType->read();
        
        // put them in a select drop-down
        echo "<select class='form-control' name='property_type_id'>";
            echo "<option>Select property type...</option>";
        
            while ($row_propertyType = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row_propertyType);
                echo "<option value='{$property_type_id}'>{$name}</option>";
            }
        
        echo "</select>";
        ?>
        <span class="help-block text-danger" id=""><?php echo $property_type_err; ?></span>
        </td>
        </tr>

        <tr>
            <td>Photo</td>
            <td><input type='text' name='image' class='form-control' /></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-success">Create</button>
				<a href="index.php" class="btn btn-danger" >Cancel</a>
            </td>
        </tr>
    </table>
  </div>
</form>

<?php

// Footer
include_once "footer_layout.php";

?>