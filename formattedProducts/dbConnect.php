<?php
$servername = "localhost";
$username = "root";

$password = "root";
$databaseName = "wdv341";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$databaseName", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  echo "Connected successfully";

} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT product_name, product_description,  FROM persons";?>