<?php

// Get ID, of the product/property to be edited
$id = isset($_GET['property_id']) ? $_GET['property_id'] : die("ERROR: missing id.");


// Include DB and objects files/Class
include_once "config/Database.php";
include_once "objects/Property.php";
include_once "objects/PropertyType.php";

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog property/properties object & categproperty type object
$property = new Property($db);
$propertyType = new PropertyType($db);

// Set ID property of the product/property to be edited
$property->property_id = $id;

// Get property/product
$property->readSingle();


// Set title page & include header page
$page_title = "Read property";
include_once "header_layout.php";

// Create a button that return back to index.php 
echo "<div class='right-button-margin' style=''>";
    echo "<a href='index.php' class='btn btn-outline-primary '>Home</a>";
echo "</div>";


// main
echo "<main class='container' style='margin-top:20px;'>".
"<div class='table-responsive'>".
   "<table class='table table-bordered table-hover '>".
     
     "<tr>".
       "<th>Title</th>".
       "<td>{$property->title}</td>".
     "</tr>".

     "<tr>".
      "<th>Description</th>".
      "<td>{$property->description}</td>".
     "</tr>".

     "<tr>".
       "<th>Price</th>".
       "<td>&#163;{$property->price}</td>".
     "</tr>".

     
     "<tr>".
       "<th>Address</th>".
       "<td>{$property->postcode},&nbsp{$property->city}</td>".
      "</tr>".

      "<tr>".
       "<th>Number of rooms</th>".
       "<td>{$property->rooms_number}</td>".
      "</tr>".
	  
	  "<tr>".
        "<th>Created</th>".
        "<td>{$property->created_at}</td>".
      "</tr>".
   
   
      "<tr>".
        "<th>Available from</th>".
        "<td>{$property->available_from}</td>".
      "</tr>".

     "<tr>".
       "<th>Photo</th>".
       "<td>{$property->image}</td>".
     "</tr>"; 

    echo "<tr>";
      echo "<th>Property Type</th>";
      echo "<td>{$property->property_type_name}</td>";
    echo "</tr>"; 
  echo "</table>";
  echo "</div>"; 
echo "</main>";


// Include footer
include_once "footer_layout.php";

?>