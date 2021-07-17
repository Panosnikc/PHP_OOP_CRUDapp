<?php
// Inlcude DB and objects files/Classes (where can be DB connect, class User, Class Category etc.)
include_once "config/Database.php";
include_once "objects/Property.php";
include_once "objects/PropertyType.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate Products/property & PropertyType objects
$property = new Property($db);
$property_type = new PropertyType($db);

// Query property/properties, Blog property query
// OR $result = $property->readALL();
$stmt = $property->readAll();

// Get row count
// OR $num = $result->rowCount();
$num = $stmt->rowCount();

// Set page title and include header_layout.php
$page_title = "Properties";
include_once "index_header_layout.php";

  // Delete record from table
  if(isset($_GET['deleteId']) && !empty($_GET['deleteId'])) {
    $deleteId = $_GET['deleteId'];
    $property->deleteRecord($deleteId);
  }

/****************************** */

if($num > 1) {

  echo '<div class="content">';

  // messages

    if (isset($_GET['msg_create']) == "create") {
      echo "<div class='alert alert-success alert-dismissible' style='width:510px;margin:auto;margin-bottom:20px;margin-top:20px;'>
              <button type='button' class='close' data-dismiss='alert'>&times;</button>
              AD created successfully.
            </div>";
    }

    if (isset($_GET['msg_delete']) == "delete") {
      echo "<div class='alert alert-success alert-dismissible' style='width:510px;margin:auto;margin-bottom:20px;margin-top:20px;'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            AD deleted successfully.
          </div>";  
    }          
  While($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    extract($row);
      
      echo '<div class="clearfix" style="width:510px;margin:auto;margin-bottom:20px;margin-top:20px;" id="clearfix">';
        echo "<a href='read-ad.php?property_id={$property_id}' style=''>";
        
        echo '<div style="overflow:hidden;margin-bottom:4px;">';

            echo "<h2 class='list-result-header' style='' >". ucfirst($title) . "</h2>";
            echo "<h2 class='list-price' style=''>&#163;{$price}pcm</h2>";
            echo '<div class="" style="float:left;width:100%;">';
			
            echo "<i class='list-location' style=''>" . strtoupper($postcode) . ", &nbsp" . ucfirst($city) . "</i>".
				"</div>";
         echo '</div>';
        
        echo '<div class="list-img" style="">';
          echo '<img class="" style="" src="double-room.jpg" alt="No photos" width="120" height="120"	height="auto"  />';
        echo "</div>";
          
          
        echo '<div class="list-content" style="margin-left:134px;margin-right:10px;">';
          
          echo '<div class="list-hr" style="">';
            echo '<div class="list-content-text" style="height:70px;">';
              echo '<p class="description">';
                echo ucfirst($description);
              echo '</p>';
            echo "</div>";
          
            echo '<div style="padding-left:10px;" class="list-publish-date">';
			
			// availableDate format and display
			$availableDate = DateTime::createFromFormat('Y-m-d', $available_from);
			$availableDateFormat =  $availableDate->format("d F");
			
			
			// created_at format and display
			$createdDate = DateTime::createFromFormat('Y-m-d H:i:s', $created_at);
			$createdDateFormat =  $createdDate->format("d F Y");

                echo "<i>Posted {$createdDateFormat} | &nbsp; Available " . $availableDateFormat . "</i>";
            echo "</div>";
        echo "</div>"; // End of list-content              
        echo '<div class="list-btns" style="padding-left:0px;">';
          echo "<a href='read-ad.php?property_id={$property_id}' class='list-btn'>Read</a>";
          echo "<a href='update-ad.php?property_id={$property_id}' class='list-btn' style='margin-left:24px;'>Edit</a>";
          ?>
          <a href="index.php?deleteId=<?php echo $property_id?>" class='mybtn danger' style='margin-left:24px;padding:2px 16px ;' onclick="return confirm('Are you sure want to delete this record')">delete</a>         
        <?php
          echo "</div>";
        // --
        echo "</div>"; 

       echo "</a>";
      echo "</div>";
  } // End while

  echo "</div>"; // End container

} 

// Include footer page
include_once "footer_layout.php";
?>