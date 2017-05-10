<?php
if(!isset($_SESSION)){
	session_start();
}
$servername = "localhost";
$username = "user";
$password = "password";
$dbname = "myDB";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "CREATE DATABASE myDB";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$sql = "CREATE TABLE Addresses (
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
addone VARCHAR(30) NOT NULL,
addtwo VARCHAR(30),
city VARCHAR(30),
state VARCHAR(30) NOT NULL,
zip VARCHAR(30) NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$isPost = True;
	$sql = "INSERT INTO Addresses (firstname, lastname, addone, addtwo, city, state, zip)
VALUES ('{$_POST["first"]}', '{$_POST["last"]}', '{$_POST["addone"]}', '{$_POST["addtwo"]}', '{$_POST["city"]}', '{$_POST["state"]}', '{$_POST["zip"]}')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
	$cur = "<pre>{

	FirstName: \"{$_POST["first"]}\",

	LastName: \"{$_POST["last"]}\",

	AddressLine1: \"{$_POST["addone"]}\",

	AddressLine2: \"{$_POST["addtwo"]}\",

	City: \"{$_POST["city"]}\",

	State: \"{$_POST["state"]}\",

	Zip: \"{$_POST["zip"]}\"

}</pre>";
	$_SESSION["data"] .= $cur;	
}
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$isPost = False;
	session_unset();
}
$conn->close();
?>
<html>
	<head>
	<meta charset = "utf-8">
	<title>Form</title>
	<link rel="stylesheet" type="text/css" href="A9.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="A9.js"></script>
	</head>
	
	<body>		
	<form id="myform" name="myform" action="A9.php" method="post">
	<fieldset>
		<label>First name:</label>
		<input type="text" name="first" id="first"><br>
		<label>Last name:</label>
		<input type="text" name="last" id="last"><br>
		<label>Address Line 1:</label>
		<input type="text" name="addone" id="addone"><br>
		<label>Address Line 2:</label>
		<input type="text" name="addtwo" id="addtwo"><br>
		<label>City:</label>
		<input type="text" name="city" id="city"><br>
		<label>State:</label>
		<input type="text" name="state" id="state"><br>
		<label>Zip Code:</label>
		<input type="text" name="zip" id="zip"><br>
		<input type="submit" value="Submit" id="sub">
		<input type="button" onclick="window.location.replace('A9.php')" value="Cancel" />
		<input type="submit" value="Submit and Show Address Book" onclick="A9show.php">
	</fieldset>
	</form>
	<br>
	<hr>
	<br>
	
<?php
	if($isPost){
	echo $_SESSION["data"];
	}
?>
	<br>
	<h6>tested in firefox and chrome</h6>
	</body>
</html>

