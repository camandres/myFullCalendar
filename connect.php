

<?php
/// CONNECT TO DATABASE
class Database{
  
    // specify your own database credentials
    private $host = "127.0.0.1:3307";
    private $db_name = "company";
    private $username = "root";
    private $password = "";
    public $conn;
  
    // get the database connection
    public function getConnection(){
  
        $this->conn = null;
  
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
  
        return $this->conn;
    }
}

/*
$hostname="127.0.0.1:3307"; //// specify host, i.e. 'localhost'
$user="root"; //// specify username
$pass=""; //// specify password
$dbase="company"; //// specify database name
$conn = new mysqli($hostname, $user, $pass, $dbase);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/
?>
