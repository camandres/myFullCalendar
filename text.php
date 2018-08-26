<?php


$conn = new PDO("mysql:host=" . "127.0.0.1:3307" . ";dbname=" . "company", "root", "");

//$conn->setAttribute(array(PDO::MYSQL_USE_BUFFERED_QUERY=>TRUE)); 


$sql = "SELECT COUNT(*) FROM events";
if ($res = $conn->query($sql)) {
//$conn->execute();
    /* Check the number of rows that match the SELECT statement */
    if ($res->fetchColumn() > 0) {

        /* Issue the real SELECT statement and work with the results */
        $sql = "SELECT * from events";

        foreach ($conn->query($sql) as $row) {
            print "Name: " .  $row['title'] . "\n";
        }
    }
    /* No rows matched -- do something else */
    else {
        print "No rows matched the query.";
    }
}
else die("Not query");

$res = null;
$conn = null;
?>
