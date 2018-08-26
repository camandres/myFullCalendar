<?php

 class Events{
 
    // database connection and table name
    public $conn;
    private $table_name ;
    private $sql; 

    // object properties
    public $id;
    public $title;
    public $startdate;   
    public $enddate;
    public function __construct($db){
	$this->conn = $db;
	$this->table_name=get_class($this);	
    }
 
    // used by select drop-down list
    function read(){
        //select all data
        $this->sql = "SELECT
                    id,title,eventdate
                FROM
                    " . $this->table_name . "
                ORDER BY
                    name";  

        //$stmt = $this->conn->prepare( $query );
        //$stmt->execute();
	//$stmt = $this->conn->prepare($query);
	//$result=$stmt->execute();

	
	//print $this->sql or die("error");
 	//$result=$this->conn->query($this->sql);	
	/*$stmt=*/// print_r ($this->conn);
	//return $this->conn->query($this->sql) or die("Error");
	//print "RESULT=";print_r($stmt);
	//$stmt->setFetchMode(PDO::FETCH_ASSOC);
     	//print "STMT=";print($this->conn->query($query));die;
        return $this->conn->query($sql);
    }
 
}
?>
