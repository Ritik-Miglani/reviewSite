<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "popularity_analysis";

$conn = new mysqli($servername, $username, $password, $dbname);

$rating = $_POST['rating'];
$id  	= $_POST['id'];
	
$sql = "INSERT INTO rating (rating, show_id) VALUES ('".$rating."', '".$id."')";

$response = ["message"=> "Error","code"=> 201];

if ($conn->query($sql) === TRUE) {
  $response = ["message"=> "New record created successfully", "code" => 200];
}

$conn->close();
return $response;


?>