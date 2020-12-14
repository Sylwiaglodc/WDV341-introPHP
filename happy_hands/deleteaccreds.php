<?php
session_start();

if (!$_SESSION['validUser']) {
	header('Location: login.php');
}

$updateRecID = $_GET['recId'];

if (isset($_POST['deleteAccred']) )	{
    try {
	  
        require "dbConnect.php";	//CONNECT to the database
        
        //Create the SQL command string
        $sql = "DELETE FROM accreds WHERE accred_id='$updateRecID'";   //get record from events table
    
        
        //PREPARE the SQL statement
        $stmt = $conn->prepare($sql);
        
        //EXECUTE the prepared statement
        $stmt->execute();		
       $message = "Accredidation deleted";
    }
    
    catch(PDOException $e)
    {
        $message = "There has been a problem. The system administrator has been contacted. Please try again later.";
    
        error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
        error_log($e->getLine());
        error_log(var_dump(debug_backtrace()));
    
        //Clean up any variables or connections that have been left hanging by this error.		
      
          				
    }
}
else {
try {
	  
    require "dbConnect.php";	//CONNECT to the database
    
    //Create the SQL command string
    $sql = "SELECT * FROM accreds WHERE accred_id='$updateRecID'";   //get record from events table

    
    //PREPARE the SQL statement
    $stmt = $conn->prepare($sql);
    
    //EXECUTE the prepared statement
    $stmt->execute();		
    
    //Prepared statement result will deliver an associative array
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $row=$stmt->fetch(PDO::FETCH_ASSOC);	 

	$accred_id = $row['accred_id'];   
	$organization=$row['organization'];
	$yearaccred=$row['yearaccred'];
	$level=$row['level'];

}

catch(PDOException $e)
{
    $message = "There has been a problem. The system administrator has been contacted. Please try again later.";

    error_log($e->getMessage());			//Delivers a developer defined error message to the PHP log file at c:\xampp/php\logs\php_error_log
    error_log($e->getLine());
    error_log(var_dump(debug_backtrace()));

    //Clean up any variables or connections that have been left hanging by this error.		
  
      //header('Location: files/505_error_response_page.php');	//sends control to a User friendly page					
}
}
?>

<!doctype html>
<html>
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
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
   
    <meta name="description" content="Home Page for Happy Hands Daycare"> 
    <meta name="keywords" content=" Daycare, Child Care">
    <title>Happy Hands Daycare</title>
    <!-- Sylwia Glod, 11-28-2019 -->
    
    <style>
        a{
            color: white;
        }

        footer{
            background-color: saddlebrown;
        }
        .jumbotron{
            background-color: #f3ece7;
        }   
        .card{
            background-color: #f3ece7;
        }
        body{
            background-color: #A0DAA9;
        }  
    .navbar{
    background-color: #ad7c59;  
}    
        
 h2{
     color:red;
 }       
.centerlink{
  text-align:center;
}

.link{
  border-style:solid;
  padding:10px;
  margin:20px;
}
.container{
    padding:20px;
    text-align:center;
    border-style:solid;
}
@media screen and (max-width: 700px){
  .box{
    width: 90%;
  }
  .popup{
    width: 90%;
  }
}
        .sched{
            display:flex;
            justify-content: center;
        }
        .footer{
            display: flex;
            justify-content: center;
            font-family:'Luckiest Guy', cursive;
            font-size: 30px;
        } 
        .pic{
            padding: 30px;
            margin: 30px;
            border-style: groove;
            
        } 
            @media all and (min-width: 960px) {
    .pre{
        font-size: 45px;
    }
}
 
@media all and (max-width: 959px) and (min-width: 600px) {
    .pre{
        font-size: 30px;
    }
}
 
@media all and (max-width: 599px) and (min-width: 320px) {
    .pre{
        font-size: 25px;
    }
 
}
    </style>

</head>

<body>

    
    
    <form method="post" name="loginForm" action="deleteaccreds.php?recId=<?php if (isset($accred_id)) echo $accred_id; ?>" >
<?php 
    if (isset($_POST['deleteAccred']) )  {   ?>
        <h2><?php echo $message;?> </h2>
        <p><a href="accreditations.php">Back to Accredidation list</a></p> <?php }

    else { ?>

<div class=container>
        <h2><strong>WARNING: ARE YOU SURE YOU WISH TO DELETE THIS ACCREDIDATION? THIS ACTION CANNOT BE UNDONE!</strong></h2>
        <div class="eventBlock">
                <div class="row">
                    <span class="organization"><strong>Organization Name: </strong> <?php echo $row['organization']; ?></span>
                </div>   <br>            
                <div class="row">
                    <span class="yearaccred"><strong>Year of Accredidation: </strong> <?php echo $row['yearaccred']; ?></span>
                </div>  <br>            
                <div class="row">
                    <div class="col-1-2">
                        <span class="level"><strong>Level of Accredidation:</strong> <?php echo $row['level']; ?></span>
                    </div><br><br>
                </div>
        </div>  

        <input name="deleteAccred" value="Delete Instructor" type="submit" />
        <a href="accreditations.php"><button type='button'>Cancel</button></a>
    <?php } ?>
    </form>
           </div>        
   
    
</body>
</html>