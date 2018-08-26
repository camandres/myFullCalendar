<?php
/// In order to use this script freely
/// you must leave the following copyright
/// information in this file:
/// Copyright 2018 www.turningturnip.co.uk
/// All rights reserved.

include("connect.php");
$result="No execution done";



$database=new Database();

$conn = $database->getConnection();
//print_r ($conn);


//$Event= new Events($conn);

$result_multi=$conn->query("select * from events");
//print_r($result_multi); die;

	if (isset($_POST["id"]))
	$id = trim($_POST["id"]);
	if (isset($_POST["mode"]))  $mode = trim($_POST["mode"]);
	
	if (isset($_GET["del_id"])) $del_id =  trim($_GET["del_id"]);

	if (isset($_POST["title"]))$title = trim($_POST["title"]);
	if (isset($_POST["startdate"])) $startdate = trim($_POST["startdate"]);
		if (isset($_POST["enddate"])) $enddate = trim($_POST["enddate"]);
if(isset($id) && $id!="") {
	/// UPDATE
	
	$result = $conn->query("UPDATE events
	SET  title = '$title',  startdate = '$startdate',  enddate = '$enddate'
	WHERE id = '$id' ");
	echo "Updating ($id)"; 
} elseif(isset($del_id)) {
	/// DELETE
	echo "Deleting";
	$result = $conn->query("DELETE FROM events WHERE id = '".$del_id."' ");
} elseif(isset($mode) && $mode == "add") {
	/// ADD
	echo "Inserting";
	$result = $conn->query("INSERT INTO events (id, title, startdate,enddate)
	VALUES ('', '$title', '$startdate','$enddate')");
}	


if(isset($result)) { echo " Successful <br><br><a href='index.php'>Main Manu</a>"; } else { echo "There has been an error!"; echo mysqli_error($conn); }

//$conn->close();
?>
