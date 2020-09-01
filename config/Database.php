<?php 
// Database class
class Database {
	// DB params
	private $host = 'localhost';
	private $db_name = 'rentblog';
	private $username = 'root';
	private $password = '';
	public $conn;
	
	// DB connect
	public function connect() {
		$this->conn = null;
		
		try {
			$this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name . ';charset=utf8', $this->username, $this->password);
			// check if something gone wrong and what gone wrong in quering
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
		} catch(PDOException $e) {
			echo 'Connection Error: ' . $e->getMessage();
		}

		return $this->conn;
	}
}
?>
