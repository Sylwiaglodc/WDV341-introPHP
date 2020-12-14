<?php
session_start();
//Only allow a valid user access to this page
if (!$_SESSION['validUser']) {
	header('Location: login.php');
}

$updateRecID = $_GET['recId'];

$schedule_time = "";
$schedule_name = "";
$schedule_desc = "";
$valid_form = false;

if (isset($_POST["submit"]))  {
	$schedule_time = $_POST["schedule_time"];
	$schedule_name = $_POST["schedule_name"];
	$schedule_desc = $_POST["schedule_desc"];


	//Begin data validation!!!! 
	
    if ($schedule_time == "") 	
        $error_message .= " Please enter schedule time";

    if ($schedule_name== "") 
        $error_message .= " Please enter schedule name";

    if ($schedule_desc == "") 
        $error_message .= " Please enter schedule description";

	if ($error_message == "")
		$valid_form = true;

	if ($valid_form) {	//process the update
		try {
			require 'dbConnect.php';
			$sql = "UPDATE schedule SET ";
			$sql .= "schedule_time='$schedule_time',";
			$sql .= "schedule_name='$schedule_name',";
			$sql .= "schedule_desc='$schedule_desc',";
			$sql .= "WHERE schedule_id='$updateRecID'";
			
			//PREPARE the SQL statement
			$stmt = $conn->prepare($sql);
				
			//EXECUTE the prepared statement
			$stmt->execute();	
				
			$message = "Schedule has been Updated.";
		}
		catch(PDOException $e) {
			$message = "There has been a problem. The system administrator has been contacted. Please try again later.";

			error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
			error_log(var_dump(debug_backtrace()));	
		
			header('Location:error_page.php');	//sends control to a User friendly page					
			}

	}
	else	{		// not valid form

	}
}
else {		// not updated yet
	try {
		require 'dbConnect.php';

		$sql = "SELECT schedule_time, schedule_name, schedule_desc FROM schedule WHERE schedule_id=$updateRecID";
		 //PREPARE the SQL statement
		 $stmt = $conn->prepare($sql);
		  
		 //EXECUTE the prepared statement
		 $stmt->execute();		
		 
		 //RESULT object contains an associative array
		 $stmt->setFetchMode(PDO::FETCH_ASSOC);	
		 
		 $row=$stmt->fetch(PDO::FETCH_ASSOC);	 
			   
		 $schedule_time=$row['schedule_time'];
		 $schedule_name=$row['schedule_name'];
		 $schedule_desc=$row['schedule_desc'];		

	 }
	 catch(PDOException $e) {
		$message = "There has been a problem. The system administrator has been contacted. Please try again later.";

		error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
		error_log(var_dump(debug_backtrace()));	
	
		header('Location:error_page.php');	//sends control to a User friendly page					
		}
	
}
?>


<!doctype html>
<html>
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
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
   
    <meta name="description" content="Home Page for Happy Hands Daycare"> 
    <meta name="keywords" content=" Daycare, Child Care">
    <title>Happy Hands Daycare</title>
    <!-- Sylwia Glod, 11-28-2019 -->  
<style>
body {
		background-color: #98B4D4;
    } 

		form {
      border: 2px solid black;
      text-align: center;
      width: 70%;
	  margin-top:50px;
      margin-left: 15%;
      margin-right: 15%;
      margin-bottom:20px;
      padding-bottom:20px;
    }	

	.logindesc{
		text-align:center;
	}	
</style>

</head>

<body>
<h1 class="header">Happy Hands Daycare Schedule Section</h1>
			<h2 class="logindesc">Please update Schedule below</h2>
            <img src="images/gautam-arora-78Ae6N7rNvI-unsplash.jpg" title="empty classroom" alt="empty classroom" class="img-fluid">
            </div>
        </header>
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
        <a class="nav-link" href="schedule.php">Schedule</a>
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
<div id="container">
    
    <main>
    
        
		<?php
            //If the form was submitted and valid and properly put into database display the INSERT result message
			if($valid_form)
			{
				?>
			<h1><?php echo $message ?></h1>
				
				<?php
			}
			else	//display form
			{
        ?>
        <form id="updatesched" name="updatesched" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?id=$updateID"; ?>">
        	<fieldset>
              <legend>Update Schedule</legend>
              <p>
                <label for="schedule_time">Schedule Time: </label>
                <input type="text" name="schedule_time" id="schedule_time" value="<?php echo $schedule_time;  ?>" /> 
                <span class="errMsg"> <?php echo $error_message; ?></span>
              </p>
              <p>
                <label for="schedule_name">Schedule Name:</label>
				<input type="text" name="schedule_name" id="schedule_name" value="<?php echo $schedule_name;  ?>" />
                <span class="errMsg"><?php echo $error_message; ?></span>                
              </p>
              <p>
                <label for="schedule_desc">Schedule Description: </label>
                <textarea name="schedule_desc" id="schedule_desc" maxlength="700"rows="4" cols="50"><?php echo $schedule_desc; ?></textarea>
                <span class="errMsg"><?php echo $error_message; ?></span>                      
              </p>
              
          </fieldset>
         	<p>
            	<input type="submit" name="submit" id="submit" value="Update"/>
            	<a href="schedule.php"><button type='button'>Cancel</button></a>
        	</p>  
      </form>
        <?php
			}//end else
        ?>    	
	</main>
    
</div>
<div class="footer2">
        <p> Happy Hands • 3450 Regency Lane, Carmel IN  </p>    
            </div>
            <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@element5digital?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Element5 Digital"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Element5 Digital</span></a>
</footer>  
<script src="http://code.jquery.com/jquery-latest.min.js"></script> <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>    
</body>
</html>