<?php
//Model-Controller Area.  The PHP processing code goes in this area. 

	//Method 1.  This uses a loop to read each set of name-value pairs stored in the $_POST array
	$tableBody = "";		//use a variable to store the body of the table being built by the script
	
	foreach($_POST as $key => $value)		//This will loop through each name-value in the $_POST array
	{
		$tableBody .= "<tr>";				//formats beginning of the row
		$tableBody .= "<td>$key</td>";		//dsiplay the name of the name-value pair from the form
		$tableBody .= "<td>$value</td>";	//dispaly the value of the name-value pair from the form
		$tableBody .= "</tr>";				//End this row
	} 
	
	
	//Method 2.  This method pulls the individual name-value pairs from the $_POST using the name
	//as the key in an associative array.  
	
	$inEventName = $_POST["eventName"];		//Get the value entered in the first name field
	$inPresenter = $_POST["presenter"];		//Get the value entered in the last name field
	$inDateForm = $_POST["dateForm"];			//Get the value entered in the school field
	$inTime = $_POST["time"];			//Get the value entered in the cool field
	$inDescription = $_POST["description"];				//Get the value entered in the compare field

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Event form Handler</title>
<style>

.border{
	border-style: solid;
    padding: 40px;
}
</style>
</head>

<body>
    <h1>Thank you for submitting your event details.</h1>
    <h2>We will have someone get in touch with you soon!</h2>

<div class="border">
<h3> <strong>Your submitted details: </strong></h3>
<p><strong>Name of event: </strong> <?php echo $inEventName; ?> </p>
<p><strong>Presenter Chosen:  </strong> <?php echo $inPresenter; ?></p>
<p><strong>Date of event: </strong>  <?php echo $inDateForm; ?></p>
<p><strong>Time of event: </strong>  <?php echo $inTime; ?></p>
<p><strong>Description:  </strong> <?php echo $inDescription; ?></p>
</div>
</body>
</html>