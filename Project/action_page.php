<?php
	
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "popularity_analysis";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if($_POST){
	
	$name  =$_POST['firstname'];
	$lname  =$_POST['lastname'];
	$age  =$_POST['age'];
	$sex  =$_POST['sex'];
	$email  =$_POST['email'];
	$location  =$_POST['location'];
	$feedback  =$_POST['subject'];
	$rating  =$_POST['star'];
	
	$sql = "INSERT INTO feedback (first_name, last_name, age,sex,email,location,feedback,rating)
									VALUES ('".$name."', '".$lname."',".$age.",'".$sex."','".$email."','".$location."','".$feedback."',".$rating.")";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
	
?>