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

$sql = "SELECT * FROM shows";
$result = mysqli_query($conn, $sql);
?>

<html>
<head>
	<title>Trending Shows</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="home.css">
    <meta name="description" content="tv shows popularity analysis using data mining">
	<meta name="keywords" content="HTML,CSS,JavaScript">
	<meta name="author" content="Anshul Tyagi and Ritik Miglani">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<script src='loginsearch.js'></script>
	<style>
		table, th, td 
		{
			border-collapse: collapse;
		}
		th, td 
		{
			padding: 10px;
			text-align: left;  
			color:#65fca4;
		}

		tr:nth-child(2n+3){
			background-color: #4442;
		}		
		.tableHead{
			background-color:#333;
		}
		
		/*footer styling*/
		.footer {
		  width: 100%;
		  height: 8vw;
		  background-color: black;
		  color: white;
		  text-align: center;

		}

		.footer p{
		position:relative;
		top:50%;
		transform:translateY(-50%);
		}
		hr{
			margin-top:10%;
		}
		.button {
		  background-color: #66fcf1;
		  border: none;
		  color: black;
		  padding: 10px 20px;
		  text-align: center;
		  text-decoration: none;
		  font-size: 12px;
		  margin: 4px 2px;
		  cursor: pointer;
		  
		}
		.textbox{
			width:50px;
		}
		.add_data{
			width:40%;
			margin-top:20px;
			display:none;
		}
		.css-serial {
  counter-reset: serial-number;  /* Set the serial number counter to 0 */
}

.css-serial td:first-child:before {
  counter-increment: serial-number;  /* Increment the serial number counter */
  content: counter(serial-number);  /* Display the counter */
}
	</style>
</head>
<body bgcolor="black">
<div class="topnav1">
	<div id="hide1" class="login-screen">
        <div class="gradient-bg">
			<div class="login-box">
				<img src="logo.png" class="avatar">
				<form class="animate" method="post" onsubmit="return checkLogin()">
					<h1>Login Here</h1>
					<p>Username</p>
					<input type="text" name="username" placeholder="Enter Username" id="user">
					<p>Password</p>
					<input type="password" name="password" placeholder="Enter Password" id="pass">
					<input type="submit" name="submit" value="Login">
					<span onclick="document.getElementById('hide1').style.display='none'" class="close" title="Close Modal">&times;</span>
					<a href="forget.html">Forget Password</a>
				</form>
			</div>
		</div>
	</div>
		<a href="homepage.html"><img src="behenchod.png" style="height:15%; margin-left: 10%; margin-top:3px; "> </a>
		<div class="search-container">
			<input type="text" placeholder="Search for products,brands.." id="search_box_input" onkeydown="document.getElementById('s_result').style.display='block'" onkeyup="searchresult()">
			<button type="submit"><i class="fa fa-search"></i></button>
			<div class="search_result" id="s_result">
				<ul id="myMenu">
					<li><a href="sg.html">sacred games</a>
					<li><a href="watchmen.html">Watchmen</a>
					<li><a href="strangerThings.html">stranger things</a>
					<li><a href="13ry.html">13 reasons why</a>
					<li><a href="sherlock.html">sherlock</a>
					<li><a href="deception.html">deception</a>
					<li><a href="rickAndMorty.html">rick and morty</a>
					<li><a href="GOT.html">game of thrones</a>
					<li><a href="familyMan.html">the family man</a>
					<li><a href="alteredCarbon.html">altered carbon</a>
					<li><a href="breakingBad.html">breaking bad</a>
					<li><a href="formula.html">formula 1</a>
			</ul>
		</div>
		</div>
	</div>
	<div class="topnav">
		<a href="homepage.html">Home</a>
		<a href="#">Trending Shows</a>
		<a href="feedback.html">Feedback Form</a>
		<a href="about-us.html">About us</a>
		<button onclick="document.getElementById('hide1').style.display='block'" class="right"><i class="fa fa-fw fa-user"></i>Log In</button>
	</div>
	<br>
	<br>
	<p><h1 style="color:#65fca4;">List of Trending Shows</h1></p>
	<br>
	<br>
<div ondblclick="document.getElementById('alter').style.display='block'">
	<table id="myTable" class="css-serial" style="width:100%">
  <tr class="tableHead">

   <b> <th>S No.</th>
    <th>Title</th>
    <th>Year</th>
    <th>Rating</th>
    <th>Imdb</th>
    <th>Rotton</th>
    <th>Available on</th>
    <th>Action</th>
	</b>
  </tr>
  
  <?php
  if (mysqli_num_rows($result) > 0) {
	$counter = 1;
	 while($row = mysqli_fetch_assoc($result)) {
		 $id = $row['id'];
		  echo '<tr>';
		  echo '<td></td>';
		  echo '<td>'.$row["title"].'</td>';
		  echo '<td>'.$row["year"].'</td>';
		  echo '<td>'.$row["rating"].'</td>';
		  echo '<td>'.$row["imdb"].'</td>';
		  echo '<td>'.$row["rotton"].'</td>';
		  echo '<td>'.$row["available_on"].'</td>';
		  echo'<td><a href="#" id="'.$id.'" onClick="return add_rating('.$id.')" >Rate</a></td>';
		  echo '</tr>';
		  $counter++;
	  }
  }
  ?>
</table>
<div>

<div class="add_data" id="alter">
<form>
<input type="text" class="textbox" id="title" placeholder="Title"/>
<input type="text" class="textbox" id="year"  placeholder="Year"/>/>
<input type="text" class="textbox" id="rating" placeholder="Rating"/>/>
<input type="text" class="textbox" id="imdb"  placeholder="Imdb Rating"/>/>
<input type="text" class="textbox" id="rotten"  placeholder="Rotten Tomatoes Rating"/>/>
<input type="text" size=50 id="available"  placeholder="Available on"/>/>

<button class="button" type="button" onclick="myFunction();sortTable()">ADD</button>
<button class="button" type="button" onclick="deleteFunction()">DELETE</button>
</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function myFunction() {
  var table = document.getElementById("myTable");
  var row = table.insertRow();
  var cell1 = row.insertCell(0);
  var cell2 = row.insertCell(1);
  var cell3 = row.insertCell(2);
  var cell4 = row.insertCell(3);
  var cell5 = row.insertCell(4);
  var cell6 = row.insertCell(5);
  var cell7 = row.insertCell(6);

  cell2.innerHTML = document.getElementById("title").value;
  cell3.innerHTML = document.getElementById("year").value;
  cell4.innerHTML = document.getElementById("rating").value;
  cell5.innerHTML = document.getElementById("imdb").value;
  cell6.innerHTML = document.getElementById("rotten").value;
  cell7.innerHTML = document.getElementById("available").value;
}
function deleteFunction() {
	var table = document.getElementById("myTable");
	rows = table.rows;
	document.getElementById("myTable").deleteRow(rows.length-1);
}

function sortTable() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("myTable");
  switching = true;
  /*Make a loop that will continue until
  no switching has been done:*/
  while (switching) {
    //start by saying: no switching is done:
    switching = false;
    rows = table.rows;
    /*Loop through all table rows (except the
    first, which contains table headers):*/
    for (i = 1; i < (rows.length - 1); i++) {
      //start by saying there should be no switching:
      shouldSwitch = false;
      /*Get the two elements you want to compare,
      one from current row and one from the next:*/
      x = rows[i].getElementsByTagName("TD")[4];
      y = rows[i + 1].getElementsByTagName("TD")[4];
      //check if the two rows should switch place:
      if (Number(x.innerHTML) < Number(y.innerHTML)) {
        //if so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {
      /*If a switch has been marked, make the switch
      and mark that a switch has been done:*/
      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}

function add_rating(id){
	let rating = getRating();
	
	$.ajax({
		url: "ajax.php",
		data:{id:id,rating:rating}, 
		type:"POST",
		success: function(result){
			location.reload();
	}});	
}

function getRating() {
  var txt;
  var rating = prompt("Please enter the rating( 1 to 10 )");
  if (rating == null || rating == "") {
    
  } else {
    return rating;
  }
}
</script>
	
<hr width=100% size=6px noshade	color="#66fcf1">
<div class="footer" align="center">
  <p color="white">Public Review - your one stop to check the popularity of the tv series currently running across the globe.</p>
</div>
</body>
</html>