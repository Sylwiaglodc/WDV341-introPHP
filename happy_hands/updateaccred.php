<?php
session_start();
//Only allow a valid user access to this page
if (!$_SESSION['validUser']) {
	header('Location: login.php');
}

$updateRecID = $_GET['recId'];

$organization = "";
$yearaccred = "";
$level = "";
$valid_form = false;

if (isset($_POST["submit"]))  {
	$organization = $_POST["organization"];
	$yearaccred = $_POST["yearaccred"];
	$level = $_POST["level"];


	//Begin data validation!!!! 
	
    if ($organization == "") 	
        $error_message .= " Please enter organization name";

    if ($yearaccred == "") 
        $error_message .= " Please enter year of accredidation";

    if ($level == "") 
        $error_message .= " Please enter level of accredidation";

	if ($error_message == "")
		$valid_form = true;

	if ($valid_form) {	//process the update
		try {
			require 'dbConnect.php';
			$sql = "UPDATE accreds SET ";
			$sql .= "organization='$organization',";
			$sql .= "yearaccred='$yearaccred',";
			$sql .= "level='$level',";
			$sql .= "WHERE accred_id='$updateRecID'";
			
			//PREPARE the SQL statement
			$stmt = $conn->prepare($sql);
				
			//EXECUTE the prepared statement
			$stmt->execute();	
				
			$message = "Accredidation has been Updated.";
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

		$sql = "SELECT organization, yearaccred, level FROM accreds WHERE accred_id=$updateRecID";
		 //PREPARE the SQL statement
		 $stmt = $conn->prepare($sql);
		  
		 //EXECUTE the prepared statement
		 $stmt->execute();		
		 
		 //RESULT object contains an associative array
		 $stmt->setFetchMode(PDO::FETCH_ASSOC);	
		 
		 $row=$stmt->fetch(PDO::FETCH_ASSOC);	 
			   
		 $organization=$row['organization'];
		 $yearaccred=$row['yearaccred'];
		 $level=$row['level'];		

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
body{
            background-color: #A0DAA9;
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
<h1 class="header">Happy Hands Daycare Accredidation Section</h1>
			<h2 class="logindesc">Please update Accredidation below</h2>
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
        <form id="updateaccred" name="updateaccred" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . "?id=$updateID"; ?>">
        	<fieldset>
              <legend>Update Accredidation</legend>
              <p>
                <label for="organization">Organization Name: </label>
                <input type="text" name="organization" id="organization" value="<?php echo $organization;  ?>" /> 
                <span class="errMsg"> <?php echo $error_message; ?></span>
              </p>
              <p>
                <label for="yearaccred">Year of accredidation:</label>
				<input type="text" name="yearaccred" id="yearaccred" value="<?php echo $yearaccred;  ?>" />
                <span class="errMsg"><?php echo $error_message; ?></span>                
              </p>
              <p>
                <label for="level">Level of accredidation: </label>
                <input type="text" name="level" id="level" value="<?php echo $level;  ?>" />
                <span class="errMsg"><?php echo $error_message; ?></span>                      
              </p>
              
          </fieldset>
         	<p>
            	<input type="submit" name="submit" id="submit" value="Update"/>
            	<a href="accreditations.php"><button type='button'>Cancel</button></a>
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