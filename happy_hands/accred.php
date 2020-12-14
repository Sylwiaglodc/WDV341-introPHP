<?php

try{
    require "dbConnect.php";
    $sql= "SELECT accred_pic, organization, yearaccred, level FROM accreds ORDER BY RAND()
    LIMIT 1 ";

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
    <link href="https://fonts.googleapis.com/css?family=Luckiest+Guy&display=swap" rel="stylesheet">
    <link href="layout.css" rel="stylesheet" type="text/css"/>
    <link href="style.css" rel="stylesheet" type="text/css"/>
     <meta name="description" content="Home Page for Happy Hands Daycare"> 
    <meta name="keywords" content=" Daycare, Child Care">
    <title>Happy Hands Daycare</title>
    <!-- Sylwia Glod, 11-28-2019 -->
    
    <style>
      h2{
        font-family:'Luckiest Guy', cursive;
      }
        a{
            color: darkgreen;
        }
        a:hover{
            color: darkgreen;
        }
        header{
            background-color: #eefdec;
        }
         .navbar{
    background-color: 	#90ee90;  
}
        body{
            background-color: #ddfada;
        }  
        
        .jumbotron{
            background-color: #eefdec;
        }
        .display-4{
            font-family:'Luckiest Guy', cursive;
            font-size: 25px;
        }    
        
        .display-5{
            font-family:'Luckiest Guy', cursive;
            font-size: 40px;
        }
        .card-title{
            font-family:'Luckiest Guy', cursive;
            font-size: 40px;
        }
        
footer{
            background-color: darkseagreen;
        } 
        
.popup .content {
    max-height: 60%;
    overflow: auto;
}

 #demobox {
  background-color: #cfc ;
  padding: 10px ;
  border: 1px solid green ;
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
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #06D85F;
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
.accredmain{
  display: grid;
  justify-content: center;
  align-content: center;
}
.grid{
  border-style: outset;
  border-color: #008000;
  width:400px;
  height:450px;
  padding:30px;
  text-align:center;
 
}
.accredicon{
  display: block;
  margin-left: auto;
  margin-right: auto;
}
.ouraccred{
  text-align:center;
}

@media screen and (max-width: 700px){
  .box{
    width: 90%;
  }
  .popup{
    width: 90%;
  }
}  
        @media all and (min-width: 960px) {
    .display-5{
        font-size: 45px;
    }
}
 
@media all and (max-width: 959px) and (min-width: 600px) {
    .display-5{
        font-size: 30px;
    }
}
 
@media all and (max-width: 599px) and (min-width: 320px) {
    .display-5{
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
           
  <div class="jumbotron">
  <h1 class="display-5">Happy Hands: An accredited center!</h1>
  <p>At Happy Hands we believe that every child is capable of excellence. That is why we are committed to pursuing and maintaining our status as an accredited daycare center. By seeking national accreditation, you know that Happy Hands is striving to give your family the very best daycare experience.</p>
  <h2 class="ouraccred">Our Accreditations:</h2>

  <?php 
            while( $row=$stmt->fetch(PDO::FETCH_ASSOC)){
    ?> 
  <div class="accredmain">
        <div class="grid">
                <div class="accredicon">
                <?php echo '<img class="img" src="data:image/jpeg;base64,'.base64_encode( $row['accred_pic'] ).'"/>';?><br>
                </div>
                    <span class="accredorgan"><strong>Organization: </strong> <p><?php echo $row['organization'];?></p></span>
                    <span class="accredyear"><strong>Year of Accreditation</strong> <p><?php echo $row['yearaccred'];?></span></p>
                    <span class="level"><strong> Level of Accreditation: </strong><br><p><?php echo $row['level'];?></p></span>
                
            </div>
            </div>
         <?php
            }
         ?>

      <br><br>
</div>                                          
                                               
  <div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-4">
        <h1 class="display-4">What is Accreditation?</h1><p>Every daycare center must meet the state's minimum license requirements. We go beyond that. When a daycare center is awarded national accreditation they are meeting a higher standard that demonstrates its expertise in:</p>
        <ul>
        <li>Classroom Management</li>
        <li>Curriculum Development</li>
        <li>Health and Safety</li>
            <li>Parental Support</li>
            <li>Community Involvement</li>
            <li>Teacher Certification</li>
            <li>Administrative Oversight</li>
        </ul>
        <p>Our commitment to accreditation gives you assurance we provide a positive educational experience for your child.</p>
        <img src="images/element5-digital-OyCl7Y4y0Bk-unsplash.jpg" title="books" alt="different colored books" class="img-fluid"/><br><br>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4">
      <h1 class="display-4">How does Accreditation Work?</h1><p>Every other year we go through an intense review by recognized and esteemed national accreditation agencies. Their positive reports (available for inspection) confirm that we are providing a clean, safe, and positive environment for our children. Accreditation verifies that our teachers are qualified and fully engaged in giving our children a first-class educational experience.<br><br>
Once we've completed the entire accreditation self-study process, trained professionals from our accrediting agencies conduct on-site visits to validate our compliance with national early childhood education standards. But accreditation doesn't just take place every two years. It's an ongoing process of self-evaluation, discussion, and parental reviews.<br><br>
We encourage parents to help us improve our center and become better stewards for their children. You can part of the accreditation process as we work together to make Happy Hands a great neighborhood center.</p><br><br>

    </div>
    <div class="col-sm-12 col-md-12 col-lg-4">
     <h1 class="display-4">Who Provides Accreditation?</h1><p>There are several national organizations that provide accreditation services. Who a center chooses for oversight is important. Happy Hands pursues national accreditation from three of the most respected national early childhood accreditation agencies:</p>
        <ul>
            
        <li><a href="http://www.example.com/nda">National Association for Youth Care</a></li>
        <li><a href="http://www.example.com/nda">United Accreditation for Early Care and Education</a></li>
        <li><a href="http://www.example.com/nda">National Daycare Accreditation</a></li>
        <li><a href="http://families.naeyc.org/find-quality-child-care">National Association for the Education of Young Children</a></li>
       
        </ul>
        <p>Feel free to contact us to discuss accreditation and learn more about our standards for care and education.</p>
        <img src="images/erika-fletcher-YfNWGrQI3a4-unsplash.jpg" title="" alt="" class="img-fluid" "img-fluid2"/>
    </div>
  </div>
    </div>
        <div class="jumbotron">
            <h1 class="display-5">Our Community</h1> <br><br><p>Happy Hands is committed to improving the lives of children in our community. Our expertise in caring for the children at our daycare center gives us a unique understanding of child development, education issues, and parenting. Happy Hands has partnered with several community organizations that advocate for poor and needy children and families. We don't think of it as charity. It's part of our calling.</p><br><br><br>
<div class="box">
	<a class="button" href="#popup1">Learn More</a>
</div>
</div></div>
        
<div id="popup1" class="overlay" style="overflow:scroll;">
	<div class="popup">
	<div>
        <h5 class="popupm">Improving Literacy</h5>
        <p class="popup">Part of Trusted Friend's mission is to promote literacy, which is key to education and a fulfilling life. We support reading programs and national literacy efforts initiated at both the local and national level. These efforts include providing early access to books and other reading material. We are also in the Raised by Reading program, helping parents share the reading experience with their children.</p>
        
        <h5 class="popupm">Promoting Partnerships</h5>
        <p class="popup">We are proud of our support for the Big Siblings organization. Several of our educators are Big Sibling mentors and we provide meeting space and monthly activities for this fine group. We are also deeply involved with the Young Care Nursery organziation, working to prevent child abuse and neglect. We partner with other caregivers committed to strengthening families in the community. For example we are a charter member of Sunflower Friends, which creates learning and enrichment opportunities for underprivileged children, helping them to realize their potential and recognize their inherent dignity.</p><br><br>
        <strong>Please <a href="contact.html"#form><strong>contact us</strong></a> if you believe that Happy Hands can be a partner with your group in improving the lives of children and families in our community.</strong></div>
  	
   <a class="close" href="#">&times;</a>
		<div class="content">
        </div> </div>
    </div>
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