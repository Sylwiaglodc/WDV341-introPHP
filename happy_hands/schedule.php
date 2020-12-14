<?php
//setting up session for page
session_start();
if($_SESSION['validUser'] == "yes") {

$timeErrMsg = "";
$nameErrMsg = "";
$descErrMsg = "";

$validForm = false;

$intime = "";
$inname = "";
$indesc = "";


/*	FORM VALIDATION PLAN
	FIELD NAME	VALIDATION TESTS & VALID RESPONSES
	inName		Required Field		May not be empty
	inSpec	    Required Field	    May not be empty
    inAbout     Required Field	    May not be empty

*/

if(isset($_POST["submitForm"]))
{
	//The form has been submitted & needs to be processed
  $intime = $_POST['time'];
	$inname= $_POST['name'];
	$indesc = $_POST['desc'];

  function validateTime()
{
	global $intime, $validForm, $timeErrMsg;		//Use the GLOBAL Version of the variables
	$timeErrMsg = "";								//Clearing the error message.
	if($intime=="")
	{
		$validForm = false;					//Invalid name so the form is invalid
		$timeErrMsg = "Time is required";	//Error message for this validation
	}
}


	function validateName()
	{
		global $inname, $validForm, $nameErrMsg;		//Use the GLOBAL Version of the variables
		$nameErrMsg = "";								//Clear the error message.
		if($inname=="")
		{
			$validForm = false;					//Invalid name so the form is invalid
			$nameErrMsg = "Name is required";	//Error message for this validation
		}
	}

	function validateDesc()
	{
		global $indesc, $validForm, $descErrMsg;		//Use the GLOBAL Version of the variables
		$descErrMsg = "";								//Clear the error message.
		if($indesc=="")
		{
			$validForm = false;					//Invalid name so the form is invalid
			$descErrMsg = "Description is required";	//Error message for this validation
		}
	}


	$validForm = true;					//Set form flag/switch to true.  Assumes a valid form so far

		validateTime();
		validateName();
		validateDesc();

		if($validForm)
		{
			$message = "Accredidation has been submitted. Getting ready to add to the database.";

			try {

				require 'dbConnect.php';	//CONNECT to the database

				//Create the SQL command string
				$sql = "INSERT INTO schedule (";
				$sql .= "schedule_time, ";
				$sql .= "schedule_name, ";
				$sql .= "schedule_desc ";
				$sql .= ") VALUES (:time, :name, :desc)";

				//PREPARE the SQL statement
				$stmt = $conn->prepare($sql);

				//BIND the values to the input parameters of the prepared statement
				$stmt->bindParam(':time', $intime);
				$stmt->bindParam(':name', $inname);
				$stmt->bindParam(':desc', $indesc);


				//EXECUTE the prepared statement
				$stmt->execute();

				$message = "SCHEDULE ITEM HAS BEEN ADDED, THANKS!";
			}

			catch(PDOException $e)
			{
				$message = "There has been a problem. The system administrator has been contacted. Please try again later.";

				error_log($e->getMessage()); //Delivers a developer defined error message to the PHP log file at c:\mampp/php\logs\php_error_log
				error_log(var_dump(debug_backtrace()));
			    //Clean up any variables or connections that have been left hanging by this error.
				
			}

		}

    else
		{
      $message = "Please fill out each field on the form!";
    }
	}

	else
	{
		//The form has not seen by the user.  Display the form so
		//the user can enter their data.
		$message = "Please enter schedule information on the form!";
	}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Cutive+Mono|Darker+Grotesque|Open+Sans|Poiret+One|Shadows+Into+Light+Two|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
    <link href="layout.css"  rel="stylesheet" type="text/css"/>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="layout.css" "js.js" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <title>Happy Hands Daycare</title>
    <meta name="description" content="Home Page for Happy Hands Daycare">
    <meta name="keywords" content=" Daycare, Child Care">
    <!-- Sylwia Glod, 11-28-2019 -->
    <style>

.navbar{
    background-color: #001933;  
}    

    .error {
      color: red;
    }

    form {
      border: 2px solid black;
      text-align: center;
      width: 70%;
      margin-left: 15%;
      margin-right: 15%;
      margin-bottom:20px;
      padding-bottom:20px;
    }
    label {
      border-radius:5px;
    }
h1{
  font-size:30px;
}

    h3 {
        margin:50px;
        text-align:center;
        color:white;
    }

    body {
		background-color: #98B4D4;
    }
    .logindesc{
	font-family:"Lucida Console", Monaco, monospace	;
	font-size:20px;
	text-align:center;
    }
    input[type=submit], input[type=reset]{
        width:130px;
        background-color:white;
        border-radius:5px;
    }


    </style>
  </head>
  <body>
  <header>
             <div class="container">
			<h1 class="header">Happy Hands Daycare Insert Schedule Item Section</h1>
			<h2 class="logindesc">Please use the form below to enter a new schedule item into the system. </h2>
            <img src="images/gautam-arora-78Ae6N7rNvI-unsplash.jpg" title="empty classroom" alt="empty classroom" class="img-fluid">
            
        </header>
        <div class="container">      
<nav class="mb-1 navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand" href="index.html">Happy Hands</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
    aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="instructor.php">Instructors
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="accreditations.php">Accreditations</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="displaysched.php">Schedule</a>
      </li>
      
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar">
        <a class="nav-link p-0" href="#">
        <a class="nav-link" href="logout.php">Logout</a> 

        </a>
      </li>
    </ul>
    </div>
           </nav>   
    <h3><?php echo $message; ?></h3>
    <form method="post" action="schedule.php" name = "schedule" id="schedule">
      <h3>Add Schedule Item</h3>

      <label for="time">Schedule time:</label>
      <td class="error"><?php echo "$timeErrMsg"; ?></td><br>
        <input type="time" id="time" name="time"
       min="00:00" max="23:00" required><br><br>

      <label for="name"><p><strong>Schedule Item Name:</strong></p></label>
      <td class="error"><?php echo "$nameErrMsg"; ?></td><br>
      <input type = "text" id="name" name="name"></input><br><br>


      <label for="desc"><p><strong>Instructor About:</strong></p></label>
      <td class="error"><?php echo "$descErrMsg";  ?></td><br>
      <textarea id ="desc" name="desc" cols="20" rows="10"></textarea><br><br>

      <input type="submit" id="submitForm" name="submitForm" value="Submit"></input>
      <input type="reset" id="reset" name="reset" value="Reset"></input>
     


</div>
<footer>
                 
            <div class="footer2">
        <p> Happy Hands • 3450 Regency Lane, Carmel IN  </p>    
            </div>
            <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@element5digital?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Element5 Digital"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Element5 Digital</span></a>
</footer>  
  </body>
</html>
<?php
}
else {
	header('location: login.php');
}
?>