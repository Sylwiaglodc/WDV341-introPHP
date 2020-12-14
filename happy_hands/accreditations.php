<?php
try{
    require "dbConnect.php";
    $sql= "SELECT accred_id, organization, yearaccred, level FROM accreds ";

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
<!DOCTYPE HTML> 
<html lang="en">

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
  color:white;
}
        footer{
            background-color:#00A170;
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
    background-color: #00A170;  
}    
.link{
  padding:10px;
  margin:20px;
}
        
       
.accredmain{
  border-style:inset;
  padding: 10px;
  width:200px;

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
        <a name="top"></a>
        <div class="container">
			<h1 class="header">Happy Hands Daycare Accreditations Section</h1>
			<h2 class="logindesc">Below you will find a list of current accreditations and links to add, update and delete them.</h2>
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
      <li class="nav-item">
        <a class="nav-link" href="addaccred.php">Insert New Accrediation</a>
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
        </div>


        <div class="sched">

        <?php 
            while( $row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?> 
    
  <div class="accredmain" style="overflow-x:auto;">
        <div class="grid">
                    <span class="accredorgan"><strong>Organization Name: </strong> <p><?php echo $row['organization'];?></p></span><br>
                    <span class="accredyear"><strong>Year of Accreditation: </strong> <p><?php echo $row['yearaccred'];?></span></p><br>
                    <span class="level"><strong> Accredidation Level: </strong> <br><p><?php echo $row['level'];?></p></span>

                    <div class=link>
                    <a href="updateaccred.php?recId=<?php echo $row['accred_id'];?>" > Update exsisting Accredidation</a><br>
                    </div>
                    <div class=link>
                    <a href="deleteaccreds.php?recId=<?php echo $row['accred_id'];?>">  Delete exsisting Accrediation</a>
                    </div>
            </div>
            </div>
         <?php
            }
         ?>
</div>       
        <footer>
                 
            <div class="footer2">
        <p> Happy Hands • 3450 Regency Lane, Carmel IN  </p>    
            </div>
            <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@element5digital?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Element5 Digital"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Element5 Digital</span></a>
</footer>  
           
        <script src="http://code.jquery.com/jquery-latest.min.js"></script> <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>
            
    </body>
</html>   