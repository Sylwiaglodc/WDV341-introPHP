<?php

$msg = "";

//set up session
session_start();

$_SESSION['validUser']= "no";


//if the page opens with a valid user...
if($_SESSION['validUser']== "yes")
{
	//set confirmation msg
	$msg = "Welcome back ".$inUsername."!";
}
//else, if page opens without a valid user...
else
{
	//if the page was reached by a submitted login form...
	if(isset($_POST["submit"]) )
	{
		//set username and password from form
		$inUsername = $_POST["loginUser"];
		$inPassword = $_POST["loginPass"];

		//connect to database
		include "dbConnect.php";

		//set up SQL SELECT query for username and password that were entered into form
		$sql = "SELECT user_name, pass_word FROM instructor_user WHERE user_name = '$inUsername' AND pass_word = '$inPassword'";

		//run SELCT query
		$result = $conn->query($sql);

		//if the query retrieves 1 record...
		if($result)
		{
			if($result->rowCount() == 1)
			{
				//user is a valid user
				$_SESSION['validUser'] = "yes";
				//set confirmation msg
				$msg = "Welcome back ".$inUsername."!";
			}
			//else, if 0 or more than 1 records were found...
			else
			{
				//user is not a valid user
				$_SESSION['validUser'] = "no";
				//set error msg
				$msg = "There was a problem with your username or password. Please try again.";
			}
		}
	}
	//else, if the user needs to see the login form...
	else
	{

	}
}
?>
<head>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC|Cutive+Mono|Darker+Grotesque|Open+Sans|Poiret+One|Shadows+Into+Light+Two|Open+Sans+Condensed:300&display=swap" rel="stylesheet">
    <link href="layout.css"  rel="stylesheet" type="text/css"/>
    <link href="style.css" rel="stylesheet" type="text/css"/>
    <link href="layout.css"  rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <title>Happy Hands Daycare</title>
    <meta name="description" content="Home Page for Happy Hands Daycare">
    <meta name="keywords" content=" Daycare, Child Care">
	<!-- Sylwia Glod, 11-28-2019 -->
	<style>
	.welcome{
		font-family:'Luckiest Guy', cursive;
		size:200px;
	}
	.subtext{
		font-family: 'Poiret One', cursive;
		text-align: center;
	}
.error {
	color: red;
	font-style: italic;
	line-height: 0;
}

body {
	background-color: #F7CAC9;
}

.login {
	width: 75%;
	margin: 2% 10%;
	border: 2px solid black;
	text-align: center;
	padding:30px;
}
.navbar{
	background-color: 	#92A8D1;  
	height:100px;
}
.logindesc{
	font-family:"Lucida Console", Monaco, monospace	;
	font-size:20px;
	text-align:center;

}

</style>
</head>
<body>
<div id ="container">
<h1 class="header"><?php echo $msg?></h1>

<?php
//if the user is a valid user...
if($_SESSION['validUser'] == "yes")
{
	//show admin page
?>

<header>
             <div class="container">
			<h1 class="header">Happy Hands Daycare Instructor Section</h1>
			<h2 class="logindesc">Below you will find navaigation to update, insert and delete instructors, accrediations and the schedule. <br>*Make sure you have gotten approval from a manager before making any changes*.</h2>
            <img src="images/gautam-arora-78Ae6N7rNvI-unsplash.jpg" title="empty classroom" alt="empty classroom" class="img-fluid">
            </div>
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


<?php
}
//else, if not a valid user...
else
{
	//show login form
?>
    <header>
             <div class="container">
			<h1 class="header">Happy Hands Daycare</h1>
			<h2 class="subtext">Instructor Login</h2>
            <img src="images/gautam-arora-78Ae6N7rNvI-unsplash.jpg" title="empty classroom" alt="empty classroom" class="img-fluid">
            </div>
        </header>
<div class="login">
<h2 class="welcome">Welcome back, animals!</h2>
<h3 class="subtext">Please login using your admin username and password!</h3>
<form method="post" name="loginForm" action="login.php">
<p>Username: <input type="text" name="loginUser" /></p>
<p>Password: <input type="password" name="loginPass" /></p>
<p><input type="submit" name ="submit" value="Login"></p>
<a href="index.html">Back to Main Site</a>
</form>
</div></div>
<?php
}
?>


<footer>
                
            <div class="footer2">
        <p> Happy Hands • 3450 Regency Lane, Carmel IN  </p>    
            </div>
       <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@element5digital?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Element5 Digital"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Element5 Digital</span></a>
</footer> 
</body>
</html>