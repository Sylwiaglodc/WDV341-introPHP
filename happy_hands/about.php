<?php
try{
    require "dbConnect.php";
    $sql= "SELECT instructor_name, instructor_img, instructor_spec, instructor_about FROM instructors 
    WHERE instructor_id =1 LIMIT 1";

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
    <link href="layout.css" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <meta name="description" content="Home Page for Happy Hands Daycare"> 
    <meta name="keywords" content=" Daycare, Child Care">
     <title>Happy Hands Daycare</title>
    <!-- Sylwia Glod, 11-28-2019 -->
    
    <style>
        
.navbar{
    background-color: #ffc966;
    
        }
.jumbotron{
            background-color: beige;
        }
.footer2{
            background-color: darkorange;
            margin-top:20px
        } 
 header{
            background-color: beige;
        }               
body{
       background-color:#ffffed;   
        } 
h1{       
    color:orange;
        }     

h2{
    color:orange;
    font-family:'Luckiest Guy', cursive;
    font-size: 45px;  
    margin-left: 15px;
        }
        a{
            color: orange;
        }
        a:hover{
            color: orange;
        }
        
.container2 {
  border: 2px solid #ccc;
  background-color: #ffc966;
  border-radius: 5px;
  padding: 16px;
  margin: 16px 0;
}


.container2::after {
  content: "";
  clear: both;
  display: table;
}


.container2 img {
  float: left;
  margin-right: 20px;
  border-radius: 50%;
}


.container2 span {
  font-size: 20px;
  margin-right: 15px;
}

@media (max-width: 500px) {
  .container2 {
    text-align: center;
  }

  .container2 img {
    margin: auto;
    float: none;
    display: block;
  }
}  
.popup .content {
    max-height: 60%;
    overflow: auto;
}

 #demobox {
  background-color: beige;
  padding: 10px ;
  border: 1px solid orange ;
}     
        .box {
  width: 60%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid orange;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.button {
  font-family: 'Open Sans Condensed', sans-serif;
  font-size: 1em;
  padding: 10px;
  color: black;
  border: 2px solid white;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: beige;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 60%;
  position: relative;
  transition: all 5s ease-in-out;
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
}
.close {
    float: right;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
}        
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 60%;
  overflow: auto;
}
.grid{
  display: grid;
  justify-content: center;
  align-content: center;
}

.img {
  height: 120px;
  display: block;
  margin-left: auto;
  margin-right: auto;
  
}
.empmonth{
  text-align: center;
}

.empmonthdes{
  text-align:center;
  font-family:'Luckiest Guy', cursive;
}

.empmonthmain{
  border-style: inset;
  padding:50px;
  margin:20px;
  background-color:#fada5e;
}

.insname, .inspec, .insdesc{
  text-align: center;
}



@media screen and (max-width: 700px){
  .box{
    width: 90%;
  }
  .popup{
    width: 90%;
  }
}
        .display{
            font-family:'Luckiest Guy', cursive;
            font-size: 40px;
        }
        
 @media all and (min-width: 1024px) and (max-width: 1280px) { 
    .display {
    font-size: 40px;
  }
        }
 
@media all and (min-width: 768px) and (max-width: 1024px) {
        
    .display {
    font-size: 25px;
  }
        }
 
@media all and (min-width: 480px) and (max-width: 768px) {
        
    .display {
    font-size: 20px;
  
    }}
          @media all and (min-width: 1024px) and (max-width: 1280px) { 
        h2 {
    font-size: 45px;
  }
        }
 
@media all and (min-width: 768px) and (max-width: 1024px) {
        
    h2 {
    font-size: 25px;
  }
        }
 
@media all and (min-width: 480px) and (max-width: 768px) {
        
        h2 {
    font-size: 20px;
  }}
         @media all and (min-width: 960px) {
    .size{
        font-size: 60px;
    }
}
 
@media all and (max-width: 959px) and (min-width: 600px) {
    .size{
        font-size: 40px;
    }
}
 
@media all and (max-width: 599px) and (min-width: 320px) {
    .size{
        font-size: 29px;
    }
 
}
  @media all and (min-width: 960px) {
    .sma{
        font-size: 45px;
    }
}
 
@media all and (max-width: 959px) and (min-width: 600px) {
    .sma{
        font-size: 30px;
    }
}
 
@media all and (max-width: 599px) and (min-width: 320px) {
    .sma{
        font-size: 20px;
    }
 
}      
    </style>
  
</head>
    <body> 
        <a name="top"></a>
        <header>
             <div class="container">
            <h1 class="header">Happy Hands Daycare</h1>
            <img src="images/person-reading-a-book-1741230.jpg" title="person reading book" alt="person reading book" class="img-fluid">
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
        <a class="nav-link" href="about.php">About Us
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="accred.php">Accreditation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sched.php">Schedule</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto nav-flex-icons">
      <li class="nav-item avatar">
        <a class="nav-link p-0" href="#">
        <a class="nav-link" href="login.php">Login</a> 
          <img src="images/icons8-giraffe-64.png" class="rounded-circle z-depth-0"
            alt="avatar image" height="35">
        </a>
      </li>
    </ul>
  </div>
</nav>
   <br>
    <div class="jumbotron">
        <h1 class="size">About Happy Hands Daycare</h1></div>
    
      <div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4">
        <h1 class="display">Develop.</h1><p>Happy Hands Daycare provides childhood education and daycare, conveniently located for you and your child. We treat each child based on his or her own individual needs. Happy Hands provides a qualified and experienced team of educators with expertise in early childhood development. We structure each day around stimulating and educational activities that aid in your child's physical, intellectual, and emotional development. And we can accommodate your busy schedule with transportation to and from our school.</p><br><br>
          
          </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
      <h1 class="display">Transparent.</h1><p>We also strive to be your partner. We are completely transparent in our programs and curriculum, we continuously self-assess and look to improve, and we make communication with you a paramount part of the childcare environment.</p> <img src="images/stem-t4l-AUP1lHDKyyo-unsplash.jpg" title="chilcare" alt="children sitting" class="img-fluid"/><br><br>
        
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4">
     <h1 class="display">Engage.</h1><p>The ultimate vision we have for our facility is twofold, and rooted in both the present and the future. <br><br>For the present, our goal is for parents to feel good about their childcare choice, and that the children are safe, engaged, educated, and smiling. And for the future, we want these children to warmly look back at their experience with us, and see it as a cherished part of their childhood.</p>
    </div>
  </div>
    </div>
    <div class="empmonthmain">
<h2 class="empmonth">Instructor of the month!</h2>
<h3 class="empmonthdes">Happy Hands takes great pride in the instructors they carefully hand pick for our kiddos! Learn a little more about our Instructor of the month below!</h3>

<?php 
            while( $row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?> 
  
        <div class="grid">
                <div class="row">
                <?php echo '<img class="img" src="data:image/jpeg;base64,'.base64_encode( $row['instructor_img'] ).'"/>';?><br>
                </div>
                    <span class="insname"> <p><?php echo $row['instructor_name'];?></p></span><br>
                    <span class="inspec"> <p><?php echo $row['instructor_spec'];?></span></p><br>
                    <span class="insdesc"><strong> About our superstar: </strong><br><p><?php echo $row['instructor_about'];?></p></span>
                
            </div>

         <?php
            }
         ?>
</div>
    <div class="jumbotron">
    <h2 class="sma">What our animals are saying: </h2>
    </div>
    <div class="container2">
  <img class="round" src="images/Screen%20Shot%202019-12-03%20at%2012.37.49%20PM.png" alt="Avatar" style="width:90px">
  <p><span>— Anita K.</span></p>
  <p>My son goes here and he loves it! We've been to two other daycare centers and this is by far the best. It offers small classes with a challenging and engaging curriculum. The children get a lot of individual attention and a lot of play time.</p>
  <img class="round" src="images/Screen%20Shot%202019-12-03%20at%2012.38.00%20PM.png" alt="Avatar" style="width:90px">
  <p><span >— Stefan Z.</span></p>
        <p>I truly appreciate the cultural and ethnic diversity in the staff. They bring different traditions together and help the kids explore other cultures. They make everyone feel welcome and safe.</p> </div></div>
      <br>
        
    <div class="box">
	<a class="button" href="#popup1">Like what you see? Click here to sign up for our newletter!</a>
</div>
<div id="popup1" class="overlay" style="overflow:scroll;">
	<div class="popup">
	<div>
        <div class="simple-subscription-form">
  <form method="post" name="myemailform" action="subform.php">
    <h4>Subscribe</h4>
    <p>Receive updates and latest news direct from our team. Simply enter your info below :</p>
    <div class="input-group">
      <span class="input-group-label">
        <i class="fa fa-envelope"></i>
      </span>
      <input class="input-group-field" id="email" type="email" placeholder="Email" required>
        <input class="input-group-field" id="fname" type="fname" placeholder="First name" required>
        <input class="input-group-field" id="lname" type="lname" placeholder="Last name" required>
      <button class="button">Sign up now</button>
      </div> </form></div></div>
  	
   <a class="close" href="#">&times;</a>
		<div class="content">
        </div> </div>
      
         <div class="top">
             <a href="#top"><p>Back to top of page</p></a>    </div>  </div> 
<footer>           
            <div class="footer2">
        <p> Happy Hands • 3450 Regency Lane, Carmel IN  </p>    
        </div>    
    <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@element5digital?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Element5 Digital"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Element5 Digital</span></a>
</footer>  
           
        <script src="http://code.jquery.com/jquery-latest.min.js"></script> <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>
    </body>
</html>