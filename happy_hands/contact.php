<?php
        require 'email.php';
        If(isset($_POST['contactBtn'])){

        $emailTest = new Emailer();

        $emailTest->set_senderEmail("sylwiaglodc@gmail.com");
        echo "Sender: " . $emailTest->get_senderEmail();
        echo "<br>";

        $emailTest->set_recipientEmail($_POST['email']);
        echo "Recipient: " . $emailTest->get_recipientEmail();
        echo "<br>";

        $emailTest->set_subject("Happy Hands Contact Form!");
        echo "Subject: " . $emailTest->get_subject();
        echo "<br>";

        $emailTest->set_message($_POST['message']);
        echo $emailTest->get_message();
        
       // echo $emailTest->get_recipientEmail();

        $result = $emailTest->sendEmail();  // send email to SMTP server
        
        //echo $result;
        

    }else { 
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
    <title>Happy Hands Daycare</title>
    <meta name="description" content="Home Page for Happy Hands Daycare"> 
    <meta name="keywords" content=" Daycare, Child Care">
    <!-- Sylwia Glod, 11-28-2019 -->
    
    <style>
        a{
            color: black;
        }
        a:hover{
            color: black;
        }
        footer{
            background-color: #7e7e7e;
        }
        header{
            background-color:#f1f1f1;
        }  
        body{
            background-color: #e9e9e9;
        }
        
    .navbar{
    background-color: #d3d3d3;  
}    
    
        .footer{
            display: flex;
            justify-content: center;
            font-family:'Luckiest Guy', cursive;
            font-size: 30px;
        }
 
input[type=text], select, textarea{
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}


label {
  padding: 5px 5px 5px 5px;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: black;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
    font-family: 'Open Sans Condensed', sans-serif;
}


.container2 {
  width:75%;
  border-radius: 5px;
  background-color:#a8a8a8;
  padding: 40px;
  margin: 5px 150px 50px 50px
}
       


.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
     margin-left: 50px;
    font-family: 'Open Sans Condensed', sans-serif;
}


.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
    margin-left: 50px;
    font-family: 'Open Sans Condensed', sans-serif;
}


.row:after {
  content: "";
  display: table;
  clear: both;
   
}


@media screen and (max-width: 600px) {
  .col-25, .col-75, .form, input[type=submit] {
    width: 100%;
    margin-top: 0;
    margin-left: 1px;
      
  }
}
   input[type="radio"]{
  margin: 0 10px 0 10px;
}    
        .drop{
            font-family: 'Open Sans Condensed', sans-serif;
             margin-left: 50px;
        }
            @media all and (min-width: 960px) {
    .swing{
        font-size: 45px;
    }
}
 
@media all and (max-width: 959px) and (min-width: 600px) {
    .swing{
        font-size: 30px;
    }
}
 
@media all and (max-width: 599px) and (min-width: 320px) {
    .swing{
        font-size: 25px;
    }
 
}
    </style>
  
</head>
    <body>
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
            <h1 class="swing">Swing by! Or shoot us an email!</h1><br>
                <p>Along with our five star child care, we also take pride in our easy sign up process and fast turn around time. Please take a few moments to fill out the form below to send us an email. Once we recive the email, one of our staff will reach out to schedule an appointment to tour the daycare and get to know your little animal! We can't wait to meet you!
                </p>
            </div>
        </div> 
        <div class="container2">
       <h1 class="form"><P>CONTACT US:</P></h1>
        <div class="form">
  
    <div id="container">
        <form name="contact" method="post" action="contact.php">

        <label for="fname"> Full Name </label>
        <input type="text" name="fname"><br>
    
        <label for="email"> Email </label>
        <input type="text" name="email"><br>

        <label for="message"> Message/ Inquiries </label>
        <textarea name="message"></textarea><br>

        <input type="submit" id="btn" name="contactBtn" value="Send"/> 

    </form>
    </div>

    <?php }
echo $result;
?>

</div>                                             
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