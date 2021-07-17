<?php
  class Property {
    // DB connection & table name
    private $conn;
    private $table_name ='properties';

    // Post Properties
    public $property_id;
    public $title;
    public $description;
    public $price;
    public $postcode;
    public $city;
    public $image;
    public $rooms_number;
    public $available_from;
    public $property_type_id;
    //public $category_id;
    //public $property_type_name;
    public $created_at;

    // Constructor with DB
    public function __construct($db) {
        $this->conn = $db;
    }

    // Create Record/Post
     function create() {
        // Create query
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                    title=:title, 
                    price=:price, 
                    description=:description, 
                    property_type_id=:property_type_id, 
                    postcode=:postcode,
                    city=:city,
                    image=:image,
                    rooms_number=:rooms_number,
                    available_from=:available_from";
        
        // Prepare statement
        $stmt = $this->conn->prepare($query);

        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->property_type_id = htmlspecialchars(strip_tags($this->property_type_id));
        $this->postcode = htmlspecialchars(strip_tags($this->postcode));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->rooms_number = htmlspecialchars(strip_tags($this->rooms_number));
        $this->available_from = htmlspecialchars(strip_tags($this->available_from));


        // bind values 
        $stmt->bindParam(":title", $this->title);
        $stmt->bindParam(":price", $this->price);
        $stmt->bindParam(":description", $this->description);
        $stmt->bindParam(":property_type_id", $this->property_type_id);
        $stmt->bindParam(":postcode", $this->postcode);
        $stmt->bindParam(":city", $this->city);
        $stmt->bindParam(":image", $this->image);
        $stmt->bindParam(":rooms_number", $this->rooms_number);
        $stmt->bindParam(":available_from", $this->available_from);

         // Attempt to execute the prepared statement
         if($stmt->execute()) {
        //   return true; 
            header("Location:index.php?msg_create=create");
        } else {
            return false;
        }

    }

    // Update post
    public function updatePost() {
        // Create query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    title = :title,
                    postcode = :postcode,
                    description = :description,
                    price = :price,
                    city = :city,
                    rooms_number = :rooms_number,
                    available_from = :available_from,
                    image = :image,
                    property_type_id = :property_type_id
                WHERE
                    property_id = :property_id";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Clean data
        $this->title = htmlspecialchars(strip_tags($this->title));
        $this->postcode = htmlspecialchars(strip_tags($this->postcode));
        $this->description = htmlspecialchars(strip_tags($this->description));
        $this->price = htmlspecialchars(strip_tags($this->price));
        $this->city = htmlspecialchars(strip_tags($this->city));
        $this->rooms_number = htmlspecialchars(strip_tags($this->rooms_number));
        $this->available_from = htmlspecialchars(strip_tags($this->available_from));
        $this->image = htmlspecialchars(strip_tags($this->image));
        $this->property_id = htmlspecialchars(strip_tags($this->property_id));
        $this->property_type_id = htmlspecialchars(strip_tags($this->property_type_id));

        // Binde data
        $stmt->bindParam(':title', $this->title);
        $stmt->bindParam(':postcode', $this->postcode);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':price', $this->price);
        $stmt->bindParam(':city', $this->city);
        $stmt->bindParam(':rooms_number', $this->rooms_number);
        $stmt->bindParam(':available_from', $this->available_from);
        $stmt->bindParam(':image', $this->image);
        $stmt->bindParam(':property_id', $this->property_id);
        $stmt->bindParam(':property_type_id', $this->property_type_id);


        // Execute query
       if($stmt->execute()) {
           return true;
       } else{
           return false;
       }

    } 

    // Method readSingle()
    public function readSingle() {
        // Create query
        $query = "SELECT 
                t.name as property_type_name,
                p.property_id,
                p.property_type_id,
                p.title,
                p.description,
                p.postcode,
                p.price,
                p.image,
                p.city,
                p.rooms_number,
                p.available_from,
                p.created_at
            FROM 
                " . $this->table_name . " p
            LEFT JOIN
                property_type  t ON p.property_type_id = t.property_type_id
            WHERE p.property_id = ?
            LIMIT 0,1";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Bind ID, Bind parameter to property_id, 
        $stmt->bindParam(1, $this->property_id);

        // Execute query, 
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        // Set properties
        $this->title = $row['title'];
        $this->description = $row['description'];
        $this->postcode = $row['postcode'];
        $this->price = $row['price'];
        $this->property_type_id = $row['property_type_id'];
        $this->city = $row['city'];
        $this->rooms_number = $row['rooms_number'];
		$this->created_at = $row['created_at'];
        $this->available_from = $row['available_from'];
        $this->property_type_name = $row['property_type_name'];

    } // End of fuction readSingle() 

    /* Method readAll()  */
    public function readAll() {
        // Create query
        $query = "SELECT 
            t.name as property_type_id, 
            p.property_id,
            p.title,
            p.description,
            p.postcode,
            p.price,
            p.image,
            p.city,
            p.rooms_number,
            p.available_from,
            p.created_at
          FROM 
            " . $this->table_name . " p 
          LEFT JOIN
            property_type t ON p.property_type_id = t.property_type_id
          ORDER By
            p.created_at DESC";

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    } 

  
    /* Method delete() */ 
    // delete funtion
    //  https://www.webscodex.com/2020/10/php-crud-add-edit-delete-view.html 
    public function deleteRecord($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE property_id = '$id'";
        $stmt = $this->conn->query($query);
        if ($stmt == true) {
            header("Location:index.php?msg_delete=delete"); // Location:index.php?msg3=delete
        } else {
            echo "Record does not delete try again";
        }
    }

    // delete 2
    public function deleteRecord2($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE property_id = '$id'";
        
        if($stmt = $this->conn->prepare($query)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(1, $id);
            
            // Set parameters
            //$param_id = trim($_POST["id"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Records deleted successfully. Redirect to landing page
                header("Location:index.php?msg3=delete");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
}
?>
