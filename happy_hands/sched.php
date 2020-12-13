<?php

try{
    require "dbConnect.php";
    $sql= "SELECT schedule_time, schedule_name, schedule_desc FROM schedule ";

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
            color: brown;
        }
        a:hover{
            color: brown;
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
            background-color: #d0b4a0;
        }  
    .navbar{
    background-color: #ad7c59;  
}    
        
        .box {
  width: 60%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.button {
    font-family: 'Open Sans Condensed', sans-serif;
  font-size: 1em;
  padding: 10px;
  color: black;
  border: 2px solid #ad7c59;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #d0b4a0;
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
  width: 80%;
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
.popup .close:hover {
  color: #06D85F;
}
.popup .content {
  max-height: 70%;
  overflow: auto;
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
        <a class="nav-link" href="about.html">About Us
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="accred.html">Accreditation</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sched.html">Schedule</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="contact.html">Contact Us</a>
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
        </div>
        <div class="container">
<div class="jumbotron">
  <h1 class="pre">Pre-K Classes</h1>
  <p>Our preschool curriculum enhances their confidence by providing activities to help them become problem solvers and nurture a love of learning. With independent exploration, structured activities, and hands-on learning, our children develop a variety of skills and knowledge in areas from mathematics to reading.
We're proud of the work we do. Early learning standards, backed by education experts, inform the scope and sequence of our pre-k program. Our curriculum aligns to 72 learning standards progressing sequentially across six developmental domains. Add to this a healthy dose of running, jumping and movement to keep children active and you'll see why Trusted Friends is a true leader in early childhood education.</p><br><br>
  
    <div class="box">
	<a class="button" href="#popup1">Click here to see Pre-K Schedule</a>
</div>
<div id="popup1" class="overlay">
	<div class="popup">
        <div class="sched">

        <?php 
            while( $row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?> 
    
  <div class="accredmain">
        <div class="grid">
                    <span class="accredorgan"><strong></strong> <p><?php echo $row['schedule_name'];?></p></span><br>
                    <span class="accredyear"><strong>Time: </strong> <p><?php echo $row['schedule_time'];?></span></p><br>
                    <span class="level"><strong> </strong><br><p><?php echo $row['schedule_desc'];?></p></span>
                
            </div>
            </div>
         <?php
            }
         ?>
            </p></div>

		<a class="close" href="#">&times;</a>
		<div class="content">
		</div></div>
	</div>
        </div>
        <div class="group">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Science Studies</h5>
        <p class="card-text">
           <figure>
    <img src="images/alex-kondratiev-H9t723yPjYI-unsplash.jpg" title="science" alt="science beekers" class="img-fluid">
</figure> 
            <br><p>As their cognitive and physical abilities develop, children are able to develop and test their own theories, and to engage in scientific reasoning. Our curriculum encourages students to broaden their understanding of scientific disciplines, from physics to chemistry to earth science. Children learn by participating in cooking projects and participating in multi-skill experiments, handling mechanical tools.</p>
        
      </div>
    </div>
  </div>
        
         <div class="col-sm-12 col-md-12 col-lg-4">
    <div class="card">
      <div class="card-body">
          
        <h5 class="card-title">Creative Expressions</h5>
    <figure>
    <img src="images/aaron-burden-1zR3WNSTnvY-unsplash.jpg"title="art" alt="crayons and paper" class="img-fluid">
          </figure> 
          <p>Pre-kindergarten is an ideal time to introduce children to artistic expression. Our pre-k teachers extend their student's skills and knowledge through process-oriented art projects. We teach sculpting with clay and etching tools, writing and illustrating books, and our students experience acting out original stories with costumes, props, and masks.</p>
      
      </div>
    </div>
  </div>
      
        <div class="col-sm-12 col-md-12 col-lg-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Math Exploration</h5>
         <figure>
    <img src="images/crissy-jarvis-cHhbULJbPwM-unsplash.jpg"title="math" alt="abacus" class="img-fluid">
          </figure>
          <p>Pre-k children are enthusiastic mathematicians. Our instructors work to ensure that our students don't simply learn numbers by rote, but instead build mathematical understanding related to real, everyday problems. Our curriculum includes important skills such as comparing and contrasting items by characteristics, following complex directions in sequence, and solving simple number problems.</p>
      </div>
      </div>
    </div>
  </div>
        <br><br>    
    <div class="group">
    <div class="row">
      <div class="col-sm-12 col-md-12 col-lg-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Language Skills</h5>
        <p class="card-text">
           <figure>
     <img src="images/emily-levine-o1l5ByuccNI-unsplash.jpg" title="language books" alt="books in different language" class="img-fluid">
              </figure>
          <p>Language, literacy, and communication skills are embedded into a child's daily experiences. We strive to create meaningful classroom experiences that help children use and build a growing vocabulary.</p>
        
      </div>
    </div>
  </div>
        
         <div class="col-sm-12 col-md-12 col-lg-4">
    <div class="card">
      <div class="card-body">
          
        <h5 class="card-title">Physical Wellness</h5>
    <figure>
   <img src="images/anna-samoylova-w55SpMmoPgE-unsplash.jpg" title="tug of war" alt="kids playing tug of war" class="img-fluid">
          </figure>
          <p>Pre-k children learn about becoming responsible for their own choices and decisions. Our curriculum encourages students to learn physical wellness through physical activity, healthy eating, and personal hygiene. Everyday our children learn about themselves and others through supportive sharing times.</p>
    
      </div> </div>
  </div>      
        <div class="col-sm-12 col-md-12 col-lg-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cultural Sharing</h5>
         <figure>
    <img src="images/andrew-ebrahim-zRwXf6PizEo-unsplash.jpg" title="kids sharing" alt="kids sharing culture" class="img-fluid">
          </figure>
          <p>Children are innately interested in the diversity of people and cultures. We foster the development of all areas of a child's emotional intelligence including interpersonal skills, compassion, and acceptance of personal responsibility. We believe in fostering respect for different cultures, traditions, and life styles.</p>
      </div>
      </div>
    </div>
  </div></div></div></div>

           <div class="top">
                    <a href="#top"><p>Back to top of page</p></a>    </div>          
        <footer>
                 
            <div class="footer2">
        <p> Happy Hands • 3450 Regency Lane, Carmel IN  </p>    
            </div>
            <a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@element5digital?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Element5 Digital"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Element5 Digital</span></a>
</footer>  
           
        <script src="http://code.jquery.com/jquery-latest.min.js"></script> <script src="js/bootstrap.min.js"></script> <script> $(function(){ $('.nav-tabs a:first').tab('show'); }); </script>
            
    </body>
</html>