<?php

try{
    require "dbConnect.php";
    $sql= "SELECT product_id, product_name, product_description, product_price, product_image, product_inStock, product_status, product_update_date FROM wdv341_products ORDER BY product_name DESC ";

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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
	
	<style>
	
		.productBlock	{
			 
			width:300px;
			background-color: aquamarine;
			border:thin solid black;
		}
		
		.productImage img {
			display:block;
			margin-left:auto;
			margin-right:auto;
			width:280px;
			height:280px;				
		}
	
		.productName {
			text-align:center;
			font-size: large;
		}	
		
		.productDesc {
			margin-left:10px;
			margin-right:10px;
			text-align:justify;
		}
		
		.productPrice {
			text-align: center;
			font-size:larger;
			color:blue;
		}
		
		.productStatus {
			text-align:center;
			font-weight:bolder;
			color:darkslategray;
		}
		
		.productInventory {
			text-align:center;
		}
		
		.productLowInventory {
			color:red;
		}
		
	</style>
</head>

<body>
	
	<h1>DMACC Electronics Store!</h1>
	<h2>Products for your Home and School Office</h2>
	
	<?php 
            while( $row=$stmt->fetch(PDO::FETCH_ASSOC)){
		?>
		
	<div class="productBlock">
		<div class="productImage">
			<image src="<?php echo $row['product_image']; ?>">
		</div>
		<p class="productName"><?php echo $row['product_name']; ?></p>	
		<p class="productDesc"><?php echo $row['product_description']; ?></p>
		<p class="productPrice"><?php echo $row['product_price']; ?></p>
		<p class="<?php 
				if($row['product_status'] != "") {
					echo "productStatus";
				}
			?>"> <?php echo ['product_status'];  ?></p>
	<?php
		if ( $row['product_InStock'] <10 ){
				$displayClass = " productInventory productLowInventory";

		}
		else{
			$displayClass = "productInventory";
		}
	?>
		<p class="<?php echo $displayClass; ?>"> <?php echo $row['product_inStock'];?>'s In Stock!</p>
	</div>

	<?php 
			}
        ?>
</body>
</html>