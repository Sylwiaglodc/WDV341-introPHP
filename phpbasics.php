<!DOCTYPE html>
<html>
    <head>
    </head>

<body>

<?php
$yourname = "Sylwia Glod";
$number1 = 7;
$number2 = 40;
$total = $number1+$number2;
$stuff = Array("PHP", " HTML", " Javascript");
?>



<h1>Assignment: 3-1: PHP Basics</h1>
<h2><?php echo $yourname; ?></h2>
<h3>My favorite numbers are: <?php echo $number1 . " and " . $number2; ?></h3>
<h4>Together, they make: <?php  echo $total; ?> </h4>


<script type="text/javascript"> 
   
var passedArray =  
    <?php echo '["' . implode('", "', $stuff) . '"]' ?>; 
   
// Printing the passed array elements 
document.write(passedArray); 
   
</script>


</body>
</html>