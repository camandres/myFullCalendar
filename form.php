<html>
  <head>
    <script type="text/javascript" src="lib/jquery.min.js">
    </script>
    <script type="text/javascript" src="lib/jquery-ui.min.js">
    </script><link rel="stylesheet" type="text/css" href="lib/styles.css" />
    <link rel="stylesheet" type="text/css" href="lib/jquery-ui.css" />
    <script type="text/javascript" src="lib/moment.min.js">
    </script>
    <link href="lib/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="lib/bootstrap-datetimepicker.min.css">
    <script type="text/javascript"
            src="lib/bootstrap.min.js">
    </script>
    <script type="text/javascript"
            src="lib/bootstrap-datetimepicker.min.js">
    </script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js">
    </script>
    <!--
<link href="lib/bootstrap.css" rel="stylesheet"/>
<script src="lib/bootstrap.js"></script>
-->
    <title>Form
    </title>
  </head>
  <body>
    <?php
/// In order to use this script freely
/// you must leave the following copyright
/// information in this file:
/// All rights reserved.
include("connect.php");
include_once("events.php");
$database=new Database();
$conn=$database->getConnection();
if (isset($_GET["id"]))
$id = trim($_GET["id"]);
if(isset($id)) /// FOR UPDATE ONLY
{
$result_sngl = $conn->query("SELECT * FROM events WHERE id = '$id' ");
$mode="update";
}
else
{ $mode = "add"; 
$result_sngl=array("");
$event=new Events($conn);
$result_sngl[0]=get_object_vars($event);
}
?>
    </div>
  <?php 
foreach($result_sngl as $row_sngl)  
{
?>
  <h1> <?=($mode=="add") ? "Add new event to your schedule" : "Edit confirmed event" ?></h1>
  <form id="FormName" action="process.php" method="post" name="FormName">
    <div class="table">
      <div class="tableRow">
      	  <div class="tableColumn">
          <label for="title">Event Title
          </label>
        </div>
        <div class="tableColumn">
          <textarea style="width:100%" name="title" cols="15" rows="10"><?php
             if (isset($row_sngl)) echo stripslashes($row_sngl["title"]) 
          ?></textarea>
        </div>
      </div>
      <div class="tableRow">
      	  <div class="tableColumn">
          <label for="date">Start Date Time
          </label>
        </div>
        <div class="tableColumn" id="datepicker1" style="position:relative">
          <input name="startdate" id="startdate" style="width:100%" maxlength="123" type="text" value="<?php if (isset($row_sngl)) echo stripslashes($row_sngl["startdate"]) ?>">
        </div>
      </div>
      <div class="tableRow">
      	  <div class="tableColumn">
          <label for="date">End Date Time
          </label>
        </div>
        <div class="tableColumn" id="datepicker2" style="position:relative">
          <input name="enddate" id="enddate" style="width:100%" maxlength="123" type="text" value="<?php if (isset($row_sngl)) echo stripslashes($row_sngl["enddate"]) ?>">
        </div>
      </div>
      <div class="tableRow">
          <div></div>
      	  <div class="tableColumn" >
          <input name="" type="submit" value="<?=(isset($mode) && $mode=="update") ?  "Update" :  "Add" ?>">
          <input name="id" type="hidden" value="<?php  if (isset($row_sngl))  echo $row_sngl["id"] ?>">
          <input name="mode" type="hidden" value="<?php if (isset($mode)) echo $mode ?>">
        </div>
      </div>
    </div>
  </form>
  <?php } ?>
  <script type="text/javascript">
    $.datepicker.setDefaults({
      dateFormat: 'yyyy-mm-dd',
      timeformat: 'HH:mm:ss'
    }
                            );
    $( function() {
      $("#startdate").datetimepicker(
        {
          format: 'YYYY-MM-DD HH:mm:ss',
          toolbarPlacement: 'top',
  		  showClose: true
 }
      );
      $("#enddate").datetimepicker(
        {
          format: 'YYYY-MM-DD HH:mm:ss',
          toolbarPlacement: 'top',
  		  showClose: true 
        }
      );
      $(document).on( "change", "#startdate, #enddate", function() {
        $(this).datetimepicker('hide');
      }
                    );
    }
     );
  </script>
  </body>
</html>

