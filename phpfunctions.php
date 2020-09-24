<!DOCTYPE html>
<html>
<head>
<style>
body{
    margin:25px;
}

h2{
    color:red;
}
    
</body>
</style>

<?php

function mmDdYyyy()
{
	$date = date("m/d/Y");
	echo $date;
}

function ddMmYyyy()
{
	$date = date("d/m/Y");
	echo $date;
}

function stringInput($inString)
{
	$characterNumber = strlen($inString);
	$stringTrim = trim($inString);
	$lowercaseString = strtolower($stringTrim);
	$trimmedCharacterNumber = strlen($stringTrim);
	
	echo("Character Count: <strong>$characterNumber</strong><br/>
	Untrimmed, Regular Case String:<strong>$inString</strong><br/>
	Trimmed, Lowercase String: <strong>$lowercaseString</strong><br/>
	Trimmed Character Count:<strong>$trimmedCharacterNumber</strong><br/>");
		
		if(strpos($lowercaseString, 'dmacc') !== false)
		{
		echo("<strong>Contains DMACC.</strong>");
		}
		else
		{
		echo("<strong>Does not contain DMACC.</strong>");
		}
}

function formatNumber($inNum)
{
	echo(number_format($inNum));
}

function formatMoney($inNum)
{
		$amount = number_format($inNum, 2, ".", ",");
		echo("$".$amount);
}
?>
</head>
<body>
<h1> PHP Function Assignment</h1>
<h2>1</h2>
<h3>MM/DD/YYYY Formatted Date</h3>
</p><?php mmDdYyyy("September 24 2020");?></p>
<h2>2</h2>
<h3>DD/MM/YYYY Formatted Date</h3>
<p><?php ddMmYyyy("September 24 2020");?></p>

<h2>3</h2>
<h3>String Results</h3>
<p><?php stringInput("Woohoo! We're doing PHP at DMACC!"); ?></p>

<h2>4</h2><h3>Formatted Number</h3>
<p><?php formatNumber(1234567890); ?></p>
<h2>5</h2>
<h3>Formatted Money</h3><p><?php formatMoney(123456); ?></p>
</body>
</html>