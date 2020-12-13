<?php 
session_cache_limiter('none');			
session_start();
 

	$message = "";
	$errMessage = ""; 
 
	if ($_SESSION['validUser'] == "yes")				
	{
		//User is already signed on.  Skip the rest.
		$message = "Welcome Back!";		
	}
	else
	{
		if (isset($_POST['submitLogin']) )			
		{
			$inUsername = $_POST['loginUsername'];	
			$inPassword = $_POST['loginPassword'];	

			try {
			  
			  require 'dbConnect.php';	//CONNECT to the database
			  
			  
			  $todaysDate = date("Y-m-d");		
			  
			  //Create the SQL command string
              $sql= " SELECT event_user_name, event_user_password FROM user_event
              WHERE event_user_name = :username  AND event_user_password = :password";

//echo "Sql Command: " . $sql;

			  //PREPARE the SQL statement
			  $stmt = $conn->prepare($sql);
			  
			  //BIND the values to the input parameters of the prepared statement
			  $stmt->bindParam(':username', $inUsername);
			  $stmt->bindParam(':password', $inPassword);
							  			  
			  //EXECUTE the prepared statement
			  $stmt->execute();		
			  
			  //RESULT object contains an associative array
			  $stmt->setFetchMode(PDO::FETCH_ASSOC);
		  }
		  
		  catch(PDOException $e)
		  {
			  $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
		
			  error_log($e->getMessage());			
			  error_log($e->getLine());
			  error_log(var_dump(debug_backtrace()));
		  		
		  
			  header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
		  }
		  
		  	$row = $stmt->fetch();
			
			
			if ($row['event_user_name'] === $inUsername)
			{
			
				$_SESSION['validUser'] = "yes";				//this is a valid user so set your SESSION variable
				$message = "Welcome Back! $inUsername";					
			}
			else
			{
		
				$_SESSION['validUser'] = "no";					
				$errMessage = "Sorry, there was a problem with your username or password. Please try again.";					
			}
		  

		}//end if submitted
		else
		{
			//user needs to see form
		}//end else submitted
		
	}//end else valid user
	
//turn off PHP and turn on HTML
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>WDV341 Intro PHP - Login Page</title>

</head>

<body>

<h1>WDV341 Intro PHP</h1>

<h2>Log-in page!</h2>

<?php

	if ( !empty($message) )
	{
		echo "<h2>$message</h2>";	
	}
	else
	{
		echo "<p class='errMsg'>$errMessage</p>";	
	}
	
?>
<?php
	if ($_SESSION['validUser'] == "yes")	//This is a valid user.  Show them the Administrator Page
	{
		
//turn off PHP and turn on HTML
?>
		<h3>PIT Administrator Options:</h3>
        <p><a href="">Setup a New Event</a></p>
        <p><a href="">Update an Event</a></p>
        <p><a href="">Add a Presenter</a></p>
        <p><a href="#">Update a Presenter</a></p>
        <p><a href="logout.php">Logout of Admin systems</a></p>	
        					
<?php
	}
	else									//The user needs to log in.  Display the Login Form
	{
?>
			<h2>Please login to the Administrator System</h2>
                <form method="post" name="loginForm" action="login.php" >
                  <p>Username: <input name="loginUsername" type="text" /></p>
                  <p>Password: <input name="loginPassword" type="password" /></p>
                  <p><input name="submitLogin" value="Login" type="submit" /> <input name="" type="reset" />&nbsp;</p>
                </form>
                
<?php //turn off HTML and turn on PHP
	}//end of checking for a valid user
			
//turn off PHP and begin HTML			
?>

</body>
</html>
