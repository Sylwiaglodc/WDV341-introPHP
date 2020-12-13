<?php
session_start();
//Only allow a valid user access to this page
if ($_SESSION['validUser'] !== "yes") {
	header('Location: index.php');
}
		
	//Setup the variables used by the page
		//field data
		$inst_name = "";
		$inst_spec = "";
		$inst_about = "";

		//error messages
		$nameErrMsg = "";
		$specErrMsg = "";
		$aboutErrMsg = "";

		
		$validForm = false;

		//mysql DATE stores data in a YYYY-MM-DD format
		$todaysDate = date("Y-m-d");		//use today's date as the default input to the date( )
		
		//The form needs to display the fields of the selected record
		$updateRecID = $_GET['recId'];	//Record Id to be updated
		//$updateRecId = 2;				//Hard code a key for testing purposes	
				
	if(isset($_POST["submit"]))
	{	
		//The form has been submitted and needs to be processed
		
		
		//Validate the form data here!
	
		//Get the name value pairs from the $_POST variable into PHP variables
		//This example uses PHP variables with the same name as the name atribute from the HTML form
		
		$inst_name = $_POST['instructor_name'];
		$inst_spec = $_POST['instructor_spec'];
		$inst_about = $_POST['instructor_about'];
		
		/*	FORM VALIDATION PLAN
		
			FIELD NAME		VALIDATION TESTS & VALID RESPONSES
			Event Title		Required Field		May not be empty
			Description				
			City			
			State			
			Email			Required Field		Format
			Begin Date		Required Field		Format
			End Date		Required Field		Format
		*/
		
		//VALIDATION FUNCTIONS		Use functions to contain the code for the field validations.  
			function validateName($inValue)
			{
				global $validForm, $nameErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$nameErrMsg = "";
				
				if($inValue == "")
				{
					$validForm = false;
					$nameErrMsg = "Name cannot be spaces";
				}
			}//end validateTitle()
			
			function validateSpec($inValue)
			{
				global $validForm, $specErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$specErrMsg = "";
				
				if($inValue == "")
				{
					$validForm = false;
					$specErrMsg = "Name cannot be spaces";
				}
			}//end validateDescription()
		
			function validateAbout($inValue)
			{
				global $validForm, $aboutErrMsg;		//Use the GLOBAL Version of these variables instead of making them local
				$aboutErrMsg = "";
				
				if($inValue == "")
				{
					$validForm = false;
					$aboutErrMsg = "Name cannot be spaces";
				}
			}//end validateCity()	
				
		
		//VALIDATE FORM DATA  using functions defined above
		$validForm = true;		//switch for keeping track of any form validation errors
		
		validateName($inst_name);
		validateSpec($inst_spec);
		validateAbout($inst_about);
		
		if($validForm)
		{
			$message = "All good";	
			
			try {
				
				require 'dbConnect.php';	//CONNECT to the database
				
				//Create the SQL command string
				$sql = "UPDATE instructors SET ";
				$sql .= "instructor_name='$inst_name', ";
				$sql .= "instructor_spec='$inst_spec', ";
				$sql .= "instructor_about='$inst_about', ";
				
				$sql .= "WHERE instructor_id='$updateRecID'";
				
				//PREPARE the SQL statement
				$stmt = $conn->prepare($sql);
				
				//BIND the values to the input parameters of the prepared statement
				/*
				$stmt->bindParam(':title', $event_title);
				$stmt->bindParam(':description', $event_description);				
				$stmt->bindParam(':city', $event_city);	
				$stmt->bindParam(':st', $event_st);
				$stmt->bindParam(':email', $event_email);				
				$stmt->bindParam(':beginDate', $event_begin_date);	
				$stmt->bindParam(':endDate',$event_end_date);				
				$stmt->bindParam(':setupDate',$todaysDate);
				*/
				
				//EXECUTE the prepared statement
				$stmt->execute();	
				
				$message = "The Event has been Updated.";
			}
			
			catch(PDOException $e)
			{
				$message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	
				error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
				error_log(var_dump(debug_backtrace()));
			
				//Clean up any variables or connections that have been left hanging by this error.		
			
				header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
			}

		}
		else
		{
			$message = "Something went wrong";
		}//ends check for valid form		

	}
	else
	{
		//Form has not been seen by the user.  display the form with the selected event information	
		try {
		  
		  require 'dbConnect.php';	//CONNECT to the database
		  
		  //mysql DATE stores data in a YYYY-MM-DD format
		  $todaysDate = date("Y-m-d");		//use today's date as the default input to the date( )
		  
		  //Create the SQL command string
		  $sql = "SELECT ";
		  $sql .= "instructor_name, ";
		  $sql .= "instructor_spec, ";
		  $sql .= "instructor_about, ";
		  $sql .= "FROM instructors ";
		  $sql .= "WHERE instructor_id=$updateRecID";
		  
		  //PREPARE the SQL statement
		  $stmt = $conn->prepare($sql);
		  
		  //EXECUTE the prepared statement
		  $stmt->execute();		
		  
		  //RESULT object contains an associative array
		  $stmt->setFetchMode(PDO::FETCH_ASSOC);	
		  
		  $row=$stmt->fetch(PDO::FETCH_ASSOC);	 
				
			$inst_name=$row['instructor_name'];
			$inst_spec=$row['instructor_spec'];
			$inst_about=$row['instructor_about'];
			
				 
	  }
	  
	  catch(PDOException $e)
	  {
		  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
	
		  error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
		  error_log($e->getLine());
		  error_log(var_dump(debug_backtrace()));
	  
		  //Clean up any variables or connections that have been left hanging by this error.		
	  
		  header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
	  }	
		
	}// ends if submit 
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Presenting Information Technology</title>
	<link rel="stylesheet" href="css/pit.css">  
  	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>    

	<script>
		$(function() {
			$('#event_begin_date').datepicker({dateFormat: "yy-mm-dd"});	//set datepicker format to yyyy-mm-dd to match database expected format
		} );
		
		$(function() {
			$('#event_end_date').datepicker({dateFormat: "yy-mm-dd"});		//set datepicker format to yyyy-mm-dd to match database expected format
		} );		
		
	</script>

    <script>
		function clearForm() {
			//alert("inside clearForm()");
			$('.errMsg').html("");					//Clear all span elements that have a class of 'errMsg'. 		
			$('input:text').removeAttr('value');	//REMOVE the value attribute supplied by PHP Validations
			$('textarea').html("");					//Clear the textarea innerHTML
		}
	</script>


</head>

<body>

<div id="container">

	<header>
    	<h1>Presenting Information Technology</h1>
    </header>
    
    <nav>
    
    	<ul>
        	<li><a href="index.html">Home</a></li>
            <li><a href="#">Presentations</a></li>
            <li><a href="displayPresenters.php">Presenters</a></li>
            <li><a href="addPresenter.php">Add Presenter</a></li>
        	<li><a href="#">Sign On</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
    	<div class="clearFloat"></div>
    
    </nav>
    
    <main>
    
        <h1>Setup a new Event</h1>
		<?php
            //If the form was submitted and valid and properly put into database display the INSERT result message
			if($validForm)
			{
        ?>
      <h1><?php echo $message ?></h1>
        
        <?php
			}
			else	//display form
			{
        ?>
        <form id="updateEventForm" name="updateEventForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?recId=$updateRecID"; ?>">
        	<fieldset>
              <legend>New Event</legend>
              <p>
                <label for="instructor_name">Event Title: </label>
                <input type="text" name="instructor_name" id="instructor_name" value="<?php echo $inst_name;  ?>" /> 
                <span class="errMsg"> <?php echo $nameErrMsg; ?></span>
              </p>
              <p>
                <label for="instructor_spec">Instructor spec:</label>
                  <textarea name="instructor_spec" id="instructor_spec" maxlength="700"><?php echo $inst_spec; ?></textarea>
                <span class="errMsg"><?php echo $specErrMsg; ?></span>                
              </p>
              <p>
                <label for="instructor_about">City: </label>
                <input type="text" name="instructor_about" id="instructor_about" value="<?php echo $inst_about;  ?>" />
                <span class="errMsg"><?php echo $aboutErrMsg; ?></span>                      
              </p>
              
          </fieldset>
         	<p>
            	<input type="submit" name="submit" id="submit" value="Add Event" />
            	<input type="reset" name="button2" id="button2" value="Clear Form" onClick="clearForm()" />
        	</p>  
      </form>
        <?php
			}//end else
        ?>    	
	</main>
    
	<footer>
    	<p>Copyright &copy; <script> var d = new Date(); document.write (d.getFullYear());</script> All Rights Reserved</p>
    
    </footer>



</div>
</body>
</html>