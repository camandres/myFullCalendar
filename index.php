<html>
  <head>
    <script type="text/javascript" src="lib/jquery.min.js">    </script>
    <script type="text/javascript" src="lib/jquery-ui.min.js"></script>
    <script type="text/javascript" src="lib/moment.min.js"></script>
    <link rel="stylesheet" type="text/css" href="lib/fullcalendar.css" />
    <link rel="stylesheet" type="text/css" href="lib/jquery-ui.css" />
    <link rel="stylesheet" type="text/css" src="lib/fullcalendar.js"/>
    <link rel="stylesheet" type="text/css" href="lib/fullcalendar.print.css" media="print"/>
    <link rel="stylesheet" type="text/css" href="lib/styles.css"/>
    <script type="text/javascript" src="lib/fullcalendar.min.js"></script>
    </script>
  <title>Events Manager
  </title>
  </head>
<body>
	<?php
	 $monthNames = Array("January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December");

 	$currentMonth= $monthNames[date('m')-1];

 ?>

<h1>E v e n t s &nbsp; &nbsp; C a l e n d a r</h1>
  <br><br>
  <h3><a href="form.php">Add Event to your agenda
  </a></h3>
  <br>
  <br>
  <?php
include_once("connect.php");
include_once("events.php");
// get database connection
$database = new Database();
$conn = $database->getConnection();
$Event= new Events($conn);
$result_multi=$Event->conn->query("select * from events");
$row="";
$i=0;
$events="";
foreach ($result_multi as $row_mlti)   {
// while ($row = $result_multi->fetch()) {
$id = $row_mlti["id"];
$title = stripslashes($row_mlti["title"]);
$eventdate = stripslashes($row_mlti["startdate"]);
$eventdate = stripslashes($row_mlti["enddate"]);
$events.="
{
title: '".$row_mlti['title']."',
start: '".$row_mlti['startdate']."',
end:   '".$row_mlti['enddate']."'
},
"; 
$row .= '<div class="tableRow">
<div class="tableColumn"><a href="form.php?id='.$id.'">'.$title.'</a></div>
<div class="tableColumn"><a href="process.php?del_id='.$id.'">Delete</a></div>
</div>';
++$i; }
?>
 <h2>Confirmed Events</h2>
  <div class="tableContainer">
  <div class="table">
  	 <div class="tableRow">
  	 	<div class="tableHead">Name</div>
       <div class="tableHead">Actions</div>  	 
  	 </div>
    <?php echo $row ?>
  </div>
  </div>
  <br><div id="calendar">  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        }
        ,
        defaultDate: $('#calendar').fullCalendar('today'),
        defaultView: 'month',
        editable: false,
        events: [
          <?= $events ?>
        ]
          }
          );
          }
          );
  </script>
   
</body>
</html>