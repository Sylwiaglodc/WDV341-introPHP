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

function stringInputResults($inString)
{
		$charNum = strlen($inString);
		$strTrim = trim($inString);
		$lowerStr = strtolower($strTrim);
		$trimmedCharNum = strlen($strTrim);
		
		echo("<strong>Character Count:</strong> $charNum<br/>
		<strong>Untrimmed, Regular Case String: </strong>$inString<br/>
		<strong>Trimmed, Lowercase String:</strong> $lowerStr<br/>
		<strong>Trimmed Character Count:</strong>$trimmedCharNum<br/>");
		
		if(strpos($lowerStr, 'dmacc') !== false)
		{
		echo("Contains DMACC.");
		}
		else
		{
		echo("Does not contain DMACC.");
		}
}

function formatNum($inNum)
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
<p><?php stringInputResults("Woohoo! We're doing PHP at DMACC!"); ?></p>

<h2>4</h2><h3>Formatted Number</h3>
<p><?php formatNum(1234567890); ?></p>
<h2>5</h2>
<h3>Formatted Money</h3><p><?php formatMoney(123456); ?></p>
</body>
</html>