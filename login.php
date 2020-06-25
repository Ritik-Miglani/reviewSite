<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "popularity_analysis";

$conn = new mysqli($servername, $username, $password, $dbname);

$username = $_POST['username'];
$password  	= $_POST['password'];

$sql = "SELECT username FROM users WHERE username= '".$username."' AND password = '".$password."'";
$result = mysqli_query($conn, $sql);

$response = ["message"=> "Error","code"=> 201];

if (mysqli_num_rows($result) == 1) {
	$response = ["message"=> "Login Success", "code" => 200];
}

$conn->close();
echo json_encode($response);

?>