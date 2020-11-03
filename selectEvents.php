<?php

try{
    require "dbConnect.php";
    $sql= " SELECT event_id, event_name, event_description, event_presenter, event_date, event_TIME FROM wdv341_events";

    $stmt = $conn->prepare($sql);

    $stmt->execute();

    $stmt->setFetchmode(PDO::FETCH_ASSOC);
}

catch(PDOEXCEPTION $e)
{

    $message= "There has been an issue, administrator has been contacted.";

    error_log($e->getmessage());
    error_log($e->getLine());
    error_log(var_dump(debug_backtrace()));
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Select events Assignment</title>
</head>
<body>
<div class="container">

    <header>
        <h1>Display events and Select</h1>
    </header>
<main>
        <h1>Display available Events!</h1>

        <?php 
            while( $row=$stmt->fetch(PDO::FETCH_ASSOC)){
		?> 

        <div class="eventBlock">
                <div class="row">
                    <span class="eventID">ID:<?php echo $row['event_id'];?></span>
                </div>
                <div class="row">
                    <span class="eventName">NAME:<?php echo $row['event_name'];?></span>
                </div>
                <div class="row">
                    <div class="row">
                    <span class="eventDescription">Description:<?php echo $row['event_description'];?></span>
                </div>
                <div class="col-1-2">
                <span class="eventPresenter">Description:<?php echo $row['event_presenter'];?></span>
                </div>
                <div class="col-1-2">
                <span class="eventDate">Description:<?php echo $row['event_date'];?></span>
                </div>
                <div class="col-1-2">
                <span class="eventtime">Description:<?php echo $row['event_TIME'];?></span>
                </div>
            </div>
        </div>

         <?php
            }
         ?>
</main>
</body>
</html>
